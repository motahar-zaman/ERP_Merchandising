<?php

namespace App\Http\Controllers\store\merchandiser;

use App\store\merchandiser\StoreMerchandiser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreMerchandiserController extends Controller
{
    public function index()
    {
        $merchandisers=StoreMerchandiser::all();
        return view('store.merchandiser.manage-merchandiser',compact('merchandisers'));
    }
    public function add_merchandiser()
    {
        return view('store.merchandiser.add-merchandiser');
    }

    public function store(Request $request)
    {
        StoreMerchandiser::query()->create($request->all());
        return redirect('store/manage-merchandiser');
    }

    public function edit($id)
    {
        $merchandisers=StoreMerchandiser::query()->findOrFail($id);
        return view('store.merchandiser.edit-merchandiser',compact('merchandisers'));
    }


    public function update(Request $request, $id)
    {
        $data=StoreMerchandiser::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-merchandiser');
    }

    public function destroy($id)
    {
        $merchandiser = StoreMerchandiser::query()->findOrFail($id);
        $merchandiser->delete();
        return redirect('store/manage-merchandiser');
    }
}
