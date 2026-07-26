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
        $carrouseles = Carrousel::get();
        $platillos = Product::where('type', 'dish')
            ->orderBy('nombre', 'asc')
            ->get();
        return view('admin.carrouseles.create', compact('carrouseles', 'platillos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:40',
                'imgs' => 'required|array',
                'imgs.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
                'model_3D_path' => 'nullable|file|mimes:mp4,webm, mov|max:12000',
                'producto_id' => 'required|integer|exists:products,id'
            ], [
                'titulo.required' => 'El campo titulo es obligatorio',
                'titulo.max' => 'El maximo de caracteres para el titulo es de 40',
                'imgs.required' => 'El campo de imagenes es obligatorio',
                'imgs.*.image' => 'El archivo de imagenes debe ser uno valido',
                'imgs.*.mimes' => 'El archivo debe ser del tipo: JPEG, PNG, JPG o WEBP',
                'imgs.*.max' => 'El maximo para subir imagenes es de maximo: 2MB',
                'model_3D_path.file' => 'El archivo de video debe ser uno valido',
                'model_3D_path.mimes' => 'El archivo de video debe ser del tipo: MP4, WEBM o MOV',
                'model_3D_path.max' => 'El video renderizado debe pesar como maximo: 12MB',
                'producto_id.required' => 'El campo de seleccion es obligatorio',
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
                    'imgs' => $rutasImagenes,
                    'model_3D_path' => $rutaModel3D,
                    'producto_id' => $validatedData['producto_id']
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carrousel = Carrousel::findOrFail($id);
        $platillos = Product::where('type', 'dish')
            ->orderBy('nombre', 'asc')
            ->get();
        return view('admin.carrouseles.edit', compact('carrousel', 'platillos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carrousel = Carrousel::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:40',
            'imgs' => 'nullable|array',
            'imgs.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'model_3D_path' => 'nullable|file|mimes:mp4, webm, mov|max:12000',
            'producto_id' => 'nullable|integer|exists:products,id'
        ], [
            'titulo.max' => 'El maximo de caracteres para el titulo es de 40',
            'imgs.*.image' => 'El archivo de imagenes debe ser uno valido',
            'imgs.*.mimes' => 'El archivo debe ser del tipo: JPEG, PNG, JPG o WEBP',
            'imgs.*.max' => 'El maximo para subir imagenes es de maximo: 2MB',
            'model_3D_path.file' => 'El archivo de video debe ser uno valido',
            'model_3D_path.mimes' => 'El archivo de video debe ser del tipo: MP4, WEBM o MOV',
            'model_3D_path.max' => 'El video renderizado debe pesar como maximo: 12MB',
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
                'desc' => $validatedData['desc'] ?? null,
                'imgs' => $rutasImagenes,
                'model_3D_path' => $rutaModel3D,
                'producto_id' => $validatedData['producto_id']
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
        //
    }
}
