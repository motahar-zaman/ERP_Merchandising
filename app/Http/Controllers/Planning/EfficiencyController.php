<?php

namespace App\Http\Controllers\Planning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Planning\LineLoading\Efficiency;
use App\Repositories\MerchandiseRepository;

class EfficiencyController extends Controller
{
    private $repository;

    public function __construct(MerchandiseRepository $repository){
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function index()
    {
        $efficiency = Efficiency::orderBy('day','asc')->get();
        return view('planning.line_loading.efficiency.index', compact('efficiency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planning.line_loading.efficiency.create');
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
            'day' => 'required|unique:efficiency',
            'efficiency' => 'required',
        ]);
        $efficiency = new efficiency();
        $efficiency->fill($request->all())->save();

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
        $efficiency = Efficiency::find($id);
        return view('planning.line_loading.efficiency.edit', compact('efficiency'));
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
            'day' => 'required|unique:efficiency',
            'efficiency' => 'required',
        ]);
        $efficiency = Efficiency::find($id);
        $efficiency->fill($request->all())->save();

        return redirect('line-loading-plan/efficiency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Efficiency::find($id)->delete();
        if($delete){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
