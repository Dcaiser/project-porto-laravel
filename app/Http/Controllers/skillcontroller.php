<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skill;

class skillcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Skill = Skill::all();
        return view('admin.skill.index', compact('Skill'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $filePath = $request->file('gambar')->store('skill', 'public');

        Skill::create([
            'gambar' => $filePath,
            'nama' => $request->nama,
            'desk' => $request->deskripsi,
        ]);

        return redirect()->route('admskill.index')->with('success', 'Data berhasil ditambahkan!');
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
        $sk = Skill::findOrFail($id); // Ganti 'ModelAnda' dengan model yang sesuai, misalnya User atau Profil

        return view('admin.skill.edit', compact('sk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
            // Validasi input
            $validated = $request->validate([
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Tidak selalu required
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required|string',
            ]);
        
            // Cari data berdasarkan ID
            $sk = Skill::findOrFail($id);
        
            // Jika ada file baru, proses upload file
            if ($request->hasFile('gambar')) {
                $filePath = $request->file('gambar')->store('skill', 'public');
                $validated['gambar'] = $filePath; // Tambahkan path gambar ke validasi
            }
        
            // Update data menggunakan array validasi
            $sk->update($validated);
        
            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('admskill.index')->with('successskill', 'Data berhasil diperbarui!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sk = Skill::findOrFail($id);

        // Delete the certificate from the database
        $sk->delete();

        // Redirect with success message
        return redirect()->route('admskill.index')->with('successdelser', 'berhasil dihapus');
    }
}
