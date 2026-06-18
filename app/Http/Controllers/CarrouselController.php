<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrousel;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarrouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carruseles = Carrousel::withCount('products')->latest()->get();
        return view('admin.carruseles.index', compact('carruseles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Product::where('active', true)->get();
        return view('admin.carruseles.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255|unique:carousels,title',
            'is_active' => 'boolean',
            'desc' => 'nullable|string|max:99',
            'productos' => 'nullable|array', // Un arreglo de IDs de productos
            'productos.*' => 'exists:products,id' // Valida que cada ID exista real en la DB
        ]);

        DB::beginTransaction();

        try {
            // 2. Se Crea el carrousel (Generando el slug unico)
            $carousel = Carrousel::create([
                'titulo' => $request->title,
                'slug' => Str::slug($request->title),
                'is_active' => $request->has('is_active')
            ]);

            // 3. Si seleccionó productos, los metemos a la tabla pivote de un solo golpe
            if ($request->has('productos')) {
                // Usandoo attach() para agregar las relaciones iniciales
                $carousel->products()->attach($request->productos);
            }

            DB::commit();
            return redirect()->route('carruseles.index')->with('success', '¡Carrusel creado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error al crear el carrusel: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrousel $carrousel)
    {
        // Cargamos los productos que ya pertenecen a este carrusel
        $carrousel->load('products');
        
        // Traemos todos los productos disponibles en el menú de Rocket Papas
        $productos = Product::where('active', true)->get();

        return view('admin.carruseles.edit', compact('carousel', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrousel $carrousel)
    {
        $request->validate([
            'titulo' => 'required|string|max:255|unique:carousels,title,' . $carrousel->id,
            'desc' => 'nullable|string|max:99',
            'is_active' => 'boolean',
            'productos' => 'nullable|array',
            'productos.*' => 'exists:products,id'
        ]);

        DB::beginTransaction();

        try {
            // Se Actualizan los datos básicos
            $carrousel->update([
                'titulo' => $request->title,
                'slug' => Str::slug($request->title),
                'is_active' => $request->has('is_active')
            ]);

            // CIBERSEGURIDAD/OPTIMIZACIÓN: sync()
            // Si el admin desmarcó 2 productos y marcó 3 nuevos, sync() computa la diferencia,
            // borra los que ya no van y agrega los nuevos de un solo golpe SQL, evitando vulnerabilidades.
            $carrousel->products()->sync($request->productos ?? []);

            DB::commit();
            return redirect()->route('carruseles.index')->with('success', 'Carrusel actualizado con éxito.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el carrusel: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrousel $carrousel)
    {
        $carrousel->delete();

        return redirect()->route('carruseles.index')->with('success', 'Carrusel eliminado permanentemente.');
    }
}
