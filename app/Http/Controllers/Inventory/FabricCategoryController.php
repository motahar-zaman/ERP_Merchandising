<?php



namespace App\Http\Controllers\Inventory;

use App\FabricCategory;
use App\Repositories\MerchandiseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FabricCategoryController extends Controller
{
    private $repository;
    public function __construct(MerchandiseRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
//Manage Accessories Category
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $repository = $this->repository;
        $fabricsCategories=FabricCategory::all();
        return view('merchandising.products.fabrics_categories.create',compact('fabricsCategories','repository'));
    }


    public function store(Request $request){
//        dd($request->all());
        FabricCategory::query()->create($request->all());
        return redirect()->back()->with('success','Added successfully');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $fabricsCategories=FabricCategory::query()->findOrFail($id);
        return view('merchandising.products.fabrics_categories.edit',compact('fabricsCategories','repository'));
    }

    public function update($id, Request $request)
    {
        $data=FabricCategory::query()->find($id);
        $data->update($request->all());
        return redirect('products/fabrics_categories')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $category = FabricCategory::query()->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
