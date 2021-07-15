<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;

use App\Repositories\MerchandiseRepository;
use App\Trim;
use Illuminate\Http\Request;

class TrimsController extends Controller
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
        $trims=Trim::all();
        return view('merchandising.products.trims.create',compact('trims','repository'));
    }


    public function store(Request $request){
//        dd($request->all());
        Trim::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $trims=Trim::query()->findOrFail($id);
        return view('merchandising.products.trims.edit',compact('trims','repository'));
    }

    public function update($id, Request $request)
    {
        $data=Trim::query()->find($id);
        $data->update($request->all());
        return redirect('products/trims')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = Trim::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
