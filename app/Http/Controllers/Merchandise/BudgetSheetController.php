<?php

namespace App\Http\Controllers\Merchandise;

use App\Merchandise\BudgetSheet;
use App\BudgetSheetFabricContent;
use App\BudgetSheetOtherTrim;
use App\BudgetSheetTrim;
use App\CostBreakdown;
use App\CostBreakDownFabricContent;
use App\CostBreakDownOtherTrim;
use App\CostBreakDownTrim;
use App\Repositories\MerchandiseRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BudgetSheetController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index($id, Request $request )
    {
        $budget_sheets = BudgetSheet::query()->findOrFail($id);
        $date = Carbon::now()->toDateString();
        $total_lc_value =$budget_sheets->estimate_qty*5;

        if ($request->has('pdf')){
            view()->share('budget_sheets',$budget_sheets);
            $pdf = PDF::loadView('merchandising.report.budget-sheet');
            return $pdf->download('budget-sheet.pdf');
        }

        return view('merchandising.report.budget-sheet',compact('budget_sheets','date','total_lc_value'));
    }

    public function all_budget_sheets(){
        $budget_sheets = BudgetSheet::all();
        return view('merchandising.budget_sheet.all-budget-sheet',compact('budget_sheets'));
    }

    public function create($id)
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

        return view('merchandising.budget_sheet.cost-sheet',compact('cost_breakdown','num','trim_num','other_num','repository','cost_breakdown_fabric','cost_breakdown_trim','cost_breakdown_other_trim','cost_sheet_id'));
    }

    public function store(Request $request)
    {
        //return $request->all();
//      Cost Breakdown store start
        $cost_breakdown = new BudgetSheet();
        $cost_breakdown->country_id = $request->country_id ;
        $cost_breakdown->unit_id = $request->unit_id ;
        $cost_breakdown->quote_id = $request->quote_id ;
        $cost_breakdown->payment_terms = $request->payment_terms ;
        $cost_breakdown->cost_sheet_id = $request->cost_sheet_id ;
        $cost_breakdown->merchandiser_name = $request->merchandiser_name ;
        $cost_breakdown->consumer_name = $request->consumer_name ;
        $cost_breakdown->product_description = $request->product_description ;
        $cost_breakdown->style = $request->style ;
        $cost_breakdown->size_range = $request->size_range ;
        $cost_breakdown->specs = $request->specs ;
        $cost_breakdown->estimate_garments = $request->estimate_garments ;
        $cost_breakdown->fob = $request->fob ;
        $cost_breakdown->consumption = $request->consumption ;
        $cost_breakdown->pocket_fab_yy = $request->pocket_fab_yy ;
        $cost_breakdown->estimate_qty = $request->estimate_qty ;
        $cost_breakdown->has_spec = $request->has_spec ;
        $cost_breakdown->has_sketch = $request->has_sketch ;
        $cost_breakdown->size_ratio = $request->size_ratio ;
        $cost_breakdown->has_size_ratio = $request->has_size_ratio ;
        $cost_breakdown->cutting_marking = $request->cutting_marking ;
        $cost_breakdown->embroidery = $request->embroidery_1 ;
        $cost_breakdown->embroidery_2 = $request->embroidery_2 ;
        $cost_breakdown->embroidery_3 = $request->embroidery_3 ;
        $cost_breakdown->printing = $request->printing_1 ;
        $cost_breakdown->printing_2 = $request->printing_2 ;
        $cost_breakdown->printing_3 = $request->printing_3 ;
        $cost_breakdown->washing = $request->washing_1 ;
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
            $image->move(base_path("public/budgetSheetImage/"),$front_image);
            $cost_breakdown["front_image"]=$front_image;
        }

        if($request->hasFile('back_image')){
            $image = $request->file('back_image');
            $random_time = md5(time());
            $fileFormat = $image->getClientOriginalExtension();
            $random_name =substr($random_time,5,12);
            $back_image =$random_name.".".$fileFormat;
            $image->move(base_path("public/budgetSheetImage/"),$back_image);
            $cost_breakdown["back_image"]=$back_image;
        }
        $cost_breakdown->save() ;

        $this->store_fabric_contents($request->all(),$cost_breakdown->id);
        $this->store_trims_content($request->all(),$cost_breakdown->id);
        $this->store_other_trims($request->all(),$cost_breakdown->id);

        return redirect('report/view-all-budget-sheets');
    }

    public function store_fabric_contents($request,$query){
        $keys = preg_grep('/^fabric_id[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){

                $data = [
                    'budget_sheet_id' => $query,
                    'fabric_content' => $request['fabric_content'.$num],
                    'fabric_description' => $request['fabric_description'.$num],
                    'fabric_id' => $request['fabric_id'.$num],

                    'original_qty' => $request['fab_orginal_qty'.$num],
                    'fab_booking' => $request['fab_booking'.$num],
                    'order_qty' => $request['fab_order_qty'.$num],
                    'price' => $request['fab_price'.$num],
                    'total_price' => $request['fab_total_price'.$num],

                    'supplier_id' => $request['supplier_id'.$num],
//                    'fabric_consumption' => $request['fabric_consumption'.$num],

//                    'unit_price' => $request['unit_price'.$num],
//                    'fabric_cost' => $request['fabric_cost'.$num],
                ];

                BudgetSheetFabricContent::insert($data);
            }
        }
    }

    public function store_trims_content($request,$query){
//        dd($request);
        $keys = preg_grep('/^reference[0-9]/',array_keys($request));

        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){

                $data = [
                    'budget_sheet_id' => $query,
                    'trim_id' => $request['trim_id'.$num],
                    'reference' => $request['reference'.$num],
                    'color' => $request['color'.$num],
                    'trims_description' => $request['trims_description'.$num],

                    'trim_original_qty' => $request['trim_original_qty'.$num],
                    'trims_booking' => $request['trims_booking'.$num],
                    'trim_order_qty' => $request['trim_order_qty'.$num],
                    'trims_price' => $request['trims_price'.$num],
                    'trims_total_price' => $request['trims_total_price'.$num],

                    'distributor' => $request['distributor'.$num],

//                    'required_qty' => $request['required_qty'.$num],
//                    'trims_cost' => $request['trims_cost'.$num],
                ];
                BudgetSheetTrim::query()->create($data);
            }
        }
    }

    public function store_other_trims($request,$query)
    {
//        dd($request,$query);
        $keys = preg_grep('/^provider[0-9]/',array_keys($request));
        foreach($keys as $key){
            preg_match('!\d+!',$key,$number);
            foreach($number as $num){
                $data = [
                    'budget_sheet_id' => $query,
                    'provider' => $request['provider'.$num],
                    'other_trim_id' => $request['other_trim_id'.$num],
                    'other_trim_description' => $request['other_trim_description'.$num],
                    'qty' => $request['other_trims_qty'.$num],

                    'other_trims_booking' => $request['other_trims_booking'.$num],
                    'other_trim_order_qty' => $request['other_trim_order_qty'.$num],

                    'price' => $request['other_trims_price'.$num],
                    'cost' => $request['other_trims_total_price'.$num]
                ];
//                dd($data);
                BudgetSheetOtherTrim::query()->create($data);
            }
        }
    }

    public function all_cost_sheets(){
        $cost_breakdowns = CostBreakdown::all();
        return view('merchandising.budget_sheet.all-cost-breakdown-sheet',compact('cost_breakdowns'));
    }

    public function edit($id)
    {
        //dd($id);
        $num = 0;
        $cost_sheet_id=$id;
        $trim_num = 0;
        $other_num = 0;
        $repository = $this->repository;
        $cost_breakdown = BudgetSheet::query()->findOrFail($id);
        $cost_breakdown_fabric = BudgetSheetFabricContent::query()->where('budget_sheet_id',$id)->get();
        $cost_breakdown_trim = BudgetSheetTrim::query()->where('budget_sheet_id',$id)->get();
        $cost_breakdown_other_trim = BudgetSheetOtherTrim::query()->where('budget_sheet_id',$id)->get();
        return view('merchandising.budget_sheet.edit-budget-sheet',compact('cost_breakdown','num','trim_num','other_num','repository','cost_breakdown_fabric','cost_breakdown_trim','cost_breakdown_other_trim','cost_sheet_id'));
    }

    public function destroy($id)
    {
        $cost_breakdown = BudgetSheet::query()->findOrFail($id);
        $cost_breakdown->other_trims()->delete();
        $cost_breakdown->fabrics()->delete();
        $cost_breakdown->trims()->delete();
        $cost_breakdown->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $budget_sheets = BudgetSheet::query()
            ->where('style', 'LIKE', "%{$text}%")
            ->get();

        $html ="";

        foreach($budget_sheets as $budget_sheet){
            $html.="<tr>";
            $html.="<td>{$budget_sheet->country->name}</td>";
            $html.="<td>{$budget_sheet->merchandiser_name}</td>";
            $html.="<td>{$budget_sheet->consumer_name}</td>";
            $html.="<td>{$budget_sheet->product_description}</td>";
            $html.="<td>{$budget_sheet->style}</td>";
            $html.="<td>{$budget_sheet->estimate_qty}</td>";
            $html.="<td>{$budget_sheet->created_at}</td>";
            $html.="</tr>";
        }

        return $html;
    }

    public function pdf()
    {

    }
}
