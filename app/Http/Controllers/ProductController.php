<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dish;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productos = Product::with(['dish', 'promotion'])->latest()->paginate(5);
        //$carrousel = Product::with('carrouseles')->get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platillo = Dish::where('is_Active', true)->get();
        $promotion = Promotion::where('is_Active', true)->get();
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            // Datos Básicos
            'nombre' => 'required|string|max:250',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:299',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:dish,promotion',

            // Datos Promociones
            'start_date' => 'nullable|required_if:type,promotion|date',
            'end_date' => 'nullable|required_if:type,promotion|date|after_or_equal:start_date',
        ]);

        // 🛠️ CORRECCIÓN 1: Procesar la imagen correctamente en la variable que se va a insertar
        $rutaImagen = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('productos', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        DB::beginTransaction();

        try {
            $product = Product::create([
                'nombre' => $validatedData['nombre'],
                'type' => $validatedData['type'],
                'precio' => $validatedData['precio'],
                'desc' => $validatedData['desc'] ?? null,
                'image_path' => $validatedData['image_path'], // Asignada la ruta real
            ]);

            if ($validatedData['type'] === 'dish') {
                Dish::create([
                    'id' => $product->id,
                ]);
            } elseif ($validatedData['type'] === 'promotion') {
                Promotion::create([
                    'id' => $product->id,
                    'start_date' => $validatedData['start_date'],
                    'end_date' => $validatedData['end_date'],
                ]);
            }

            DB::commit();
            return back()->with('success', '¡Producto creado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error al guardar el producto: ' . $e->getMessage());
        }

        if (isset($validatedData['image_path'])) {
            Storage::disk('public')->delete($validatedData['image_path']);
        }

        return back()->withInput()->with('error', 'Error al guardar el producto: ' . $e->getMessage());

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['dish', 'promotion'])->findOrFail($id);
        return view('admin.productos.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $producto = Product::with(['dish', 'promotion'])->findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:250',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:299',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $imagePath = $product->image_path;

        if ($request->hasFile('image_path')) {

            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }

            $imagePath = $request->file('image_path')->store('productos', 'public');
        }

        DB::beginTransaction();
        // Actualizo los campos de la tabla padre
        try {
            $product->update([
                'nombre' => $validatedData['nombre'],
                'precio' => $validatedData['precio'],
                'desc' => $validatedData['desc'],
                'image_path' => $imagePath

            ]);

            if ($product->type === 'dish' && $product->dish) {
                $product->dish->update([
                    'is_active' => $request->has('is_Active'),
                ]);
            } elseif ($product->type === 'promotion' && $product->promotion) {
                $product->promotion->update([
                    'start_date' => $validatedData['start_date'],
                    'end_date' => $validatedData['end_date'],
                    'is_active' => $request->has('is_Active'),
                ]);
            }

            DB::commit();
            return redirect()->route('productos.index')->with('success', '¡Producto actualizado correctamente!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el producto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function toggleActive($id)
    {
        $producto = Product::with(['dish', 'promotion'])->findOrFail($id);
        DB::beginTransaction();

        try {
            // Identificamos el tipo y volteamos el booleano 'is_Active' de la tabla hija
            if ($producto->type === 'dish' && $producto->dish) {

                $producto->dish->update([
                    'is_Active' => !$producto->dish->is_Active
                ]);

            } elseif ($producto->type === 'promotion' && $producto->promotion) {

                $producto->promotion->update([
                    'is_Active' => !$producto->promotion->is_Active
                ]);

            }

            DB::commit();
            return back()->with('success', '¡El estado del producto se modificó correctamente!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al cambiar el estado: ' . $e->getMessage());
        }
    }
}