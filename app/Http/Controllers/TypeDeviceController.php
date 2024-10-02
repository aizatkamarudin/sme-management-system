<?php

namespace App\Http\Controllers;

use App\Models\TypeDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeDevices = TypeDevice::all();
        // dd($inventories);
        return view('typeDevices.index', compact('typeDevices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeDevices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'type_device' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if(!TypeDevice::where('type_devices', $request->type_devices)->exists()){
                $typeDevice = new TypeDevice();
                $typeDevice->type_devices = $request['type_device'];
                $typeDevice->is_deleted = 0;
                $typeDevice->save();   

                DB::commit();

                return redirect()->route('typeDevice.index')->with('success', 'New Type of Device Added successfully.');

            }else {
                return back()->withErrors('This Type of Device Already Exist');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::channel('inventory')->error('inventory store - ' . $e->getMessage());
            return back()->withErrors('Please Try Again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeDevice $typeDevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeDevice $typeDevice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeDevice $typeDevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeDevice $typeDevice)
    {
        //
    }
}
