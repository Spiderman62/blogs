<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private array $data = [];

    public function create()
    {
        $this->data['user'] = Auth::user()->only(['name', 'email', 'avatar']);
        $this->data['status'] = session('success') ?? null;
        return inertia('Profile/Profile', $this->data);
    }

    public function changeUsername(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Auth::user()->update($fields);
    }

    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'current_password' => 'required|min:4|max:255',
            'password' => 'required|min:4|max:255|confirmed',
        ]);
        $user = Auth::user();
        if (!Hash::check($fields['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }
        $user->password = Hash::make($fields['password']);
        $user->save();

        return back()->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }

    public function changeAvatar(Request $request)
    {
        $user = Auth::user()->only(['avatar']);
        if ($request->hasFile('avatar')) {
            if ($user['avatar']) {
                Storage::disk('public')->delete($user['avatar']);
            }
            $path = Storage::disk('public')->put('avatars', $request->avatar);
            $user['avatar'] = $path;
            Auth::user()->update(['avatar' => $path]);
        }
    }
}
