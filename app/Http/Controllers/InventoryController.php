<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\brand;
use App\Models\TypeDevice;
use App\Models\Condition;
use App\Models\Category;
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
        return view('inventory.edit', compact('inventory','brands','typeDevices','conditions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventory $inventory)
    {
        //
    }
}
