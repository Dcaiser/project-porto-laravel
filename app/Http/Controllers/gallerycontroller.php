<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class gallerycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(8);

        return view('admin.gallery', compact('galleries'));
    }

    /**
     * Store a newly created gallery entry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'nullable|string|max:150',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('photo')->store('galleries', 'public');

        Gallery::create([
            'judul' => $validated['title'] ?? null,
            'foto' => $path,
            'deskripsi' => $validated['description'] ?? null,
        ]);

        return redirect()->route('gall')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /**
     * Update the specified gallery entry.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:150',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [
            'judul' => $validated['title'] ?? null,
            'deskripsi' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('photo')) {
            if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
                Storage::disk('public')->delete($gallery->foto);
            }

            $data['foto'] = $request->file('photo')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('gall')->with('success', 'Data galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified gallery entry.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
            Storage::disk('public')->delete($gallery->foto);
        }

        $gallery->delete();

        return redirect()->route('gall')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
