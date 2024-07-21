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

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'alias' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $about = About::findOrFail($id);

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            // Define the directory to store the logo
            $directory = 'logos';

            // Delete old logo if it exists
            if ($about->logo && file_exists(public_path($about->logo))) {
                unlink(public_path($about->logo));
            }

            // Get the new logo file
            $file = $request->file('logo');

            // Generate the new file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the public directory
            $file->move(public_path($directory), $fileName);

            // Set the relative path for the logo
            $logoPath = $directory . '/' . $fileName;
        } else {
            // Keep existing logo if no new file is uploaded
            $logoPath = $about->logo;
        }

        // Update the About record
        $about->update([
            'logo' => $logoPath,
            'nama' => $request->input('nama', $about->nama),
            'alias' => $request->input('alias', $about->alias),
            'alamat' => $request->input('alamat', $about->alamat),
            'deskripsi' => $request->input('deskripsi', $about->deskripsi),
        ]);

        Alert::success('Success', 'About information updated successfully.');

        return redirect()->route('about.edit', $id);
    }
}
