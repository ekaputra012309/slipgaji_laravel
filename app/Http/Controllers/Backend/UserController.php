<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Privilage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $authUserId = auth()->id();

        $users = User::where('id', '!=', $authUserId)
            ->where('id', '!=', 1)
            ->get();

        $data = array(
            'title' => 'User | ',
            'datauser' => $users,
        );

        // Define the delete confirmation title and text
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.user.index', $data);
    }


    public function create()
    {
        $pegawaiWithPotonganIds = User::pluck('email')->toArray();
        $pegawai = Pegawai::whereNotIn('nip', $pegawaiWithPotonganIds)
            ->orderBy('nama_pegawai', 'asc')
            ->get();
        $data = [
            'title' => 'Add User | ',
            'pegawai' => $pegawai,
        ];
        return view('backend.user.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $userId = $user->id;
        Privilage::create([
            'user_id' => $userId,
            'role_id' => 2,
        ]);
        Alert::success('Success', 'User created successfully.');
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        $data = array(
            'title' => 'View User | ',
        );
        return view('backend.user.show', $data);
    }

    public function edit(User $user)
    {
        $data = array(
            'title' => 'Edit User | ',
            'user' => $user,
        );
        return view('backend.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            // 'password' => 'nullable|string|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        Alert::success('Success', 'User updated successfully.');

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Success', 'user deleted successfully.');

        return redirect()->route('user.index');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        // Generate a new password
        $newPassword = '12345678';

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->save();

        Alert::success('Success', 'password reset successfully.');
        return redirect()->route('user.index');
    }
}
