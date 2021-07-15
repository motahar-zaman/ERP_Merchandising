<?php

namespace App\Http\Controllers\Inventory;

use App\Repositories\MerchandiseRepository;
use App\TrimsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrimsCategoryController extends Controller
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
        $trimsCategories=TrimsCategory::all();
        return view('merchandising.products.trims_category.create',compact('trimsCategories','repository'));
    }


    public function store(Request $request){
//        dd($request->all());
        TrimsCategory::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $trimsCategories=TrimsCategory::query()->findOrFail($id);
        return view('merchandising.products.trims_category.edit',compact('trimsCategories','repository'));
    }

    public function update($id, Request $request)
    {
        $data=TrimsCategory::query()->find($id);
        $data->update($request->all());
        return redirect('products/trims-categories');

    }

    public function destroy($id)
    {
        $category = TrimsCategory::query()->findOrFail($id);
        $category->delete();
        return redirect('products/trims-categories');
    }

}
