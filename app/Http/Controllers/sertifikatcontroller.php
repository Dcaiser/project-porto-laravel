<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertif;

class sertifikatcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sertif = Sertif::all();
       return view('admin.sertifikat.index', compact('sertif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuedby' => 'required|string|max:255',
            'issuedat' => 'required|date',
            'file' => 'required|mimes:png,jpg,jpeg|max:10240', // file validation for png/jpg/jpeg
            'desc' => 'nullable|string|max:1000',
        ]);

        // Handle file upload and store it
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('certificates', 'public');
        }

        // Create the new certification record in the database
        $certif = Sertif::create([
            'name' => $validated['name'],
            'issued_by' => $validated['issuedby'],
            'issued_at' => $validated['issuedat'],
            'file' => $filePath, // store the path of the uploaded file
            'desc' => $validated['desc'] ?? null,
        ]);

        // Return a response (e.g., redirect or a success message)
        return redirect()->route('admsertif.index')->with('success', 'Certification created successfully!');
        }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ser = Sertif::findOrfail($id);
        return view('admin.sertifikat.edit', compact('ser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
   // Validasi data input
   $request->validate([
    'nama' => 'required|string|max:255',
    'issuedb' => 'required|string|max:255',
    'issueda' => 'required|date',
    'fileg' => 'nullable|file|mimes:png|max:2048', // Pastikan hanya menerima file PNG
    'desk' => 'nullable|string',
]);

// Cari data sertifikat berdasarkan ID
$ser = Sertif::findOrFail($id);

// Update field dari request
$ser->name = $request->input('nama');
$ser->issued_by = $request->input('issuedb');
$ser->issued_at = $request->input('issueda');
$ser->desc = $request->input('desk');

// Jika ada file baru, proses upload
if ($request->hasFile('fileg')) {
    // Hapus file lama jika ada
    if ($ser->file && Storage::exists('storage/' . $ser->file)) {
        Storage::delete('storage/' . $ser->file);
    }

    // Simpan file baru
    $filePath = $request->file('fileg')->store('public/uploads');
    $ser->file = str_replace('public/', '', $filePath); // Simpan path relatif
}

// Simpan perubahan
$ser->save();

// Redirect ke halaman lain dengan pesan sukses
return redirect()->route('admsertif.index')->with('success', 'Sertifikat berhasil diperbarui!');   
 }
    public function destroy( $id)
    {
        $ser = Sertif::findOrFail($id);

        // Delete the certificate from the database
        $ser->delete();

        // Redirect with success message
        return redirect()->route('admsertif.index')->with('success', 'berhasil dihapus');

    }
}
