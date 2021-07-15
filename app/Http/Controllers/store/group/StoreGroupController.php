<?php

namespace App\Http\Controllers\store\group;

use App\store\StoreGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreGroupController extends Controller
{
    public function index()
    {
        $groups=StoreGroup::all();
        return view('store.group.manage-group',compact('groups'));
    }
    public function add_group()
    {
        return view('store.group.add-group');
    }

    public function store(Request $request)
    {
        StoreGroup::query()->create($request->all());
        return redirect('store/manage-group');
    }

    public function edit($id)
    {
        $groups=StoreGroup::query()->findOrFail($id);
        return view('store.group.edit-group',compact('groups'));
    }


    public function update(Request $request, $id)
    {
        $data=StoreGroup::query()->find($id);
        $data->update($request->all());
        return redirect('store/manage-group');
    }

    public function destroy($id)
    {
        $group = StoreGroup::query()->findOrFail($id);
        $group->delete();
        return redirect('store/manage-group');
    }
}
