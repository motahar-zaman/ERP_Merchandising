<?php

namespace App\Http\Controllers\Inventory;

use App\OtherTrim;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherTrimController extends Controller
{
    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $repository = $this->repository;
        $trims=OtherTrim::all();
        return view('merchandising.products.other_trims.create',compact('trims','repository'));
    }


    public function store(Request $request){
//        dd($request->all());
        OtherTrim::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $trims=OtherTrim::query()->findOrFail($id);
        return view('merchandising.products.other_trims.edit',compact('trims','repository'));
    }

    public function update($id, Request $request)
    {
        $data=OtherTrim::query()->find($id);
        $data->update($request->all());
        return redirect('products/other-trims')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = OtherTrim::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
