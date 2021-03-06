<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Repositories\HrmRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyerController extends Controller
{
    private $repository;
    function __construct(HrmRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }
    //Manage Buyer
    public function index()
    {
        $buyers=Buyer::all();
        return view('merchandising.buyer.manage-buyer',compact('buyers'));
    }

    public function add_buyer()
    {
        return view('merchandising.buyer.add-buyer');
    }

    public function store(Request $request){
//        dd($request->all());
        $this->validate($request,[
            'buyer_code' => 'required',
            'name' => 'required|min:4',
            'email' => 'email|unique:buyers',
        ]);
        Buyer::query()->create($request->all());
        return redirect('merchandise/manage-buyer');
    }

    public function edit($id)
    {
        $buyers=Buyer::query()->findOrFail($id);
        return view('merchandising.buyer.edit-buyer',compact('buyers'));
    }

    public function update($id, Request $request)
    {
        $data=Buyer::query()->find($id);
        $data->update($request->all());
        return redirect('merchandise/manage-buyer');

    }

    public function destroy($id)
    {
        $buyer = Buyer::query()->findOrFail($id);
        $buyer->delete();
        return redirect('merchandise/manage-buyer');
    }


}
