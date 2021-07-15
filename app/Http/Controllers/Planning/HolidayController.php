<?php

namespace App\Http\Controllers\Planning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Planning\LineLoading\Holiday;
use App\Repositories\MerchandiseRepository;

// use DateTime;
// use DateTimezone;
// use DateInterval;
// use DatePeriod;

class HolidayController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }

    function getFridays($year, $format, $timezone='UTC')
    {
        $fridays = array();
        $startDate = new DateTime("{$year}-01-01 Friday", new DateTimezone($timezone));
        $year++;
        $endDate = new DateTime("{$year}-01-01", new DateTimezone($timezone));
        $int = new DateInterval('P7D');
        foreach(new DatePeriod($startDate, $int, $endDate) as $d) {
            $fridays[] = $d->format($format);
        }

        return $fridays;
    }
    public function index()
    {
        // $fridays =  $this->getFridays('2022', 'Y-m-d', 'Asia/Dhaka');

        // foreach ($fridays as $key => $value) {
        //     Holiday::insert(['date'=>$value]);
        // }
        $holiday = Holiday::orderBy('date','asc')->get();
        return view('planning.line_loading.holiday.index', compact('holiday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planning.line_loading.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
        ]);
        $holiday = new holiday();
        $holiday->fill($request->all())->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('planning.line_loading.holiday.edit', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date' => 'required',
        ]);
        $holiday = Holiday::find($id);
        $holiday->fill($request->all())->save();

        return redirect('line-loading-plan/holidays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Holiday::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
