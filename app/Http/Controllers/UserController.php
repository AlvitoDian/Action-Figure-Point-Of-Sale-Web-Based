<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('pages.user.edit', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {   
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'oldImage' => 'nullable'
        ];

        $data = $request->validate($rules);

        $item = User::findOrFail($id);

        if($request['photo_profile']){
            
            if($data['oldImage']) {
                Storage::disk('public')->delete($data['oldImage']);
            }
           $data['photo_profile'] = $request->file('photo_profile')->store('photo-profile-users', 'public');
        }

        $item->update($data);

        return redirect()->route('profile', Auth::user()->id)->with('success', 'Profil telah Diubah');
    }
}
