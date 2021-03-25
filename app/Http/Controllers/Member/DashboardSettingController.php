<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardSettingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('pages.member.dashboard-account',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        alert()->success('Success','Profile anda berhasil diperbaharui, Kini anda siap mengirim video');

        return redirect()->route($redirect);
    }
}
