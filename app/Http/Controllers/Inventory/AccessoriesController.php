<?php

namespace App\Http\Controllers\Inventory;

use App\Accessories;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
//Manage Accessories Category
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $repository = $this->repository;
        $accessories=Accessories::all();
        return view('merchandising.products.accessories.create',compact('accessories','repository'));
    }

    public function store(Request $request){
        //dd($request->all());
        Accessories::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $accessories=Accessories::query()->findOrFail($id);
        return view('merchandising.products.accessories.edit',compact('accessories','repository'));
    }

    public function update($id, Request $request)
    {
        $data=Accessories::query()->find($id);
        $data->update($request->all());
        return redirect('products/accessories')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = Accessories::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
