<?php

namespace App\Http\Controllers\store\supplier;

use App\store\supplier\StoreSupplier;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreSupplierController extends Controller
{
    public function index()
    {
        $suppliers=Supplier::all();
        return view('store.supplier.manage-supplier',compact('suppliers'));
    }
    public function add_supplier()
    {
        return view('store.supplier.add-supplier');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'unique:suppliers'
        ]);

        Supplier::query()->create($request->all());
        return redirect('store/manage-supplier');
    }

    public function edit($id)
    {
        $suppliers=Supplier::query()->findOrFail($id);
        return view('store.supplier.edit-supplier',compact('suppliers'));
    }


    public function update(Request $request, $id)
    {
        $data=Supplier::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-supplier');
    }

    public function destroy($id)
    {
        $supplier = Supplier::query()->findOrFail($id);
        $supplier->delete();
        return redirect('store/manage-supplier');
    }
}
