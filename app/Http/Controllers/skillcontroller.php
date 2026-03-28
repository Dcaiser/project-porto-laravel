<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class skillcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $skll = Skill::all();
        return view('admin.skill', compact('skll'));

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
            'nama' => 'required|string',
            'icon'   => 'required|image|mimes:png|max:2048',

        ]);

        // ✅ Upload file
        $imagePath = $request->file('icon')->store('icon', 'public');

        // ✅ Simpan data ke database
        Skill::create([
            'nama' => $validated['nama'],
            'icon'   => $imagePath,

        ]);

        return redirect()->route('skl')
                         ->with('success', 'data berhasil ditambahkan.');

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
        $skl = Skill::findOrFail($id);

        // ✅ Validasi
        $validated = $request->validate([
            'nama-e' => 'nullable|string',
            'icon-e'     => 'nullable|image|mimes:png|max:2048',

        ]);

        // ✅ Cek jika ada file di-upload
        if ($request->hasFile('icon-e')) {
            // Upload file baru
            $icon = $request->file('icon-e')->store('icon', 'public');


            // (Opsional) Hapus file lama jika perlu
            if ($skl->icon) {
                Storage::disk('public')->delete($skl->icon);
            }

            // Update field poto
            $skl->icon = $icon;
        }

        // ✅ Update field lainnya
        $skl->nama = $validated['nama-e'];
        $skl->save();

        return redirect()->route('skl')->with('success', 'Data berhasil diperbarui.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $sk = Skill::findOrFail($id);

        // Hapus file gambar jika ada
        if ($sk->icon) {
            Storage::disk('public')->delete($sk->icon);
        }
        
        // Hapus data dari database
        $sk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');

    }
}
