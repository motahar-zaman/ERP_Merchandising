<?php

namespace App\Http\Controllers\Merchandise;

use App\Http\Controllers\Controller;
use App\Models\Merchandiser\Merchandiser;
use Illuminate\Http\Request;

class MerchandiserController extends Controller
{
    public function index(){
        return view('merchandising/merchandiser/merchandiser');
    }

    public function storeMerchandiser(Request $request){
        $merchandiser = new Merchandiser();

        $merchandiser->name = $request['name'] ?? '';
        $merchandiser->email = $request['email'] ?? '';
        $merchandiser->phone_no = $request['phone'] ?? '';
        $merchandiser->designation = $request['designation'] ?? '';
        $merchandiser->remarks = $request['remarks'] ?? '';
        $merchandiser->status = 1;
        $merchandiser->created_at = date("Y-m-d H:i:s");
        $merchandiser->updated_at = date("Y-m-d H:i:s");

        $merchandiser->save();

        return redirect()->route('merchandiser-list');
    }

    public function merchandiserList(){
        $merchandisers = Merchandiser::where("status", 1)->orderBy('created_at', "DESC")->get();
        return view('merchandising/merchandiser/merchandiser-list')-> with(['merchandisers'=> $merchandisers]);
    }

    public function editMerchandiser($merchandiserId){
        $data = Merchandiser::find($merchandiserId);
        return view('merchandising/merchandiser/edit-merchandiser', ['merchandiser' => $data]);
    }

    public function editMerchandiserAction(Request $request){
        $merchandiser = Merchandiser::find($request['merchandiserId']);

        $merchandiser->name = $request['name'] ?? '';
        $merchandiser->email = $request['email'] ?? '';
        $merchandiser->phone_no = $request['phone'] ?? '';
        $merchandiser->designation = $request['designation'] ?? '';
        $merchandiser->remarks = $request['remarks'] ?? '';
        $merchandiser->updated_at = date("Y-m-d H:i:s");

        $merchandiser->save();

        return redirect()->route('merchandiser-list');
    }

    public function deleteMerchandiser($id){
        $merchandiser = Merchandiser::query()->findOrFail($id);
        $merchandiser->delete();
        return redirect('merchandiser-list');
    }
}
