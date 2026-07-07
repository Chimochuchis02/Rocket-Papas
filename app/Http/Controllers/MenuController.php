<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::where('is_Active', true)->get();
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:250',
                'images_menus' => 'required|array',
                'images_menus.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
            ]);

            $rutasImagenes = [];
            if ($request->hasFile('images_menus')) {
                foreach ($request->file('images_menus') as $file) {
                    $path = $file->store('menus', 'public');
                    $rutasImagenes[] = $path;
                }
            }

            DB::beginTransaction();

            try {
                $menu = Menu::create([
                    'titulo' => $validatedData['titulo'],
                    'images_menus' => $rutasImagenes, // Asignada la ruta real
                ]);

                DB::commit();
                return back()->with('success', '¡menus creados con éxito!');

            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withInput()->with('error', 'Error al guardar los menus: ' . $e->getMessage());
            }

            if (isset($validatedData['images_menus'])) {
                Storage::disk('public')->delete($validatedData['images_menus']);
            }

            return back()->withInput()->with('error', 'Error al guardar los menus: ' . $e->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:250',
            'images_menus' => 'nullable|array',
            'images_menus.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $rutasImagenes = $menu->images_menus;
        if ($request->hasFile('images_menus')) {

            if (!empty($menu->images_menus) && is_array($menu->images_menus)) {
                foreach ($menu->images_menus as $viejaImagen) {
                    if (Storage::disk('public')->exists($viejaImagen)) {
                        Storage::disk('public')->delete($viejaImagen);
                    }
                }
            }

            $rutasImagenes = [];
            foreach ($request->file('images_menus') as $file) {
                $path = $file->store('menus', 'public');
                $rutasImagenes[] = $path;
            }

            DB::beginTransaction();
            try {
                $menu->update([
                    'titulo' => $validatedData['titulo'],
                    'images_menus' => $rutasImagenes,
                ]);

                DB::commit();
                return redirect()->route('menus.index')->with('success', '¡Menu actualizado con exito!');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->withInput()->with('error', 'Error al actualizar el menu: ' . $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function activate(Menu $menu)
    {
        DB::transaction(function () use ($menu) {

            Menu::query()->update(['is_Active' => 0]);

            // 2. Encendemos únicamente el banner seleccionado
            $menu->update(['is_Active' => 1]);
        });

        return redirect()->route('menus.index')
            ->with('success', '¡Nuevo menu asignado exitosamente a la Landing!');
    }
}
