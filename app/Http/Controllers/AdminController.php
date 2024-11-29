<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showRegister()
    {
        return view('admin.register');
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }

        session(['LoggedAdminInfo' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    public function showDashboard()
    {
        $admin = $this->getLoggedAdmin();

        return view('admin.dashboard', ['LoggedAdminInfo' => $admin]);
    }

    public function showProfile()
    {
        $admin = $this->getLoggedAdmin();

        return view('admin.profile', ['LoggedAdminInfo' => $admin]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = $this->getLoggedAdmin();

        $admin->name = $request->name;
        $admin->bio = $request->bio;

        if ($request->hasFile('picture')) {
            if ($admin->picture) {
                Storage::disk('public')->delete($admin->picture);
            }
            $admin->picture = $request->file('picture')->store('profile_pictures', 'public');
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    public function logout()
    {
        session()->forget('LoggedAdminInfo');
        return redirect()->route('admin.login');
    }

    public function showUserList()
    {
        $admin = $this->getLoggedAdmin();
        $users = User::all();

        return view('admin.user', [
            'LoggedAdminInfo' => $admin,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'email', 'role');

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('profile_pictures', 'public');
        }

        User::create($data);

        return redirect()->route('admin.user')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->fill($request->only('name', 'email', 'role'));

        if ($request->hasFile('picture')) {
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);
            }
            $user->picture = $request->file('picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->picture) {
            Storage::disk('public')->delete($user->picture);
        }

        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }

    private function getLoggedAdmin()
    {
        $adminId = session('LoggedAdminInfo');
        $admin = Admin::find($adminId);

        if (!$admin) {
            session()->forget('LoggedAdminInfo');
            abort(403, 'Unauthorized access. Please login.');
        }

        return $admin;
    }
}
