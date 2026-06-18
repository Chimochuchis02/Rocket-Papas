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
            //Datos Basicos
            'nombre' => 'required|string|max:25',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string|max:99',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Valida que sea imagen real,no un script PHP oculto
            'type' => 'required|in:dish,promotion',

            //Promociones
            'start_date' => 'required_if:tipo,promotion|date',
            'end_date' => 'required_if:tipo,promotion|date|after_or_equal:start_date',

        ]);

        //Guardar imagen en el path
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('products', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        DB::beginTransaction();

        try {
            // Insertar en la tabla padre (productos)
            $product = Product::create([
                'nombre' => $validatedData['nombre'],
                'type' => $validatedData['type'],
                'precio' => $validatedData['precio'],
                'desc' => $validatedData['desc'] ?? null,
                'image_path' => $validatedData['image_path'],
            ]);

            if ($request->tipo === 'dish') {
                Dish::create([
                    'id' => $product->id, // Comparten el mismo ID por integridad relacional
                    'is_active' => $request->has('is_active'),
                ]);
            } elseif ($request->tipo === 'promotion') {
                Promotion::create([
                    'id' => $product->id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'is_active' => $request->has('is_active'),
                ]);
            }

            DB::commit(); // Si todo sale bien, se guardan cambios permanentemente
            return redirect()->route('productos.index')->with('success', '¡Producto creado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack(); // Si algo truena, deshace todo para evitar datos huérfanos o corruptos
            return back()->withInput()->with('error', 'Error al guardar el producto: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['dish', 'promotion']);
        return view('admin.productos.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load(['dish', 'promotion']);
        return view('admin.productos.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'type' => '',
            'desc' => 'nullable|string|max:99',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            
            // Campos de actualización específicos
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
        ]);

        DB::beginTransaction();

        try {
            // Si el administrador subió una imagen nueva, borro la imagen vieja del disco para no acumular basura
            if ($request->hasFile('imagen')) {
                if ($product->imagen) {
                    Storage::disk('public')->delete($product->imagen);
                }
                $imagePath = $request->file('image_path')->store('products', 'public');
                $product->imagen = $imagePath;
            }

            // Actualizo los campos de la tabla padre
            $product->nombre = $request->nombre;
            $product->precio = $request->precio;
            $product->desc = $request->desc;
            $product->save();

            // Actualizo la tabla hija correspondiente
            if ($product->tipo === 'dish' && $product->dish) {
                $product->dish->update([
                ]);
            } elseif ($product->tipo === 'promotion' && $product->promotion) {
                $product->promotion->update([
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
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
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            // Borro físicamente el archivo de imagen del servidor para no dejar residuos
            if ($product->imagen) {
                Storage::disk('public')->delete($product->imagen);
            }

            // Debido al onDelete('cascade') que configure en mis migraciones, 
            // al borrar el registro padre, las filas en dishes o promotions se eliminan automáticamente.
            $product->delete();

            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado permanentemente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'No se pudo eliminar el producto: ' . $e->getMessage());
        }
    }
}
