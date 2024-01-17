<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    public function index()
    {
        // Get posts
        $alats = Alat::latest()->paginate(5);

        // Render view with posts
        return view('alats.index', compact('alats'));
    }

    public function create()
    {
        return view('alats.create');
    }

    public function store(Request $request)
    {
        // Validate form
        $this->validate($request, [
            'foto_alat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|min:5',
            'nama_alat' => 'required|min:5'
        ]);

        // Upload image
        $image = $request->file('foto_alat');
        $image->storeAs('public/alats', $image->hashName());

        // Create post
        Alat::create([
            'foto_alat' => $image->hashName(),
            'harga' => $request->harga,
            'nama_alat' => $request->nama_alat
        ]);

        // Redirect to index
        return redirect()->route('alats.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Alat $alat)
    {
        return view('alats.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        // Validate form
        $this->validate($request, [
            'foto_alat' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|min:5',
            'nama_alat' => 'required|min:5'
        ]);

        // Check if image is uploaded
        if ($request->hasFile('foto_alat')) {
            // Upload new image
            $image = $request->file('foto_alat');
            $image->storeAs('public/alats', $image->hashName());

            // Delete old image
            Storage::delete('public/alats/' . $alat->foto_alat);

            // Update post with new image
            $alat->update([
                'foto_alat' => $image->hashName(),
                'harga' => $request->nim,
                'nama_alat' => $request->nama_alat
            ]);
        } else {
            // Update post without image
            $alat->update([
                'harga' => $request->harga,
                'nama_alat' => $request->nama_alat
            ]);
        }


        return redirect()->route('alats.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(Alat $alat)
    {

        Storage::delete('public/alats/'. $alat->image);

        $alat->delete();

        return redirect()->route('alats.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
