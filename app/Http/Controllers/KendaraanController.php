<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::latest()->paginate(6);
        return view('admin.kendaraan.car_management', compact('kendaraan'));
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
        // Validate Form :
        $this->validate($request, [
            'merek' => 'required',
            'model' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'warna' => 'required',
            'harga_sewa' => 'required',
            'jenis_sewa' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('public/images'), $imageName);
            $imagePath = 'public/images/' . $imageName;
        }

        // Fungsi Simpan Data ke dalam Database :
        Kendaraan::create([
            'merek' => $request->merek,
            'model' => $request->model,
            'image' => $imagePath,
            'warna' => $request->warna,
            'harga_sewa' => $request->harga_sewa,
            'jenis_sewa' => $request->jenis_sewa,

        ]);
        try {
            return redirect()->route('kendaraan.index')->with('success', 'Car data added successfully.');
        } catch (Exception $e) {
            return redirect()->route('kendaraan.index')->with('error', 'Failed to add car data.');
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
        $kendaraan = Kendaraan::find($id);
        return view('admin.kendaraan.edit_car', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::find($id);
        //validate form
        $this->validate($request, [
            'merek' => 'required',
            'model' => 'required',
            'warna' => 'required',
            'harga_sewa' => 'required',
            'jenis_sewa' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // New image was uploaded
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            // Delete the old image
            if ($kendaraan->image) {
                unlink($kendaraan->image);
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('public/images'), $imageName);
            $kendaraan->image = 'public/images/' . $imageName;
        }

        $kendaraan->update([
            'merek' => $request->merek,
            'model' => $request->model,
            'warna' => $request->warna,
            'image' => $kendaraan->image,
            'harga_sewa' => $request->harga_sewa,
            'jenis_sewa' => $request->jenis_sewa,
        ]);
        return redirect()->route('kendaraan.index')->with(['success' => 'Update Data Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::find($id);

        // Delete image from local folder
        unlink($kendaraan->image);
        
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with(['success' => 'Delete Data Successfully!']);
    }
}
