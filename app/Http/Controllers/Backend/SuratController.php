<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;
use RealRashid\SweetAlert\Facades\Alert;

class SuratController extends Controller
{
    public function index()
    {        
        $surat = Surat::get()->first();
        $data = array(
            'title' => 'Format Surat | ',
            'surat' => $surat,
        );
        return view('backend.surat.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
    
        $surat = Surat::findOrFail($id);
    
        $surat->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'user_id' => auth()->id(),
        ]);

        Alert::success('Success', 'Format Surat updateted successfully.');
        return redirect()->route('surat.index');
    }
}
