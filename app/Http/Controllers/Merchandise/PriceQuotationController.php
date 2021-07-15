<?php

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\PriceQuotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;


class PriceQuotationController extends Controller
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
        $price_quote = PriceQuotation::all();
        return view('merchandising.settings.Price.create',compact('price_quote','repository'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        PriceQuotation::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $price_quotation=PriceQuotation::query()->findOrFail($id);
        return view('merchandising.settings.Price.edit',compact('price_quotation','repository'));
    }

    public function update(Request $request, $id)
    {
        $data=PriceQuotation::query()->find($id);
        $data->update($request->all());
        return redirect('settings/price_quotation')->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        $price_quote = PriceQuotation::query()->findOrFail($id);
        $price_quote->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
