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
        $carrouseles = Carrousel::withCount('products')->latest()->paginate(5);
        return view('admin.carrouseles.index', compact('carrouseles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carrouseles = Carrousel::where('is_Active', true)->get();
        return view('admin.carrouseles.create', compact('carrouseles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:50',
                'desc' => 'nullable|string|max:250',
                'precio' => 'nullable|numeric|min:0',
                'imgs' => 'required|array',
                'imgs.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
                'model_3D_path' => 'nullable|file|max:10240',
            ]);

            $slug = Str::slug($validatedData['titulo']);

            $rutasImagenes = [];
            if ($request->hasFile('imgs')) {
                foreach ($request->file('imgs') as $file) {
                    $path = $file->store('carrouseles/imagenes', 'public');
                    $rutasImagenes[] = $path;
                }
            }

            $rutaModel3D = null;
            if ($request->hasFile('model_3D_path')) {
                $rutaModel3D = $request->file('model_3D_path')->store('carrouseles/modelos', 'public');
            }

            DB::beginTransaction();
            try {
                Carrousel::create([
                    'titulo' => $validatedData['titulo'],
                    'slug' => $slug,
                    'desc' => $validatedData['desc'] ?? null,
                    'precio' => $validatedData['precio'] ?? null,
                    'imgs' => $rutasImagenes, // Importante: En tu Modelo añade -> protected $casts = ['imgs' => 'array'];
                    'model_3D_path' => $rutaModel3D,
                ]);

                DB::commit();
                return back()->with('success', '¡Carrusel creado con éxito!');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
            }
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
        // Carga los productos que ya pertenecen a este carrusel
        $carrousel->load('products');

        // Traem todos los productos disponibles en el menú de Rocket Papas
        $productos = Product::where('is_Active', true)->get();

        return view('admin.carrouseles.edit', compact('carousel', 'productos'));
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
    public function toggleActive($id)
    {
        $carrousel = Carrousel::findOrFail($id);

        $carrousel->is_Active = !$carrousel->is_Active;
        $carrousel->save();

        $status = $carrousel->is_Active ? 'activado' : 'desactivado';

        return redirect()->route('carrouseles.index')->with('success', 'Carrusel Ha Sido {$status} Correctamente.');
    }
}
