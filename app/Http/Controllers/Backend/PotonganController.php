<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Potongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PotonganController extends Controller
{
    public function index()
    {
        $potongans = Potongan::with('pegawai')
            ->orderBy('id', 'asc')
            ->get();
        $potongans->transform(function ($potongan) {
            // Calculate the total deductions
            $totalDeductions = $potongan->ikahi_cab + $potongan->lain2 + $potongan->arisan_gabungan +
                $potongan->simpan_pinjam + $potongan->iuran_dyk + $potongan->iuran_koperasi +
                $potongan->ptwp + $potongan->ipaspi + $potongan->pinjaman_koperasi +
                $potongan->bapor + $potongan->kebersamaan_hakim + $potongan->mushola +
                $potongan->bri_bsm_jabar + $potongan->sewa_rumah + $potongan->iuran_hakim;

            // Calculate adjusted gaji
            $potongan->gajiakhir = $potongan->gaji - $totalDeductions;

            return $potongan;
        });
        $data = [
            'title' => 'Potongan | ',
            'datapotongan' => $potongans,
        ];
        // dd($potongans);
        $title = 'Delete Hotel!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.potongan.index', $data);
    }

    public function create()
    {
        $pegawaiWithPotonganIds = Potongan::pluck('id_pegawai')->toArray();
        $pegawai = Pegawai::whereNotIn('id', $pegawaiWithPotonganIds)
            ->orderBy('nama_pegawai', 'asc')
            ->get();
        $data = [
            'title' => 'Add Potongan | ',
            'pegawai' => $pegawai,
        ];
        return view('backend.potongan.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:tbl_pegawai,id',
            'gaji' => 'required|numeric',
            'ikahi_cab' => 'nullable|numeric',
            'lain2' => 'nullable|numeric',
            'arisan_gabungan' => 'nullable|numeric',
            'simpan_pinjam' => 'nullable|numeric',
            'iuran_dyk' => 'nullable|numeric',
            'iuran_koperasi' => 'nullable|numeric',
            'ptwp' => 'nullable|numeric',
            'ipaspi' => 'nullable|numeric',
            'pinjaman_koperasi' => 'nullable|numeric',
            'bapor' => 'nullable|numeric',
            'kebersamaan_hakim' => 'nullable|numeric',
            'mushola' => 'nullable|numeric',
            'bri_bsm_jabar' => 'nullable|numeric',
            'sewa_rumah' => 'nullable|numeric',
            'iuran_hakim' => 'nullable|numeric',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        Potongan::create($data);
        Alert::success('Success', 'Potongan created successfully.');

        return redirect()->route('potongan.index');
    }

    public function show(Potongan $potongan)
    {
        $data = [
            'title' => 'View Potongan | ',
            'potongan' => $potongan,
        ];
        return view('backend.potongan.show', $data);
    }

    public function edit(Potongan $potongan)
    {
        $pegawai = Pegawai::where('id', $potongan->id_pegawai)->get();
        $data = [
            'title' => 'Edit Potongan | ',
            'potongan' => $potongan,
            'pegawai' => $pegawai,
        ];
        return view('backend.potongan.edit', $data);
    }

    public function update(Request $request, Potongan $potongan)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:tbl_pegawai,id',
            'gaji' => 'required|numeric',
            'ikahi_cab' => 'nullable|numeric',
            'lain2' => 'nullable|numeric',
            'arisan_gabungan' => 'nullable|numeric',
            'simpan_pinjam' => 'nullable|numeric',
            'iuran_dyk' => 'nullable|numeric',
            'iuran_koperasi' => 'nullable|numeric',
            'ptwp' => 'nullable|numeric',
            'ipaspi' => 'nullable|numeric',
            'pinjaman_koperasi' => 'nullable|numeric',
            'bapor' => 'nullable|numeric',
            'kebersamaan_hakim' => 'nullable|numeric',
            'mushola' => 'nullable|numeric',
            'bri_bsm_jabar' => 'nullable|numeric',
            'sewa_rumah' => 'nullable|numeric',
            'iuran_hakim' => 'nullable|numeric',
        ]);

        $potongan->update($request->all());
        Alert::success('Success', 'Potongan updated successfully.');

        return redirect()->route('potongan.index');
    }

    public function destroy(Potongan $potongan)
    {
        $potongan->delete();
        Alert::success('Success', 'Potongan deleted successfully.');

        return redirect()->route('potongan.index');
    }
}
