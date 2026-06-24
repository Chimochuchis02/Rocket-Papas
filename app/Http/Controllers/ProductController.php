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
        $productos = Product::with(['dish', 'promotion'])->latest()->get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Datos Básicos
            'nombre' => 'required|string|max:25',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:99',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:dish,promotion',

            // Promociones
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
                'image_path' => $rutaImagen, // Asignada la ruta real
            ]);

            if ($validatedData['type'] === 'dish') {
                Dish::create([
                    'id' => $product->id,
                    'is_active' => $request->has('is_active'),
                ]);
            } elseif ($validatedData['type'] === 'promotion') {
                Promotion::create([
                    'id' => $product->id,
                    'start_date' => $validatedData['start_date'],
                    'end_date' => $validatedData['end_date'],
                    'is_active' => $request->has('is_active'),
                ]);
            }

            DB::commit();
            return redirect()->route('productos.index')->with('success', '¡Producto creado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error al guardar el producto: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // 🛠️ CORRECCIÓN 4: Adaptado al mapeo manual de {id} de tus rutas
        $product = Product::with(['dish', 'promotion'])->findOrFail($id);
        return view('admin.productos.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with(['dish', 'promotion'])->findOrFail($id);
        return view('admin.productos.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // 🛠️ CORRECCIÓN 3: Se vuelven nullables las fechas para que no truenen al editar un platillo plano
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:99',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        DB::beginTransaction();

        try {
            // 🛠️ CORRECCIÓN 2: Unificación total de nombres del archivo ('image_path')
            if ($request->hasFile('image_path')) {
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }
                $imagePath = $request->file('image_path')->store('productos', 'public');
                $product->image_path = $imagePath;
            }

            // Actualizo los campos de la tabla padre
            $product->nombre = $validatedData['nombre'];
            $product->precio = $validatedData['precio'];
            $product->desc = $validatedData['desc'];
            $product->save();

            // Actualizo la tabla hija correspondiente
            if ($product->type === 'dish' && $product->dish) {
                $product->dish->update([
                    'is_active' => $request->has('is_active'),
                ]);
            } elseif ($product->type === 'promotion' && $product->promotion) {
                $product->promotion->update([
                    'start_date' => $validatedData['start_date'],
                    'end_date' => $validatedData['end_date'],
                    'is_active' => $request->has('is_active'),
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
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        DB::beginTransaction();

        try {
            // 🛠️ CORRECCIÓN 2: Ajustado a 'image_path'
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $product->delete();

            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado permanentemente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'No se pudo eliminar el producto: ' . $e->getMessage());
        }
    }
}