<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Correct import for Auth facade
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Display users or the add user form (based on condition)
    public function index()
    {
        $users = User::all();  // Fetch all users
        return view('admin.system-users', compact('users'));
    }

    // Handle form submission to add a new user
    public function addUser(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to perform this action.');
        }

        // Validation
        $request->validate([
            'U_Title' => 'required',
            'U_FName' => 'required',
            'U_LName' => 'required',
            'U_Email' => 'required|email|unique:users,U_Email',
            'U_Contact' => 'required',
            'U_Designation' => 'required',
            'U_Type' => 'required',
            'U_Password' => 'required|confirmed|min:6',
        ]);

        // Set user image based on title
        $userImage = ($request->U_Title === "Mr." || $request->U_Title === "Dr.") ? "image_man.png" : "images_woman.png";

        // Create new user
        $user = new User();
        $user->U_Title = $request->U_Title;
        $user->U_FName = $request->U_FName;
        $user->U_LName = $request->U_LName;
        $user->U_Email = $request->U_Email;
        $user->U_Contact = $request->U_Contact;
        $user->U_Designation = $request->U_Designation;
        $user->U_Type = $request->U_Type;
        $user->U_Password = Hash::make($request->U_Password);
        $user->U_Status = 0; // Default active status
        $user->U_Cratedby = Auth::id();  // Set the ID of the currently logged-in user
        $user->U_CratedDate = now();
        $user->u_Image = $userImage;
        $user->pw_status = 0; // Password not reset

        $user->save();

        // Log activity
        $userTypeName = $this->getUserTypeName($request->U_Type);
        $logMessage = "Add New User - (name: {$request->U_FName} {$request->U_LName} | type: {$userTypeName})";
        Log::channel('activity_log')->info($logMessage);

        return redirect()->route('admin.system-users')->with('success', 'User added successfully!');
    }

    private function getUserTypeName($userType)
    {
        switch ($userType) {
            case 0:
                return 'Super Admin';
            case 1:
                return 'Admin';
            case 2:
                return 'Sales Admin';
            case 3:
                return 'Sales Person';
            default:
                return 'Unknown';
        }
    }
}
