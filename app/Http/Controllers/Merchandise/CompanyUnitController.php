<?php

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\CompanyUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

class CompanyUnitController extends Controller
{

    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        $Company_Unit = CompanyUnit::all();
        return view('merchandising.settings.Company_Unit.create',compact('Company_Unit','repository'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        CompanyUnit::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $company_unit=CompanyUnit::query()->findOrFail($id);
        return view('merchandising.settings.Company_Unit.edit',compact('company_unit','repository'));
    }


    public function update(Request $request, $id)
    {
        $data=CompanyUnit::query()->find($id);
        $data->update($request->all());
        return redirect('settings/company_unit')->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        $company_unit = CompanyUnit::query()->findOrFail($id);
        $company_unit->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
