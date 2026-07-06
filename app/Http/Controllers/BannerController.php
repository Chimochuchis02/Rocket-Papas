<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(5);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = Banner::where('is_Active', true)->get();
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'image_banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);
            $rutaImagen = null;
            if ($request->hasFile('image_banner')) {
                $imagePath = $request->file('image_banner')->store('banners', 'public');
                $validatedData['image_banner'] = $imagePath;
            }

            DB::beginTransaction();

            try {
                $banner = Banner::create([
                    'image_banner' => $validatedData['image_banner'], // Asignada la ruta real
                ]);

                DB::commit();
                return back()->with('success', '¡Banner creado con éxito!');

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withInput()->with('error', 'Error al guardar el banner: ' . $e->getMessage());
            }

            if (isset($validatedData['image_banner'])) {
                Storage::disk('public')->delete($validatedData['image_banner']);
            }

            return back()->withInput()->with('error', 'Error al guardar el banner: ' . $e->getMessage());
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
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $banner = Banner::findOrFail($id);
        $validatedData = $request->validate([
            'image_banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $banner->image_banner;

        if ($request->hasFile('image_banner')) {

            if ($banner->image_banner && Storage::disk('public')->exists($banner->image_banner)) {
                Storage::disk('public')->delete($banner->image_banner);
            }

            $imagePath = $request->file('image_banner')->store('banners', 'public');
        }

        DB::beginTransaction();

        try {
            $banner->update([
                'image_banner' => $imagePath
            ]);
            DB::commit();
            return redirect()->route('banners.index')->with('success', '¡Banner actualizado correctamente!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el banner: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function toggleActive($id)
    {
        $banner = Banner::findOrFail($id);
        DB::beginTransaction();

        $banner->is_Active = !$banner->is_Active;
        $banner->save();

        $status = $banner->is_Active ? 'activado' : 'desactivado';

        return redirect()->route('banners.index')->with('success', 'Banner Ha Sido {$status} Correctamente.');

    }
}
