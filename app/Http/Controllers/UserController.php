<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // পুরনো ছবি ডিলিট করার জন্য

class UserController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->get();

        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt('password123');

        // ইমেজ আপলোড লজিক
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['profile_image'] = $imageName;
        }

        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created with image!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // আপডেট করার সময় ইমেজ হ্যান্ডলিং
        if ($request->hasFile('image')) {
            // পুরনো ছবি থাকলে ডিলিট করা
            if ($user->profile_image && File::exists(public_path('images/' . $user->profile_image))) {
                File::delete(public_path('images/' . $user->profile_image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['profile_image'] = $imageName;
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User Updated Successfully!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        // ডিলিট করার সময় ছবিও ডিলিট করা
        if ($user->profile_image && File::exists(public_path('images/' . $user->profile_image))) {
            File::delete(public_path('images/' . $user->profile_image));
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully!');
    }
}