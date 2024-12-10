<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class HomeAdminContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'hobi' => 'required|string|max:255',
            'motto' => 'required|string|max:500',
        ]);
    
        // Temukan data berdasarkan ID
        $ab = About::findOrFail($id); // Ganti 'ModelAnda' dengan model yang sesuai, misalnya User atau Profil
    
        // Update data
        $ab->update($validatedData);
    
        // Beri respon atau arahkan kembali
        return redirect()->route('adm.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
