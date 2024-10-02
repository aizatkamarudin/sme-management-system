<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        // dd($inventories);
        return view('brandManagement.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brandManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'brand_name' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if(!brand::where('name', $request->brand_name)->exists()){
                $brand = new brand();
                $brand->name = $request['brand_name'];
                $brand->is_deleted = 0;
                $brand->save();   

                DB::commit();

                return redirect()->route('brand.index')->with('success', 'New Brand Added successfully.');

            }else {
                return back()->withErrors('This Brand Already Exist');
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
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand $brand)
    {
        $delete = $brand->delete();
        dd($delete);
        if ($delete) {
            return redirect()->route('brandManagement.index')
                ->with('success', 'Department deleted successfully.');
        } else {
            return back()->withErrors(['msg', 'Department have staffs']);
        }
    }
}
