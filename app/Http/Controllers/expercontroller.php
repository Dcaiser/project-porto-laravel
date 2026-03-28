<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;

class expercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exper = Experience::paginate(3);

        return view('admin.exper', (compact('exper')));
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
            'foto'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|string',

        ]);

        // ✅ Upload file
        $imagePath = $request->file('foto')->store('doc', 'public');

        // ✅ Simpan data ke database
        Experience::create([
            'deskripsi' => $validated['desc'],
            'foto'   => $imagePath,
            'judul' => $validated['judul'],

        ]);

        return redirect()->route('exp')
                         ->with('success', 'data berhasil disimpan.');

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
        $expe = Experience::findOrFail($id);

        // ✅ Validasi
        $validated = $request->validate([
            'desc-e' => 'nullable|string',
            'foto-e'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'judul-e' => 'required|string|max:1000',

        ]);

        // ✅ Cek jika ada file di-upload
        if ($request->hasFile('foto-e')) {
            // Upload file baru
            $poto = $request->file('foto-e')->store('doc', 'public');


            // (Opsional) Hapus file lama jika perlu
            if ($expe->foto) {
                Storage::disk('public')->delete($expe->foto);
            }

            // Update field poto
            $expe->foto = $poto;
        }

        // ✅ Update field lainnya
        $expe->deskripsi = $validated['desc-e'];
        $expe->judul = $validated['judul-e'];
        $expe->save();

        return redirect()->route('exp')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ex = Experience::findOrFail($id);

    // Hapus file gambar jika ada
    if ($ex->foto) {
        Storage::disk('public')->delete($ex->foto);
    }

    // Hapus data dari database
    $ex->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
