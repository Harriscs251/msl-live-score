<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        return view('profile.edit');
    }

    // Update the user profile
    public function update(Request $request)
    {
        // Validate the data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Get the logged-in user
        $user = auth()->user();

        // Update the user's name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // If a new password is provided, update it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('profile_images', 'public');
            $user->image = $path;
        }

        // Save the updated user info
        $user->save();

        // Redirect back to the profile edit page with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
