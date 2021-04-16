<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Khutbahcategory;
use App\Khutbah;
use App\Http\Requests\Admin\KhutbahRequest;
class KhutbahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax())
        {
            $query = Khutbah::with(['khutbahcategories']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-aksi dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('khutbah.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('khutbah.destroy', $item->id) . '" method="POST" onsubmit="return confirm(ConfirmDelete())">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('photo', function($item) {
                    return $item->photo ? '<img src="'. Storage::url($item->photo) .'" style="max-height: 40px;" />' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();
        }

        return view('pages.admin.khutbah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khutbahcategories = Khutbahcategory::all();

        return view('pages.admin.khutbah.create',[
            'khutbahcategories' => $khutbahcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhutbahRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->slug);
        $data['photo'] = $request->file('photo')->store('assets/khutbah', 'public');

        Khutbah::create($data);

        alert()->success('Success','Data Berhasil Ditambahkan.');

        return redirect()->route('khutbah.index');
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
        $item = Khutbah::findOrFail($id);
        $khutbahcategories = Khutbahcategory::all();

        return view('pages.admin.khutbah.edit',[
            'item' => $item,
            'khutbahcategories' => $khutbahcategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KhutbahRequest $request, $id)
    {
        $data = $request->all();

        $item = Khutbah::findOrFail($id);

        $data['slug'] = Str::slug($request->name);
        // $data['photo'] = $request->file('photo')->store('assets/khutbah', 'public');

        $item->update($data);

        alert()->success('Success','Data Berhasil Diubah.');

        return redirect()->route('khutbah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Khutbah::findOrFail($id);
        Storage::disk('public')->delete($item->photo);
        $item->delete();

        alert()->success('Success','Data Berhasil Dihapus.');


        return redirect()->route('khutbah.index');
    }
}
