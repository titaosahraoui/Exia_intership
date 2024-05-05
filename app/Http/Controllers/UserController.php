<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'name' => 'required',
                'prenom' => 'required',
                'promotion' => 'required',
                'role' => 'required|in:admin,etudiant,pilote',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            // Get the uploaded file
            $photo = $request->file('photo');

            // Read the file contents and convert it to base64
            $photoData = base64_encode(file_get_contents($photo->getPathname()));

            // Create a new user instance
            $user = new User();
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->promotion = $request->promotion;
            $user->role = $request->role;
            $user->photo = $photoData;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            // Save the user
            $user->save();

            // Redirect or return a response
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            // Handle the exception
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function ajouter()
    {

        return view('users.store'); // Pass users to the view
    }
    public function index()
    {
        $users = User::paginate(2); // Fetch users with pagination, 10 users per page
        return view('users.index', ['users' => $users]); // Pass paginated users to the view
    }
    public function modifier($id)
    {
        $user = User::find($id);
        return view('users.update', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'promotion' => 'required',
            'role' => 'required|in:admin,etudiant,pilote',
            'password' => 'sometimes|min:6',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:4048', // max 4MB
        ]);

        // Find the user by ID
        $user = User::find($id);

        // Update the user's properties
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->promotion  = $request->promotion;



        // Update other properties as needed...
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoData = base64_encode(file_get_contents($photo->getPathname()));
            $user->photo = $photoData;
        }

        // Save the changes
        $user->save();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function supp($id)
    {
        $user = User::find($id);
        return view('users.delete', ['user' => $user]);
    }
    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Check if the user exists with the provided email
        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (Auth::attempt($credentials)) {
                // Authentication passed
                return redirect()->intended('/');
            } else {
                // If user exists and Auth::attempt() fails, password is incorrect
                return back()->withErrors([
                    'password' => 'The password is incorrect.',
                ])->withInput($request->only('email'));
            }
        }

        // Default error if user doesn't exist or if password is incorrect
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
