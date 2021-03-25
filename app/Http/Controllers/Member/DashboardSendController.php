<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardSendController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('pages.member.dashboard-send',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        alert()->success('Success','Pofile anda berhasil diperbaharui kini anda bisa mengirim video.');

        return redirect()->route($redirect);
    }

}
