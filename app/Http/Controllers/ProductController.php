<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //list
    public function index()
    {
        $data = ProductModel::all();
        $sent = [
            'data' => $data
        ];
        return view('product.index', $sent);
    }

    //add
    public function create(Request $r)
    {
        ProductModel::create($r->all());
        return redirect('/product')->with('sukses','Data berhasil diinput');
    }

    //detail
    public function find($id)
    {
        $find = ProductModel::find($id);
        $data = ProductModel::all();
        $sent = [
            'data' => $data,
            'find' => $find
        ];
        return view('product.index', $sent);
    }

    //update
    public function find_update($id)
    {
        $update = ProductModel::find($id);
        $data = ProductModel::all();
        $sent = [
            'data' => $data,
            'update' => $update
        ];
        return view('product.index', $sent);
    }

    public function update(Request $r)
    {
        $data = ProductModel::find($r->id);
        $data->update($r->all());
        return redirect('/product')->with('sukses','Data berhasil diupdate');
    }

    //delete
    public function find_delete($id)
    {
        $delete = ProductModel::find($id);
        $data = ProductModel::all();
        $sent = [
            'data' => $data,
            'delete' => $delete
        ];
        return view('product.index', $sent);
    }

    public function delete(Request $r)
    {
        $data = ProductModel::find($r->id);
        $data->delete();
        return redirect('/product')->with('sukses','Data berhasil dihapus');
    }
}
