<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Sosial;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    public function index()
    {
        $user =  Auth::user();
        $customer = User::count();// menghitung price yang succes
        $medsos = Sosial::all();

        $user = str_replace(['KABUPATEN','KOTA'],null, $user->kota->name);

        $suspect = Http::get('https://api.fahmicog.site/muslim/jadwalshalat?kota='.$user.'&apikey=freeTrial2k21');
        $data = $suspect->json();

        return view('pages.member.dashboard',compact('data'),[
            'customer' => $customer,
            'medsos' => $medsos,
            'user' => $user
        ]);
    }
}
