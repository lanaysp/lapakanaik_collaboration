<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\Sosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardSuportController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $medsos = Sosial::all();

        return view('pages.member.dashboard-suport',[
            'medsos' => $medsos,
            'user' => $user
        ]);
    }
}
