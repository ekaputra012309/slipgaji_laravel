<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        $data = array(
            'title' => 'Jabatan | ',
            'datajabatan' => $jabatan,
        );

        $title = 'Delete Jabatan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.jabatan.index', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Add Jabatan | ',
        );
        return view('backend.jabatan.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string',
        ]);

        // Split by comma
        $jabatanList = explode(',', $request->nama_jabatan);

        foreach ($jabatanList as $item) {

            // Remove extra spaces
            $namaJabatan = trim($item);

            // Skip empty value
            if ($namaJabatan != '') {

                if (!Jabatan::where('nama_jabatan', $namaJabatan)->exists()) {
                    Jabatan::create([
                        'nama_jabatan' => $namaJabatan,
                        'user_id' => $request->user_id,
                    ]);
                }
            }
        }

        Alert::success('Success', 'Jabatan created successfully.');
        return redirect()->route('jabatan.index');
    }

    public function edit(Jabatan $jabatan)
    {
        $data = array(
            'title' => 'Edit Jabatan | ',
            'jabatan' => $jabatan,
        );
        return view('backend.jabatan.edit', $data);
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
        ]);
    
        $jabatan = Jabatan::findOrFail($id);
    
        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        Alert::success('Success', 'Jabatan updateted successfully.');
        return redirect()->route('jabatan.index');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        Alert::success('Success', 'Jabatan deleted successfully.');

        return redirect()->route('jabatan.index');
    }

    public function show(Jabatan $jabatan)
    {
        $data = [
            'title' => 'View Jabatan | ',
            'jabatan' => $jabatan,
        ];
        return view('backend.jabatan.show', $data);
    }
}
