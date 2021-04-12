<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class IslamicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspects = Http::get('https://api.quran.sutanlab.id/surah/');
        $data = $suspects->json();


        return view('pages.member.dashboard-alquran',compact('data'));
    }

    public function sura($id)
    {
        $suspects = Http::get('https://api.quran.sutanlab.id/surah/'.$id.'' );
        $data = $suspects->json();


        return view('pages.member.detail-alquran',compact('data'));
    }

    public function tahlil()
    {
        $suspects = Http::get('https://zahirr-web.herokuapp.com/api/muslim/tahlil?apikey=zahirgans');
        $data = $suspects->json();


        return view('pages.member.dashboard-tahlil',compact('data'));
    }

    public function wirid()
    {
        $suspects = Http::get('https://zahirr-web.herokuapp.com/api/muslim/wirid?apikey=zahirgans');
        $data = $suspects->json();


        return view('pages.member.dashboard-wirid',compact('data'));
    }


}


