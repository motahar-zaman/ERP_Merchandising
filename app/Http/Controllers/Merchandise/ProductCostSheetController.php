<?php

namespace App\Http\Controllers\Merchandise;

use App\CostBreakdown;
use App\CostBreakDownFabricContent;
use App\CostBreakDownOtherTrim;
use App\CostBreakDownTrim;
use App\Fabric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchandiseRepository;

class ProductCostSheetController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $cost_breakdowns = CostBreakdown::all();
        return view('merchandising.product-cost-sheet.view-cost-breakdown-sheet',compact('cost_breakdowns'));
    }

    public function create()
    {
        $repository = $this->repository;
        $cost_breakdown = null;
        $cost_breakdown_fabric = null;
        $cost_breakdown_trim = null;
        $cost_breakdown_other_trim = null;

        return view('merchandising.product-cost-sheet.cost-sheet',compact('repository','cost_breakdown','cost_breakdown_fabric','cost_breakdown_trim','cost_breakdown_other_trim'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unit_id' => 'required',
            'country_id' => 'required',
            'style' => 'required',
        ]);

//      Cost Breakdown store start
        $cost_breakdown = new CostBreakdown();
        $cost_breakdown->unit_id = $request->unit_id;
        $cost_breakdown->quote_id = $request->quote_id;
        $cost_breakdown->payment_terms = $request->payment_terms;
        $cost_breakdown->country_id = $request->country_id;
        $cost_breakdown->merchandiser_name = $request->merchandiser_name;
        $cost_breakdown->consumer_name = $request->consumer_name;
        $cost_breakdown->product_description = $request->product_description;
        $cost_breakdown->style = $request->style ;
        $cost_breakdown->size_range = $request->size_range ;
        $cost_breakdown->specs = $request->specs ;
        $cost_breakdown->estimate_garments = $request->estimate_garments ;
        $cost_breakdown->estimate_qty = $request->estimate_qty ;
        $cost_breakdown->has_spec = $request->has_spec;
        $cost_breakdown->has_sketch = $request->has_sketch;
        $cost_breakdown->size_ratio = $request->size_ratio;
        $cost_breakdown->has_size_ratio = $request->has_size_ratio ;
        $cost_breakdown->cutting_marking = $request->cutting_marking ;
        $cost_breakdown->embroidery = $request->embroidery ;
        $cost_breakdown->embroidery_2 = $request->embroidery_2 ;
        $cost_breakdown->embroidery_3 = $request->embroidery_3 ;
        $cost_breakdown->printing = $request->printing ;
        $cost_breakdown->printing_2 = $request->printing_2 ;
        $cost_breakdown->printing_3 = $request->printing_3 ;
        $cost_breakdown->washing = $request->washing ;
        $cost_breakdown->washing_2 = $request->washing_2 ;
        $cost_breakdown->washing_3 = $request->washing_3 ;
        $cost_breakdown->washing_4 = $request->washing_4 ;
        $cost_breakdown->washing_5 = $request->washing_5 ;
        $cost_breakdown->testing_charge = $request->testing_charge ;
        $cost_breakdown->other_charge = $request->other_charge ;
        $cost_breakdown->consider = $request->consider ;


        if($request->hasFile('front_image')){
            $image = $request->file('front_image');
            $random_time = md5(time());
            $fileFormat = $image->getClientOriginalExtension();
            $random_name =substr($random_time,5,12);
            $front_image =$random_name.".".$fileFormat;
            $image->move(base_path("public/costBreakdownImage/"),$front_image);
            $cost_breakdown["front_image"]=$front_image;
        }

        if($request->hasFile('back_image')){
            $image = $request->file('back_image');
            $random_time = md5(time());
            $fileFormat = $image->getClientOriginalExtension();
            $random_name =substr($random_time,5,12);
            $back_image =$random_name.".".$fileFormat;
            $image->move(base_path("public/costBreakdownImage/"),$back_image);
            $cost_breakdown["back_image"]=$back_image;
        }

        $cost_breakdown->save() ;

        $this->store_fabric_contents($request->all(),$cost_breakdown->id,'save');
        $this->store_trims_content($request->all(),$cost_breakdown->id,'save');
        $this->store_other_trims($request->all(),$cost_breakdown->id,'save');

        return redirect('merchandise/product-cost-sheet-edit/'.$cost_breakdown->id)->with('success','Product cost sheet successfully created');

    }


    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'unit_id' => 'required',
            'country_id' => 'required',
            'style' => 'required',
        ]);
        $cost_breakdown_update = CostBreakdown::query()->findOrFail($id);
