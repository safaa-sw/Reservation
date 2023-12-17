<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use App\Models\GuestReq;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guests= Guest::all();
        $guestreqs=GuestReq::all();

        $allRequestWeek = $this->allRequestWeekly();
        $doneRequestWeek = $this->doneRequestWeekly();
        return view('admin.dashboard',compact('guests','guestreqs','allRequestWeek','doneRequestWeek'));

    }

    /************************************************************************************* */
    protected function allRequestWeekly()
    {
        $requestDaily = GuestReq::select(DB::raw("(COUNT(*)) as count"), DB::raw("DAYNAME(created_at) as dayname"))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->groupBy('dayname')
            ->get();

        $requestArr = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,

        ];
        foreach ($requestDaily as $item) {
            $requestArr[$item->dayname] = $item->count;
        }
        return $requestArr;
    }
    /************************************************************************************* */

    protected function doneRequestWeekly()
    {
        $requestDaily = GuestReq::select(DB::raw("(COUNT(*)) as count"), DB::raw("DAYNAME(created_at) as dayname"))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->where('status', 1)
            ->groupBy('dayname')
            ->get();

        $requestArr = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,

        ];
        foreach ($requestDaily as $item) {
            $requestArr[$item->dayname] = $item->count;
        }
        return $requestArr;
    }
    /************************************************************************************* */

}
