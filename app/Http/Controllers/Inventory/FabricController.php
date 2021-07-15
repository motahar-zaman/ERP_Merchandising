<?php

namespace App\Http\Controllers\Inventory;
use App\Fabric;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Manage Accessories Category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $repository = $this->repository;
        $fabrics = Fabric::all();
        return view('merchandising.products.fabrics.create',compact('fabrics','repository'));
    }

    public function store(Request $request){
        Fabric::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $fabric=Fabric::query()->findOrFail($id);
        return view('merchandising.products.fabrics.edit',compact('fabric','repository'));
    }

    public function update($id, Request $request)
    {
        $data=Fabric::query()->find($id);
        $data->update($request->all());
        return redirect('products/fabrics')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = Fabric::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
