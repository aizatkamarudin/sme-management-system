<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\brand;
use App\Models\TypeDevice;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = inventory::all();
        // dd($inventories);
        return view('inventory.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = brand::all();
        $typeDevices = TypeDevice::all();
        $conditions = Condition::all();
        $categories = Category::all();
        return view('inventory.create', compact('brands','typeDevices','conditions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'brand' => 'required',
            'device' => 'required',
            'model_number' => 'required',
            'serial_number' => 'required',
            'category' => 'required',
            'condition' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if(!inventory::where('serial_number', $request->serial_number)->exists()){
                $inventory = new inventory();
                $inventory->brand_id = $request['brand'];
                $inventory->serial_number = $request['serial_number'];
                $inventory->condition = $request['condition'];
                $inventory->category = $request['category'];
                $inventory->is_deleted = 0;
                $inventory->save();   

                DB::commit();

                return redirect()->route('inventory.index')->with('success', 'New Inventory Added successfully.');

            }else {
                return back()->withErrors('Please Try Again');
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
    public function show($id)
    {
        $inventory = inventory::find($id);
        // $inventories = inventory::all();
        // dd($inventories);
        // dd($inventory);
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventory = inventory::find($id);
        $brands = brand::all();
        $typeDevices = TypeDevice::all();
        $conditions = Condition::all();
        $categories = Category::all();
        $models = Models::all();
        return view('inventory.edit', compact('inventory','brands','typeDevices','conditions', 'categories', 'models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($request);
        $inventory = inventory::find($id);
        $inventory->brand_id = $request->get('brand');
        $inventory->serial_number = $request->get('serial_number');
        $inventory->category = $request->get('category');
        $inventory->condition = $request->get('condition');
        //         $staff->full_name = $request->get('full_name');
        //         $staff->category = $request->get('category');
        //         $staff->position = $request->get('position');
        //         $staff->staff_no = $request->get('staff_no');
        //         $staff->gender = $request->get('gender');
        //         $staff->contact_no = $request->get('contact_no');
        //         $staff->profile_pic = $profile_pic;
        //         $staff->dept_id = $request->get('department')['0'];
        //         $staff->boss_to_company = $request->get('boss_to_company');
        //         $staff->reporting_to = $request->get('reporting_to');
        //         $staff->service_date = Carbon::parse($request->service_date)->format('Y-m-d');
        //         $staff->manager_multiple_department = 0;
        //         $staff->user->name = $request->get('username');
        //         $staff->user->email = $request->get('email');
        //         $staff->user->status = $request->get('status');
        //         $staff->save();
        //         $staff->user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventory $inventory)
    {
        //
    }
}
