<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
// composer require yajra/laravel-datatables-oracle:"~9.0"

/**
 * Generated By GZeinNumerCodeGenerator
 * www.github.com/gzeinnumer
 * at 2022-04-09 08:16:51
 * zip name 20220409081629_CDLdyDoy0EJ.zip
 */

class BarangController extends Controller
{
    //list
    public function index()
    {
        $data = BarangModel::all();
        $sent = [
            'data' => $data
        ];
        return view('barang.index', $sent);
    }

    //add
    public function create(Request $r)
    {
        $data = new BarangModel();
        $data->name = $r->name;
        $data->save();

        return redirect('/barang')->with('sukses', 'Success Insert Data');
    }

    //detail
    public function find($id)
    {
        $find = BarangModel::find($id);
        $data = BarangModel::all();
        $sent = [
            'data' => $data,
            'find' => $find
        ];
        return view('barang.index', $sent);
    }

    //update
    public function find_update($id)
    {
        $update = BarangModel::find($id);
        $data = BarangModel::all();
        $sent = [
            'data' => $data,
            'update' => $update
        ];
        return view('barang.index', $sent);
    }

    public function update(Request $r)
    {
        $data = BarangModel::find($r->id);
        $data->update($r->all());
        return redirect('/barang')->with('sukses', 'Success Update Data');
    }

    //delete
    public function find_delete($id)
    {
        $delete = BarangModel::find($id);
        $data = BarangModel::all();
        $sent = [
            'data' => $data,
            'delete' => $delete
        ];
        return view('barang.index', $sent);
    }

    public function delete(Request $r)
    {
        $data = BarangModel::find($r->id);
        $data->delete();
        return redirect('/barang')->with('sukses', 'Success Delete Data');
    }

    //dataTables
    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = "<td>
                        <a href=\"/barang/find/" . $row->id . "\" class=\"btn btn-info btn-sm\">Detail</a>
                        <a href=\"/barang/find_update/" . $row->id . "\" class=\"btn btn-warning btn-sm\">Edit</a>
                        <a href=\"/barang/find_delete/" . $row->id . "\" class=\"btn btn-danger btn-sm\">Delete</a>
                    </td>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
