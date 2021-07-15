<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Hrm\Employee;
use App\Hrm\EmployeeOffice;
use App\store\booking\StoreBooking;
use App\store\inventory\StoreInventory;
use App\store\order\StoreOrder;
use App\store\requisition\StoreRequisition;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $order_details_count = StoreOrder::query()->count();
        $booking_details_count = StoreBooking::query()->count();
        $inventory_details_count = StoreInventory::query()->count();
        $requisition_details_count = StoreRequisition::query()->count();
        return view('dashboard.index',compact('order_details_count','booking_details_count','inventory_details_count','requisition_details_count'));
    }

    public function index2()
    {
        return view('dashboard.index2');
    }

    public function index3()
    {
        return view('dashboard.index3');
    }

    public function changePassword(){

        return view('dashboard.change-password');
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $data['password']=Hash::make($request['password']);
        User::query()->findOrFail($user->id)->update($data);
        Auth::logout();
        return redirect('login');
    }
}
