<?php

namespace App\Http\Controllers\store\mrr;

use App\MRR;
use App\Buyer;
use App\Supplier;
use App\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MRRController extends Controller
{
    public function index()
    {
        $mrr = MRR::orderBy('id','asc')->get();
        return view('store.mrr.index',compact('mrr'));
    }

    public function print()
    {
        $mrr = MRR::orderBy('id','asc')->get();
        return view('store.mrr.mrr-print',compact('mrr'));
    }

    public function create()
    {
    	$buyers = Buyer::get(['id', 'name']);
    	$suppliers = Supplier::get(['id', 'name']);
    	$units = ProductUnit::get(['id', 'name']);
        return view('store.mrr.create',compact('buyers', 'suppliers', 'units'));
    }

    public function store(Request $request)
    {
    	//return $request->all();
    	$mrr = new MRR;
    	$mrr->fill($request->all())->save();

    	if($mrr){
    		session()->flash('success', 'MRR Saved Successfully !');
    	}else{
    		session()->flash('error', 'Something Went Wring !');
    	}
    	
        return back();
    }

    public function edit($id)
    {
    	$mrr = MRR::find($id);
    	$buyers = Buyer::get(['id', 'name']);
    	$suppliers = Supplier::get(['id', 'name']);
    	$units = ProductUnit::get(['id', 'name']);
        return view('store.mrr.edit',compact('mrr','buyers', 'suppliers', 'units'));
    }

    public function update(Request $request, $id)
    {
    	//return $request->all();
    	$mrr = MRR::find($id);
    	$mrr->fill($request->all())->save();

    	if($mrr){
    		session()->flash('success', 'MRR Updated Successfully !');
    	}else{
    		session()->flash('error', 'Something Went Wring !');
    	}
    	
        return back();
    }

    public function destroy($id)
    {
    	$mrr = MRR::find($id)->delete();
    	if($mrr){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }
}
