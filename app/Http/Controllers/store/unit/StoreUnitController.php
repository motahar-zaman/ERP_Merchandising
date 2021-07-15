<?php

namespace App\Http\Controllers\store\unit;

use App\ProductUnit;
use App\store\unit\StoreUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreUnitController extends Controller
{
    public function index()
    {
        $units=ProductUnit::all();
        return view('store.unit.manage-unit',compact('units'));
    }
    public function add_unit()
    {
        return view('store.unit.add-unit');
    }

    public function store(Request $request)
    {
        ProductUnit::query()->create($request->all());
        return redirect('store/manage-units');
    }

    public function edit($id)
    {
        $units=ProductUnit::query()->findOrFail($id);
        return view('store.unit.edit-unit',compact('units'));
    }


    public function update(Request $request, $id)
    {
        $data=ProductUnit::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-units');
    }

    public function destroy($id)
    {
        $unit = ProductUnit::query()->findOrFail($id);
        $unit->delete();
        return redirect('store/manage-units');
    }
}
