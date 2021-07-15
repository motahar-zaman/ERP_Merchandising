<?php

namespace App\Http\Controllers;

use App\Repositories\HrmRepository;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{

    function __construct(HrmRepository $repository)
    {
        $this->middleware('auth');
    }
    //Manage Supplier
    public function manage_supplier(){
        $suppliers=Supplier::all();
        return view('merchandising.supplier.manage-supplier',compact('suppliers'));
    }
    public function add_supplier(){
        return view('merchandising.supplier.add-supplier');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            //'supplier_code' => 'required',
            'name' => 'required|min:4',
            'email' => 'email|unique:suppliers',
            'address' => 'max:1000'
        ]);
        Supplier::query()->create($request->all());
        return redirect('merchandise/manage-supplier');
    }

    public function edit($id)
    {
        $suppliers=Supplier::query()->findOrFail($id);
        return view('merchandising.supplier.edit-supplier',compact('suppliers'));
    }

    public function update($id, Request $request)
    {
        $data=Supplier::query()->find($id);
        $data->update($request->all());
        return redirect('merchandise/manage-supplier');

    }

    public function destroy($id)
    {
        $supplier = Supplier::query()->findOrFail($id);
        $supplier->delete();
        return redirect('merchandise/manage-supplier');
    }


}
