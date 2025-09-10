<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return view('admin.tables.major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'competency_head' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama jurusan harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'image.required' => 'Gambar harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'competency_head.required' => 'Nama kepala kompetensi harus diisi.',
        ]);

        $validatedData['publisher'] = Auth::user()->name;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('major_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Major::create($validatedData);

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view('admin.tables.major.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.tables.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'competency_head' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama jurusan harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'competency_head.required' => 'Nama kepala kompetensi harus diisi.',
        ]);

        $validatedData['publisher'] = Auth::user()->name;

        if ($request->hasFile('image')) {
            if ($major->image) {
                Storage::disk('public')->delete($major->image);
            }
            $imagePath = $request->file('image')->store('major_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $major->update($validatedData);

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        if ($major->image) {
            Storage::disk('public')->delete($major->image);
        }

        $major->delete();

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus!');
    }
}