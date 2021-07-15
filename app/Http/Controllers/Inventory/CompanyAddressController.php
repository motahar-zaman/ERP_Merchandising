<?php

namespace App\Http\Controllers\Inventory;

use App\CompanyAddress;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyAddressController extends Controller
{
    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
//Manage Company Address
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $repository = $this->repository;
        $companyAddress=CompanyAddress::all();
        return view('merchandising.settings.company_address.create',compact('companyAddress','repository'));
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        CompanyAddress::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $companyAddress=CompanyAddress::query()->findOrFail($id);
        return view('merchandising.settings.company_address.edit',compact('companyAddress','repository'));
    }

    public function update($id, Request $request)
    {
        $data=CompanyAddress::query()->find($id);
        $data->update($request->all());
        return redirect('settings/company_address')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $company_address = CompanyAddress::query()->findOrFail($id);
        $company_address->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
