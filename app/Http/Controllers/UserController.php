<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Penyewaan;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(6);
        return view('admin.user.user_management', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Fungsi Simpan Data ke dalam Database :
        User::create([
            'image_profil' => 'Profile Picture',
            'username' => 'username dummy',
            'password' => 'dummy pass',
            'email' => 'dummy@gmail.com',
            'verify_key' => 'adsad5555',
            'active' => 0023232,
            'num_phone' => 12322,
            'nik' => 01323232,
            'born_date' => '13-01-2023',

        ]);
        try {
            return redirect()->route('user.index')->with('success', 'Car data added successfully.');
        } catch (Exception $e) {
            return redirect()->route('user.index')->with('error', 'Failed to add car data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        // Delete image from local folder
        // unlink($user->image_profil);    ->> karena blom upload profile

        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Delete Data Successfully!']);
    }

    public function count() {
        $userCount = User::count();
        $kendaraanCount = Kendaraan::count();
        $penyewaanCount = Penyewaan::count();
        return view('admin.home_admin', compact('userCount', 'kendaraanCount', 'penyewaanCount'));
  }
}
