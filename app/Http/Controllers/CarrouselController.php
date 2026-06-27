<?php

namespace App\Http\Controllers;

use BcMath\Number;
use Illuminate\Http\Request;
use App\Models\Carrousel;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
                'model_3D_path' => 'nullable|file|max:30240',
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
    public function edit($id)
    {
        // Por ahora y paara completar este primer modulo y su CRUD....solo busca el id del carrousel...ya que productos aun no hay y eso da errores, al intentar buscar algo que no existe
        $carrousel = Carrousel::findOrFail($id);
        return view('admin.carrouseles.edit', compact('carrousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carrousel = Carrousel::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:50',
            'desc' => 'nullable|string|max:250',
            'precio' => 'nullable|numeric|min:0',
            'imgs' => 'nullable|array',
            'imgs.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'model_3D_path' => 'nullable|file|max:30240',
        ]);

        $slug = Str::slug($validatedData['titulo']);

        $rutasImagenes = $carrousel->imgs;
        if ($request->hasFile('imgs')) {

            if (!empty($carrousel->imgs) && is_array($carrousel->imgs)) {
                foreach ($carrousel->imgs as $viejaImagen) {
                    if (Storage::disk('public')->exists($viejaImagen)) {
                        Storage::disk('public')->delete($viejaImagen);
                    }
                }
            }


            $rutasImagenes = [];
            foreach ($request->file('imgs') as $file) {
                $path = $file->store('carrouseles/imagenes', 'public');
                $rutasImagenes[] = $path;
            }
        }

        $rutaModel3D = $carrousel->model_3D_path;
        if ($request->hasFile('model_3D_path')) {
            if (!empty($carrousel->model_3D_path) && Storage::disk('public')->exists($carrousel->model_3D_path)) {
                Storage::disk('public')->delete($carrousel->model_3D_path);
            }

            $rutaModel3D = $request->file('model_3D_path')->store('carrouseles/modelos', 'public');
        }

        DB::beginTransaction();
        try {
            $carrousel->update([
                'titulo' => $validatedData['titulo'],
                'slug' => $slug,
                'desc' => $validatedData['desc'] ?? null,
                'precio' => $validatedData['precio'] ?? null,
                'imgs' => $rutasImagenes,
                'model_3D_path' => $rutaModel3D,
            ]);

            DB::commit();
            return redirect()->route('carrouseles.index')->with('success', '¡Carrusel actualizado con éxito!');
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->hasFile('model_3D_path') && $rutaModel3D !== $carrousel->model_3D_path) {
                Storage::disk('public')->delete($rutaModel3D);
            }

            return back()->withInput()->with('error', 'Error al actualizar: ' . $e->getMessage());
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
