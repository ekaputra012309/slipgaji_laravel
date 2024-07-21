<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Privilage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::where('status', '=', '1')
            ->orderBy('nama_pegawai', 'asc')
            ->get();
        $data = array(
            'title' => 'Pegawai | ',
            'datapegawai' => $pegawai,
        );
        return view('backend.pegawai.index', $data);
    }

    public function index2()
    {
        $pegawai = Pegawai::where('status', '=', '0')
            ->orderBy('nama_pegawai', 'asc')
            ->get();
        $data = array(
            'title' => 'Pegawai | ',
            'datapegawai' => $pegawai,
        );
        return view('backend.pegawai.index2', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Add Pegawai | ',
        );
        return view('backend.pegawai.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama_pegawai' => 'required|string|max:255',
            'no_rek' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        $user = User::create([
            'name' => $request->nama_pegawai,
            'email' => $request->nip,
            'password' => bcrypt('12345678'),
        ]);
        $userId = $user->id;
        Privilage::create([
            'user_id' => $userId,
            'role_id' => 2,
        ]);

        Pegawai::create($data);
        Alert::success('Success', 'Pegawai created successfully.');

        return redirect()->route('pegawai.index');
    }

    public function show(Pegawai $pegawai)
    {
        $data = array(
            'title' => 'View Pegawai | ',
            'pegawai' => $pegawai,
        );
        return view('backend.pegawai.show', $data);
    }

    public function edit(Pegawai $pegawai)
    {
        $data = array(
            'title' => 'Edit Pegawai | ',
            'pegawai' => $pegawai,
        );
        return view('backend.pegawai.edit', $data);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama_pegawai' => 'required|string|max:255',
            'no_rek' => 'required|string|max:255',
        ]);

        $pegawai->update($request->all());
        Alert::success('Success', 'Pegawai updated successfully.');

        return redirect()->route('pegawai.index');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        Alert::success('Success', 'Pegawai deleted successfully.');

        return redirect()->route('pegawai.index');
    }

    public function updateStatus(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $pegawai->update(['status' => $request->status]);
        Alert::success('Success', 'Pegawai status updated successfully.');
        if ($request->dari == 'index') {
            return redirect()->route('pegawai.index');
        } else {
            return redirect()->route('pegawai.index2');
        }
    }
}
