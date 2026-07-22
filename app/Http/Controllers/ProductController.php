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
            'nombre' => 'required|string|max:250',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:299',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:dish,promotion',

            'start_date' => 'nullable|required_if:type,promotion|date',
            'end_date' => 'nullable|required_if:type,promotion|date|after_or_equal:start_date',
        ], [
        'nombre.required'      => 'El nombre del producto es obligatorio.',
        'nombre.max'           => 'El nombre no puede tener más de 250 caracteres.',
        'precio.required'      => 'El precio del producto es obligatorio.',
        'precio.numeric'       => 'El precio debe ser un valor numérico válido.',
        'precio.min'           => 'El precio no puede ser negativo.',
        'desc.max'             => 'La descripcion no debe ser mas larga que 299 caracteres',
        'image_path.image'     => 'El archivo seleccionado debe ser una imagen válida.',
        'image_path.mimes'     => 'La imagen debe estar en formato JPEG, PNG, JPG o WEBP.',
        'image_path.max'       => 'La imagen es muy pesada, el límite es de 2MB.',
        'end_date.after_or_equal' => 'La fecha de finalizacion debe ser a la del inicio o despues de esta.',
        ]);

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
                'image_path' => $validatedData['image_path'],
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
            'nombre' => 'nullable|string|max:250',
            'precio' => 'nullable|numeric|min:0',
            'desc' => 'nullable|string|max:299',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ], [
        'nombre.max'           => 'El nombre no puede tener más de 250 caracteres.',
        'precio.numeric'       => 'El precio debe ser un valor numérico válido.',
        'precio.min'           => 'El precio no puede ser negativo.',
        'desc.max'             => 'La descripcion no debe ser mas larga que 299 caracteres',
        'image_path.image'     => 'El archivo seleccionado debe ser una imagen válida.',
        'image_path.mimes'     => 'La imagen debe estar en formato JPEG, PNG, JPG o WEBP.',
        'image_path.max'       => 'La imagen es muy pesada, el límite es de 2MB.',
        'end_date.after_or_equal' => 'La fecha de finalizacion debe ser a la del inicio o despues de esta.',
        ]);

        $imagePath = $product->image_path;

        if ($request->hasFile('image_path')) {

            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }

            $imagePath = $request->file('image_path')->store('productos', 'public');
        }

        DB::beginTransaction();
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