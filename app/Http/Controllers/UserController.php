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
    public function create()
    {
        $users = User::all();  // Fetch all users
        return view('admin.system-users', compact('users'));
    }

    // Handle form submission to add a new user
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'U_Title' => 'required',
            'U_FName' => 'required',
            'U_LName' => 'required',
            'U_Email' => 'required|email|unique:users,U_Email',
            'U_Contact' => 'required|numeric|regex:/^[0-9]{10}$/',
            'U_Designation' => 'required',
            'U_Type' => 'required|integer',
            'U_Password' => 'required|min:8|confirmed',
        ], [
            'U_Title.required' => 'Title is required.',
            'U_FName.required' => 'First Name is required.',
            'U_LName.required' => 'Last Name is required.',
            'U_Email.required' => 'Email is required.',
            'U_Email.email' => 'Please provide a valid email.',
            'U_Email.unique' => 'The email address is already registered.',
            'U_Contact.required' => 'Contact number is required.',
            'U_Contact.numeric' => 'Contact number must be numeric.',
            'U_Contact.regex' => 'Contact number must be exactly 10 digits.',
            'U_Designation.required' => 'Designation is required.',
            'U_Type.required' => 'User type is required.',
            'U_Password.required' => 'Password is required.',
            'U_Password.min' => 'Password must be at least 8 characters.',
            'U_Password.confirmed' => 'Passwords do not match.',
        ]);


        $userImage = ($request->U_Title === "Mr." || $request->U_Title === "Dr.") ? "image_man.png" : "images_woman.png";

        // // Hash the password
        $hashedPassword = Hash::make($request->U_Password);

        $createdBy = 1;

        // Store the new user using Eloquent
        $newUser = User::create([
            'U_Title' => $request->U_Title,
            'U_FName' => $request->U_FName,
            'U_LName' => $request->U_LName,
            'U_Email' => $request->U_Email,
            'U_Contact' => $request->U_Contact,
            'U_Designation' => $request->U_Designation,
            'U_Type' => $request->U_Type,
            'U_Password' => $hashedPassword,
            'U_Status' => 0,
            'U_Cratedby' => $createdBy, // Assuming the user is logged in
            'U_CratedDate' => now(),
            'u_Image' => $userImage,
            'pw_status' => 0,
        ]);
        return redirect()->route('admin.system-users')->with('success', 'User created successfully!');
        // Log the activity
        $userType = [
            0 => 'Super Admin',
            1 => 'Admin',
            2 => 'Sales Admin',
            3 => 'Sales Person'
        ][$request->U_Type] ?? 'Sales Person';

        // $logTime = now();
        // DB::table('activity_log')->insert([
        //     'U_id' => Auth::id(),
        //     'log_time' => $logTime,
        //     'activity' => "Add New User - (name : {$request->U_FName} {$request->U_LName} | type : $userType)"
        // ]);

        // Redirect back to the users list
       // return redirect()->route('user.index')->with('success', 'User created successfully!');
        // $users = User::all();
        // return view('user.create-system-user', compact('users'));
        // alert("User created");
    }
}