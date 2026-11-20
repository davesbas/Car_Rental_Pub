<?php

// app/Http/Controllers/UserProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function create()
    {
        // Create a default profile picture
        // You can use a placeholder URL or store a default image in your project
        $defaultImage = 'https://mdbcdn.b-cdn.net/img/new/avatars/8.webp';

        // Update the user's image_profil field
        Auth::user()->update(['image_profil' => $defaultImage]);

        return redirect()->back()->with('success', 'Profile picture created successfully.');
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the user's profile picture
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Update the user's image_profil field
        Auth::user()->update(['image_profil' => asset('storage/' . $imagePath)]);

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }
}
