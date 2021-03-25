<?php

namespace App\Http\Controllers\Admin;

use App\Sosial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\Admin\SosialRequest;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Sosial::query();

            return Datatables::of($query)
            ->addColumn('action', function($item){
                return '
                <a class="btn btn-primary" href="' . route('sosial.edit', $item->id) . '">
                    <i class="fas fa-edit"></i> Edit
                </a>

                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.admin.sosial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.sosial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SosialRequest $request)
    {
        $data = $request->all();

        Sosial::create($data);

        alert()->success('Success','Data Berhasil Ditambahkan.');


        return redirect()->route('sosial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Sosial::findOrFail($id);

        return view('pages.admin.sosial.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SosialRequest $request, $id)
    {
        $data = $request->all();

        $item = Sosial::findOrFail($id);

        $item->update($data);

        alert()->success('Success','Data Berhasil Diubah.');

        return redirect()->route('sosial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Sosial::findOrFail($id);
        $item->delete();

        alert()->success('Success','Data Berhasil Dihapus.');

        return redirect()->route('sosial.index');
    }
}
