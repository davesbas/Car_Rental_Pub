<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    public function register() {
        return view('login/register');
    }

    public function actionRegister(Request $request)
    {
        $userData = $request->all();
        $validator = validator::make($userData, [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|max:255|unique:users',
            'num_phone' => 'required|string|min:8|max:10',
            'nik' => 'required|string|max:10|unique:users',
            'image_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image
            'born_date' => 'required|date',
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return back();
        }
    
        $str = Str::random(100);
    
        $image_profil = null;
    
        if ($request->hasFile('image_profil')) {
            // Store the uploaded file in the 'public' disk
            $path = $request->file('image_profil')->store('profile_pictures', 'public');
            
            // Include the file path in the user creation process
            $image_profil = 'storage/' . $path;
        }
    
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'verify_key' => $str,
            'num_phone' => $request->num_phone,
            'nik' => $request->nik,
            'image_profil' => $image_profil,
            'born_date' => $request->born_date,
            'role' => 'user',
        ]);
    
        $detail = [
            'website' => 'Rental Mobil',
            'username' => $request->username,
            'datetime' => now(),
            'url' => url('/verify/' . $str)
        ];
    
        Mail::to($request->email)->send(new MailSend($detail));
    
        Session::flash('message', 'Link verifikasi telah dikirim ke email anda. Silahkan cek email anda untuk mengaktifkan akun.');
        return redirect('register');
    }

    public function verify($verify_key) {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

            if($keyCheck) {
                $user = User::where('verify_key', $verify_key)
                    ->update([
                        'active' => 1,
                        'email_verified_at' => date('Y-m-d H:i:s'),
                    ]);
                return "Verifikasi berhasil. Akun anda sudah aktif.";
            } else {
                return "Keys tidak valid.";
            }
    }

    public function updateProfilePicture(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Handle the uploaded profile picture
        if ($request->hasFile('profile_picture')) {
            // Store the uploaded file in the 'public' disk
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            // Update the user's profile picture path
            $user->image_profil = 'storage/' . $path;
            $user->save();

            // Redirect back to the profile page with a success message
            return Redirect::back()->with('success', 'Profile picture updated successfully!');
        }

        // If the file upload fails, redirect back with an error message
        return Redirect::back()->with('error', 'Failed to update profile picture. Please try again.');
    }

}
