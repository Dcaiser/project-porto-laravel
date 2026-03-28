<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class contactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
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
            'mail' => 'required|string',
            'telp' => 'required|string',
            'pesan' => 'required|string',

        ]);

        // ✅ Simpan data ke database
        Contact::create([
            'nama' => $validated['nama'],
            'email' => $validated['mail'],
            'telp' => $validated['telp'],
            'pesan' => $validated['pesan'],

        ]);

        return redirect()->route('home')
                         ->with('success', 'berhasil dikirim');


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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $cont = Contact::findOrFail($id);

        // Hapus file gambar jika ada

        // Hapus data dari database
        $cont->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');

    }
}
