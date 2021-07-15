<?php

namespace App\Http\Controllers\Inventory;

use App\ProductUnit;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductUnitController extends Controller
{
    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function create(){
        $repository = $this->repository;
        $units=ProductUnit::all();
        return view('merchandising.products.unit.create',compact('units','repository'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        ProductUnit::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $unit=ProductUnit::query()->findOrFail($id);
        return view('merchandising.products.unit.edit',compact('unit','repository'));
    }

    public function update($id, Request $request)
    {
        $data=ProductUnit::query()->find($id);
        $data->update($request->all());
        return redirect('products/units')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = ProductUnit::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
