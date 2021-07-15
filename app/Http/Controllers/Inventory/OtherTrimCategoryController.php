<?php

namespace App\Http\Controllers\Inventory;

use App\OtherTrimCategory;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherTrimCategoryController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function create(){
        $repository = $this->repository;
        $trimsCategories=OtherTrimCategory::all();
        return view('merchandising.products.other_trims_category.create',compact('trimsCategories','repository'));
    }


    public function store(Request $request){
//        dd($request->all());
        OtherTrimCategory::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $trimsCategories=OtherTrimCategory::query()->findOrFail($id);
        return view('merchandising.products.other_trims_category.edit',compact('trimsCategories','repository'));
    }

    public function update($id, Request $request)
    {
        $data=OtherTrimCategory::query()->find($id);
        $data->update($request->all());
        return redirect('products/other-trims-categories');

    }

    public function destroy($id)
    {
        $category = OtherTrimCategory::query()->findOrFail($id);
        $category->delete();
        return redirect('products/other-trims-categories');
    }
}
