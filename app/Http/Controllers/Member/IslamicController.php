<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\Khutbah;
use App\Khutbahcategory;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;


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

    public function doa()
    {
        $suspects = Http::get('https://api.fahmicog.site/muslim/doaharian?apikey=lanaysp');
        $data = $suspects->json();


        return view('pages.member.dashboard-doa',compact('data'));
    }

    public function khutbah()
    {
        $data = Khutbah::all();
        return view('pages.member.dashboard-khutbah',[
            'data' => $data,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $khutbah = Khutbah::where('slug', $slug)->firstOrFail();
        $khutbahs = Khutbah::take(4)
                ->orderBy('id', 'desc')
                ->get();
        $khutbahcategori = Khutbahcategory::take(6)->latest()->get();



        return view('pages.member.khutbah-detail',[
            'khutbah' => $khutbah,
            'khutbahs' => $khutbahs,
            'khutbahcategori' => $khutbahcategori,
        ]);
    }

}


