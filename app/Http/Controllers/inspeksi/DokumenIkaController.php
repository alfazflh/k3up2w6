<?php

namespace App\Http\Controllers\Inspeksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenIka;

class DokumenIkaController extends Controller
{
    public function hasil()
    {
        $dokumen = DokumenIka::all();
        return view('inspeksi.dokumen.hasil', compact('dokumen'));
    }

    public function create()
    {
        return view('inspeksi.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file_dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:20480'
        ]);

        $file = $request->file('file_dokumen');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->storeAs('dokumen_ika', $filename, 'public');

        DokumenIka::create([
            'nama_dokumen' => $request->nama_dokumen,
            'file_dokumen' => $filename,
        ]);

        return redirect()->route('inspeksi.dokumen.hasil')->with('success', 'Dokumen berhasil diupload!');
    }

    public function destroy($id)
    {
        $dokumen = DokumenIka::findOrFail($id);
        unlink(storage_path('app/public/dokumen_ika/'.$dokumen->file_dokumen));
        $dokumen->delete();

        return redirect()->route('inspeksi.dokumen.hasil')->with('success', 'Dokumen berhasil dihapus!');
    }

    public function show($id)
{
    $dokumen = DokumenIka::findOrFail($id);
    return view('inspeksi.dokumen.show', compact('dokumen'));
}

}
