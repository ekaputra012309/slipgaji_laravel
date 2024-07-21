<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PermintaanModel;
use App\Models\Privilage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Backend extends Controller
{
    public function signin()
    {
        $data = array(
            'title' => 'Login | ',
        );
        return view('backend.login', $data);
    }

    public function register()
    {
        $data = array(
            'title' => 'Register | ',
        );
        return view('backend.register', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard | ',
            'userCount' => Privilage::where('user_id', '=', 1)->count(),  // Count the number of users
            'pegawaiCount' => Pegawai::count(),
        ];

        return view('backend.dashboard', $data);
    }

    public function profile(Request $request)
    {
        $data = array(
            'title' => 'Profile | ',
            'user' => $request->user(),
        );
        return view('backend.profile', $data);
    }
}
