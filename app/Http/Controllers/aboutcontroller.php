<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class aboutcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all(); // atau Post::count()

        return view('admin.about', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desc' => 'required|string',
            'poto'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Upload file
        $imagePath = $request->file('poto')->store('images', 'public');

        // ✅ Simpan data ke database
        About::create([
            'descript' => $validated['desc'],
            'poto'   => $imagePath,
        ]);

        return redirect()->route('ab')
                         ->with('success', 'Post berhasil disimpan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        // ✅ Validasi
        $validated = $request->validate([
            'desc1' => 'required|string|max:1000',
            'poto1'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Cek jika ada file di-upload
        if ($request->hasFile('poto1')) {
            // Upload file baru
            $imagePath = $request->file('poto1')->store('images', 'public');

            // (Opsional) Hapus file lama jika perlu
            if ($about->poto) {
                Storage::disk('public')->delete($about->poto);
            }

            // Update field poto
            $about->poto = $imagePath;
        }

        // ✅ Update field lainnya
        $about->descript = $validated['desc1'];
        $about->save();

        return redirect()->route('ab')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
