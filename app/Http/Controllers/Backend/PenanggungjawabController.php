<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penanggungjawab;
use RealRashid\SweetAlert\Facades\Alert;

class PenanggungjawabController extends Controller
{
    public function index()
    {        
        $p_jawab = Penanggungjawab::get()->first();
        $data = array(
            'title' => 'Penanggung Jawab | ',
            'data' => $p_jawab,
        );
        return view('backend.penanggungjawab.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ikahi_cab'            => 'nullable|string',
            'lain2'                => 'nullable|string',
            'arisan_gabungan'      => 'nullable|string',
            'simpan_pinjam'        => 'nullable|string',
            'iuran_dyk'            => 'nullable|string',
            'iuran_koperasi'       => 'nullable|string',
            'ptwp'                 => 'nullable|string',
            'ipaspi'               => 'nullable|string',
            'pinjaman_koperasi'    => 'nullable|string',
            'bapor'                => 'nullable|string',
            'kebersamaan_hakim'    => 'nullable|string',
            'mushola'              => 'nullable|string',
            'bri_bsm_jabar'        => 'nullable|string',
            'sewa_rumah'           => 'nullable|string',
            'iuran_hakim'          => 'nullable|string',
        ]);

        $data = Penanggungjawab::findOrFail($id);

        $data->update([
            'ikahi_cab'            => $request->ikahi_cab,
            'lain2'                => $request->lain2,
            'arisan_gabungan'      => $request->arisan_gabungan,
            'simpan_pinjam'        => $request->simpan_pinjam,
            'iuran_dyk'            => $request->iuran_dyk,
            'iuran_koperasi'       => $request->iuran_koperasi,
            'ptwp'                 => $request->ptwp,
            'ipaspi'               => $request->ipaspi,
            'pinjaman_koperasi'    => $request->pinjaman_koperasi,
            'bapor'                => $request->bapor,
            'kebersamaan_hakim'    => $request->kebersamaan_hakim,
            'mushola'              => $request->mushola,
            'bri_bsm_jabar'        => $request->bri_bsm_jabar,
            'sewa_rumah'           => $request->sewa_rumah,
            'iuran_hakim'          => $request->iuran_hakim,
        ]);
        
        Alert::success('Success', 'Penanggung Jawab updateted successfully.');
        return redirect()->route('penanggungjawab.index');
    }
}
