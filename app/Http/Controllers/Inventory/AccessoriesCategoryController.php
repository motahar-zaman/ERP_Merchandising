<?php

namespace App\Http\Controllers\Inventory;

use App\AccessoriesCategory;
use App\Http\Requests\AccessoriesCategoryRequest;
use App\Repositories\MerchandiseRepository;
use App\Http\Controllers\Controller;

class AccessoriesCategoryController extends Controller
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
        $categories=AccessoriesCategory::all();
        return view('merchandising.products.accessories_categories.create',compact('categories','repository'));
    }


    public function manage_category(){
        $categories=AccessoriesCategory::all();
        return view('merchandising.accessories.manage-category',compact('categories'));
    }
    public function add_category(){
        return view('merchandising.accessories.add-category');
    }


    public function store(AccessoriesCategoryRequest $request){
//        dd($request->all());
        AccessoriesCategory::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $accessoriesCategory =AccessoriesCategory::query()->findOrFail($id);
        return view('merchandising.products.accessories_categories.edit',compact('accessoriesCategory','repository'));
    }

    public function update($id, AccessoriesCategoryRequest $request)
    {
        $data=AccessoriesCategory::query()->find($id);
        $data->update($request->all());
        return redirect('products/accessories_categories')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = AccessoriesCategory::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }


}
