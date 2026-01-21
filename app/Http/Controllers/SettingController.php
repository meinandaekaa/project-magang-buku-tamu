<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.tamu.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // hapus foto lama jika ada
            if ($user->photo && File::exists(public_path('uploads/profile/'.$user->photo))) {
                File::delete(public_path('uploads/profile/'.$user->photo));
            }

            $file = $request->file('photo');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $name);
            $user->photo = $name;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
