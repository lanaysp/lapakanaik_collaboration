<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Sosial;
use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();// menghitung price yang succes
        $medsos = Sosial::all();
        return view('pages.member.dashboard',[
            'customer' => $customer,
            'medsos' => $medsos
        ]);
    }
}
