<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    public function index()
    {
        $vehicles = Kendaraan::all();

        return response([
            'message' => 'All Vehicles Retrieved',
            'data' => $vehicles
        ], 200);
    }

    public function show($id)
    {
        $vehicle = Kendaraan::find($id);

        if (!$vehicle) {
            return response([
                'message' => 'Vehicle Not Found',
                'data' => null
            ], 404);
        }

        return response([
            'message' => 'Vehicle Found',
            'data' => $vehicle
        ], 200);
    }

    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'merek' => 'required|max:255',
            'model' => 'required|max:255',
            'harga_sewa' => 'required|numeric',
            'jenis_sewa' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $vehicle = Kendaraan::create($storeData);

        return response([
            'message' => 'Vehicle Added Successfully',
            'data' => $vehicle,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $vehicle = Kendaraan::find($id);

        if (!$vehicle) {
            return response([
                'message' => 'Vehicle Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();

        $validate = Validator::make($updateData, [
            'merek' => 'required|max:255',
            'model' => 'required|max:255',
            'harga_sewa' => 'required|numeric',
            'jenis_sewa' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $vehicle->update($updateData);

        return response([
            'message' => 'Vehicle Updated Successfully',
            'data' => $vehicle,
        ], 200);
    }

    public function destroy($id)
    {
        $vehicle = Kendaraan::find($id);

        if (!$vehicle) {
            return response([
                'message' => 'Vehicle Not Found',
                'data' => null
            ], 404);
        }

        if ($vehicle->delete()) {
            return response([
                'message' => 'Vehicle Deleted Successfully',
                'data' => $vehicle,
            ], 200);
        }

        return response([
            'message' => 'Delete Vehicle Failed',
            'data' => null,
        ], 400);
    }
}
