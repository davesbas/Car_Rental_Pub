<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewaan = Penyewaan::latest()->paginate(6);
        return view('admin.penyewaan.penyewaan_management', compact('penyewaan'));
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
        $kendaraan = Kendaraan::find($request->id_kendaraan);
        // Validate Form :
        $this->validate($request, [
            'lama_sewa' => 'required|numeric|min:1',
        ]);

        $user = Auth::user()->id;
        $total_harga = $kendaraan->harga_sewa * $request->lama_sewa;

        // Fungsi Simpan Data ke dalam Database :
        Penyewaan::create([
            'id_user' => $user,
            'id_kendaraan' => $kendaraan->id,
            'lama_sewa' => $request->lama_sewa,
            'total_harga_penyewaan' => $total_harga,
            'status' => 'Ongoing',
        ]);

        try {
            return redirect()->route('penyewaan.index')->with('success', 'Penyewaan added successfully.');
        } catch (Exception $e) {
            return redirect()->route('penyewaan.index')->with('error', 'Failed to add Penyewaan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $penyewaan = Penyewaan::find($id);

        if (!$penyewaan) {
            dd("Penyewaan not found for id: $id");
        }

        $penyewaan->update([
            'status' => 'Finished',
        ]);

        return redirect()->route('penyewaan.index')->with(['success' => 'Update Data Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyewaan = Penyewaan::find($id);
        $penyewaan->delete();

        return redirect()->route('penyewaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}