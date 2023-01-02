<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request) {
      $data = $request->validate([
        "name" => "required",
        "email" => "required|email",
        "avatar" => "image"
    ]);
    
    if ($request->file('avatar')) {
      if (is_file(storage_path('app/'.str_replace('storage', 'public', auth()->user()->avatar)))) {
        unlink(storage_path('app/'.str_replace('storage', 'public', auth()->user()->avatar)));
      }

      $data['avatar'] = 'storage/' . $request->file('avatar')->store('avatar', 'public');
    }
        
    User::where("id", auth()->user()->id)->update($data);
    
    return redirect("/profile")->with(['success' => 'Berhasil memperbarui profile']);
  }

}
