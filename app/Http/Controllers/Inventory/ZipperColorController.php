<?php

namespace App\Http\Controllers\Inventory;

use App\Merchandise\ZipperColor;
use Illuminate\Http\Request;
use App\Repositories\MerchandiseRepository;
use App\Http\Controllers\Controller;

class ZipperColorController extends Controller
{
    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function create()
    {
        $repository = $this->repository;
        $colors =ZipperColor::all();
        return view('merchandising.settings.zipper_color.create',compact('colors','repository'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        ZipperColor::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $zipper_color=ZipperColor::query()->findOrFail($id);
        return view('merchandising.settings.zipper_color.edit',compact('zipper_color','repository'));
    }


    public function update(Request $request, $id)
    {
        $data=ZipperColor::query()->find($id);
        $data->update($request->all());
        return redirect('settings/colors')->with('success','Updated successfully');
    }


    public function destroy($id)
    {
        $zipper_colors = ZipperColor::query()->findOrFail($id);
        $zipper_colors->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
