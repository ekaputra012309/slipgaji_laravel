<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit(About $about)
    {
        $data = [
            'title' => 'Edit about | ',
            'about' => $about,
        ];
        return view('backend.about.index', $data);
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'alias' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $logoPath = $about->logo;

        if ($request->hasFile('logo')) {

            // Delete old logo
            if ($about->logo && file_exists(public_path($about->logo))) {
                @unlink(public_path($about->logo));
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('logos'), $fileName);

            $logoPath = 'logos/' . $fileName;
        }

        $about->update([
            'logo' => $logoPath,
            'nama' => $request->nama,
            'alias' => $request->alias,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);

        Alert::success('Success', 'About information updated successfully.');

        return redirect()->route('about.edit', $about->id);
    }

    public function getAbout () {
        $about = About::first();
        return response()->json(['about' => $about]);

    }
}
