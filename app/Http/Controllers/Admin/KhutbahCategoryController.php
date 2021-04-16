<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Khutbahcategory;
use App\Http\Requests\Admin\KhutbahcategoryRequest;


class KhutbahcategoryController extends Controller
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
            $query = Khutbahcategory::query();

            return Datatables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-aksi dropdown-toggle mr-1 mb-1"
                                type="button"
                                data-toggle="dropdown">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('khutbahcategory.edit', $item->id) . '">
                                    Sunting
                                </a>
                                <form action="'. route('khutbahcategory.destroy', $item->id) .'" method="POST" onsubmit="return confirm(ConfirmDelete())">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Hapus
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.admin.khutbahcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.khutbahcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhutbahcategoryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Khutbahcategory::create($data);

        alert()->success('Success','Data Berhasil Ditambahkan.');

        return redirect()->route('khutbahcategory.index');
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
        $item = Khutbahcategory::findOrFail($id);

        return view('pages.admin.khutbahcategory.edit', [
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
    public function update(KhutbahcategoryRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Khutbahcategory::findOrFail($id);

        $item->update($data);

        alert()->success('Success','Data Berhasil Diubah.');

        return redirect()->route('khutbahcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Khutbahcategory::findOrFail($id);
        $item->delete();

        alert()->success('Success','Data Berhasil Dihapus.');

        return redirect()->route('khutbahcategory.index');
    }
}
