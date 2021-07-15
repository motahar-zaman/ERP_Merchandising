<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\StoreBuyer;
use Illuminate\Http\Request;

class StoreBuyerController extends Controller
{

    public function index()
    {
        $buyers=Buyer::all();
        return view('store.buyer.manage-buyer',compact('buyers'));
    }
    public function add_buyer()
    {
        return view('store.buyer.add-buyer');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'unique:buyers'
        ]);
        Buyer::query()->create($request->all());
        return redirect('store/manage-buyer');
    }

    public function edit($id)
    {
        $buyers=Buyer::query()->findOrFail($id);
        return view('store.buyer.edit-buyer',compact('buyers'));
    }


    public function update(Request $request, $id)
    {
        $data=Buyer::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-buyer');
    }

    public function destroy($id)
    {
        $buyer = Buyer::query()->findOrFail($id);
        $buyer->delete();
        return redirect('store/manage-buyer');
    }
}