//      Cost Breakdown update start
//        $cost_breakdown = new CostBreakdown();
        $cost_breakdown['unit_id'] = $request->unit_id;
        $cost_breakdown['quote_id'] = $request->quote_id;
        $cost_breakdown['payment_terms'] = $request->payment_terms;
        $cost_breakdown['country_id'] = $request->country_id;
        $cost_breakdown['merchandiser_name'] = $request->merchandiser_name;
        $cost_breakdown['consumer_name'] = $request->consumer_name;
        $cost_breakdown['product_description'] = $request->product_description;
        $cost_breakdown['style'] = $request->style ;
        $cost_breakdown['size_range'] = $request->size_range ;
        $cost_breakdown['specs'] = $request->specs ;
        $cost_breakdown['estimate_garments'] = $request->estimate_garments ;
        $cost_breakdown['estimate_qty'] = $request->estimate_qty ;
        $cost_breakdown['has_spec'] = $request->has_spec;
        $cost_breakdown['has_sketch'] = $request->has_sketch;
        $cost_breakdown['size_ratio'] = $request->size_ratio;
        $cost_breakdown['has_size_ratio'] = $request->has_size_ratio ;
        $cost_breakdown['cutting_marking'] = $request->cutting_marking ;
        $cost_breakdown['embroidery'] = $request->embroidery ;
        $cost_breakdown['embroidery_2'] = $request->embroidery_2 ;
        $cost_breakdown['embroidery_3'] = $request->embroidery_3 ;
        $cost_breakdown['printing'] = $request->printing ;
        $cost_breakdown['printing_2'] = $request->printing_2 ;
        $cost_breakdown['printing_3'] = $request->printing_3 ;
        $cost_breakdown['washing'] = $request->washing ;
        $cost_breakdown['washing_2'] = $request->washing_2 ;
        $cost_breakdown['washing_3'] = $request->washing_3 ;
        $cost_breakdown['washing_4'] = $request->washing_4 ;
        $cost_breakdown['washing_5'] = $request->washing_5 ;
        $cost_breakdown['testing_charge'] = $request->testing_charge ;
        $cost_breakdown['other_charge'] = $request->other_charge ;
        $cost_breakdown['consider'] = $request->consider ;


        if($request->hasFile('front_image')){
            $image = $request->file('front_image');
            $random_time = md5(time());
            $fileFormat = $image->getClientOriginalExtension();
            $random_name =substr($random_time,5,12);
            $front_image =$random_name.".".$fileFormat;
            $image->move(base_path("public/costBreakdownImage/"),$front_image);
            $cost_breakdown["front_image"]=$front_image;
        }

        if($request->hasFile('back_image')){
            $image = $request->file('back_image');
            $random_time = md5(time());
            $fileFormat = $image->getClientOriginalExtension();
            $random_name =substr($random_time,5,12);
            $back_image =$random_name.".".$fileFormat;
            $image->move(base_path("public/costBreakdownImage/"),$back_image);
            $cost_breakdown["back_image"]=$back_image;
        }

        $cost_breakdown_update->update($cost_breakdown) ;

        $this->store_fabric_contents($request->all(),$id,'update');
        $this->store_trims_content($request->all(),$id,'update');
        $this->store_other_trims($request->all(),$id,'update');

        return redirect('merchandise/product-cost-sheet-edit/'.$id)->with('success','Product cost sheet successfully updated');

    }


    public function view($id)
    {
        $grand_total = 0;
        $cost_breakdown= CostBreakdown::query()->findOrFail($id);
        $fabrics= Fabric::all();
        return view('merchandising.report.costing-chart-bill',compact('cost_breakdown','grand_total','fabrics'));
    }

    public function destroy($id)
    {
        $cost_breakdown = CostBreakdown::query()->findOrFail($id);
        $cost_breakdown->other_trims()->delete();
        $cost_breakdown->fabrics()->delete();
        $cost_breakdown->trims()->delete();
        $cost_breakdown->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }


    public function store_fabric_contents($request,$query,$sm){
        $keys = preg_grep('/^fabric_id[0-9]/',array_keys($request));
        /* CostBreakDownFabricContent Delete Start*/
        if($sm =='update'){
            CostBreakDownFabricContent::query()->where('cost_breakdown_id', $query)->delete();
        }
        /* CostBreakDownFabricContent Delete End */
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'cost_breakdown_id' => $query,
                    'fabric_content' => $request['fabric_content'.$num],
                    'fabric_width' => $request['fabric_width'.$num],
                    'fabric_weight' => $request['fabric_weight'.$num],
                    'fabric_description' => $request['fabric_description'.$num],
                    'fabric_id' => $request['fabric_id'.$num],
                    'supplier_id' => $request['supplier_id'.$num],
                    'fabric_consumption' => $request['fabric_consumption'.$num],
                    'unit_id' => $request['unit_id'.$num],
                    'unit_price' => $request['unit_price'.$num],
                    'fabric_cost' => $request['fabric_cost'.$num],
                ];
                CostBreakDownFabricContent::query()->create($data);
            }
        }
    }

    public function store_trims_content($request,$query,$sm){

        $keys = preg_grep('/^distributor[0-9]/',array_keys($request));
        /* CostBreakDownTrim Delete Start*/
        if($sm =='update'){
            CostBreakDownTrim::query()->where('cost_breakdown_id', $query)->delete();
        }
        /* CostBreakDownTrim Delete End */
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){

                $data = [
                    'cost_breakdown_id' => $query,
                    'trim_id' => $request['trim_id'.$num],
                    'distributor' => $request['distributor'.$num],
                    'reference' => $request['reference'.$num],
                    'color' => $request['color'.$num],
                    'trims_description' => $request['trims_description'.$num],
                    'required_qty' => $request['required_qty'.$num],
                    'trims_price' => $request['trims_price'.$num],
                    'trims_cost' => $request['trims_cost'.$num],
                ];
                CostBreakDownTrim::query()->create($data);
            }
        }
    }

    public function store_other_trims($request,$query,$sm)
    {
        $keys = preg_grep('/^qty[0-9]/',array_keys($request));
        /* CostBreakDownOtherTrim Delete Start*/
        if($sm =='update'){
            CostBreakDownOtherTrim::query()->where('cost_breakdown_id', $query)->delete();
        }
        /* CostBreakDownOtherTrim Delete End */
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'cost_breakdown_id' => $query,
                    'provider' => $request['provider'.$num],
                    'other_trim_id' => $request['other_trim_id'.$num],
                    'other_trim_description' => $request['other_trim_description'.$num],
                    'qty' => $request['qty'.$num],
                    'price' => $request['price'.$num],
                    'cost' => $request['cost'.$num]
                ];
                CostBreakDownOtherTrim::query()->create($data);
            }
        }
    }

    public function edit($id)
    {
        $num = 0;
        $cost_sheet_id=$id;
        $trim_num = 0;
        $other_num = 0;
        $repository = $this->repository;
        $cost_breakdown = CostBreakdown::query()->findOrFail($id);
        $cost_breakdown_fabric = CostBreakDownFabricContent::query()->where('cost_breakdown_id',$id)->get();
        $cost_breakdown_trim = CostBreakDownTrim::query()->where('cost_breakdown_id',$id)->get();
        $cost_breakdown_other_trim = CostBreakDownOtherTrim::query()->where('cost_breakdown_id',$id)->get();
        return view('merchandising.product-cost-sheet.edit-cost-sheet',compact('cost_breakdown','num','trim_num','other_num','repository','cost_breakdown_fabric',
            'cost_breakdown_trim','cost_breakdown_other_trim','cost_sheet_id'));

    }




    public function search(Request $request)
    {
        $text = $request->text;
        $cost_breakdowns = CostBreakdown::query()
            ->where('style', 'LIKE', "%{$text}%")
            ->get();

        $html ="";

        foreach($cost_breakdowns as $cost_breakdown){
            $html.="<tr>";
            $html.="<td>{$cost_breakdown->country->name}</td>";
            $html.="<td>{$cost_breakdown->merchandiser_name}</td>";
            $html.="<td>{$cost_breakdown->consumer_name}</td>";
            $html.="<td>{$cost_breakdown->product_description}</td>";
            $html.="<td>{$cost_breakdown->style}</td>";
            $html.="<td>{$cost_breakdown->estimate_qty}</td>";
            $html.="<td>{$cost_breakdown->created_at}</td>";
            $html.="</tr>";
        }

        return $html;
    }
}
