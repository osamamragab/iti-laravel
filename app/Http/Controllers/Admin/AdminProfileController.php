<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.show', compact('admin'));
    }

    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
{
    /** @var \App\Models\Admin $admin */
    $admin = Auth::guard('admin')->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->password) {
        $admin->password = Hash::make($request->password);
    }

    $admin->save(); // IDE لن يظهر تحذير الآن

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
}

}

