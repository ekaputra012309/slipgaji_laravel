<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Potongan;
use App\Models\Privilage;
use App\Models\SlipGaji;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SlipgajiController extends Controller
{
    public function index()
    {
        $role = Privilage::getRoleKodeForAuthenticatedUser();
        $query = SlipGaji::with('pegawai')->orderBy('created_at', 'desc');

        if ($role != 'admin') {
            $email = Auth::user()->email; // Use Auth::user() to get the authenticated user
            $idPegawai = Pegawai::where('nip', $email)->pluck('id');
            $query->whereIn('id_pegawai', $idPegawai);
        }

        $slipgajis = $query->get()->map(function ($slipgaji) {
            $totalDeductions = $slipgaji->ikahi_cab + $slipgaji->lain2 + $slipgaji->arisan_gabungan +
                $slipgaji->simpan_pinjam + $slipgaji->iuran_dyk + $slipgaji->iuran_koperasi +
                $slipgaji->ptwp + $slipgaji->ipaspi + $slipgaji->pinjaman_koperasi +
                $slipgaji->bapor + $slipgaji->kebersamaan_hakim + $slipgaji->mushola +
                $slipgaji->bri_bsm_jabar + $slipgaji->sewa_rumah + $slipgaji->iuran_hakim;

            $slipgaji->gajiakhir = $slipgaji->gaji - $totalDeductions;
            return $slipgaji;
        });

        $data = [
            'title' => 'Potongan | ',
            'dataslipgaji' => $slipgajis,
        ];
        $title = 'Delete Slipgaji!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.slipgaji.index', $data);
    }


    public function create()
    {
        $currentMonthYear = Carbon::now()->format('Y-m');

        $pegawaiWithSlipGajiIds = SlipGaji::where('gaji_bulan', $currentMonthYear)
            ->pluck('id_pegawai')
            ->toArray();
        $pegawai = Pegawai::whereNotIn('id', $pegawaiWithSlipGajiIds)
            ->where('status', '1')
            ->orderBy('nama_pegawai', 'asc')
            ->get();
        $data = [
            'title' => 'Add slipgaji | ',
            'pegawai' => $pegawai,
        ];
        // dd($pegawai);
        return view('backend.slipgaji.create', $data);
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

        SlipGaji::create($data);
        Alert::success('Success', 'slipgaji created successfully.');

        return redirect()->route('slipgaji.index');
    }

    public function show(Slipgaji $slipgaji)
    {
        $slipgaji->load('pegawai');
        $data = [
            'title' => 'View slipgaji | ',
            'slipgaji' => $slipgaji,
        ];
        return view('backend.slipgaji.show', $data);
    }

    public function edit(Slipgaji $slipgaji)
    {
        $pegawai = Pegawai::where('id', $slipgaji->id_pegawai)->get();
        $data = [
            'title' => 'Edit slipgaji | ',
            'slipgaji' => $slipgaji,
            'pegawai' => $pegawai,
        ];
        return view('backend.slipgaji.edit', $data);
    }

    public function update(Request $request, Slipgaji $slipgaji)
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

        $slipgaji->update($request->all());
        Alert::success('Success', 'slipgaji updated successfully.');

        return redirect()->route('slipgaji.index');
    }

    public function destroy(Slipgaji $slipgaji)
    {
        $slipgaji->delete();
        Alert::success('Success', 'slipgaji deleted successfully.');

        return redirect()->route('slipgaji.index');
    }

    public function getPotonganByPegawai($pegawai_id)
    {
        $potongan = Potongan::where('id_pegawai', $pegawai_id)->first();

        if ($potongan) {
            return response()->json($potongan);
        }

        return response()->json(['error' => 'Data not found'], 404);
    }
}
