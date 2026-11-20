<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Penyewaan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //tambahkan ini
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('user/home_user', compact('kendaraan'));
    }

    public function indexCarUser()
    {
        $kendaraan = Kendaraan::all();
        return view('user/car_user', compact('kendaraan'));
    }

    public function create($id)
    {
        $kendaraan = Kendaraan::find($id);
        return view('user/car_penyewaan', compact('kendaraan'));
    }

    public function store(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        // Validate Form :
        $this->validate($request, [
            'lama_sewa' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $total_harga = $kendaraan->harga_sewa * $request->lama_sewa;

        // Fungsi Simpan Data ke dalam Database :
        try {
            Penyewaan::create([
                'id_user' => $user->id_user,
                'id_kendaraan' => $kendaraan->id,
                'lama_sewa' => $request->lama_sewa,
                'total_harga_penyewaan' => $total_harga,
                'status' => 'Ongoing',
            ]);
            return redirect()->route('car_user.indexCarUser')->with('success', 'Penyewaan added successfully.');
        } catch (Exception $e) {
            return redirect()->route('car_user.indexCarUser')->with('error', 'Failed to add Penyewaan.');
        }
    }
}
