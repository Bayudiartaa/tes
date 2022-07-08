<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Requests\SalesRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateSalesRequest;

class SalesController extends Controller
{
    public function index() 
    {
        $sales = User::latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {   
        $password =  Hash::make('password');
        $nis = 'NIS-'.str_pad(User::max('id')+1, 7, '0', STR_PAD_LEFT);
        return view('sales.create', compact('password', 'nis'));
    }

    public function edit($id)
    {
        $password =  Hash::make('password');
        $nis = 'NIS-'.str_pad(User::max('id')+1, 7, '0', STR_PAD_LEFT);
        $sales = User::whereId($id)->first();
        return view('sales.edit', compact('password', 'nis', 'sales'));
    }

    public function show($id) 
    {
        $user = User::whereId($id)->first();
        return view('sales.show', compact('user'));
    }

    public function store(SalesRequest $request)
    {
        $attributes = $request->validated();
        $data = User::create($attributes);
        return Response::status('success')
            ->message('Sales created')
            ->result($data);
    }

    public function update(UpdateSalesRequest $request, $id)
    {
        $attributes = $request->validated();
        $user = User::find($id);
        $data =  $user->update($attributes);
        if($data) {
            return redirect(route('sales.index'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect(route('sales.index'))->with('error', 'Data gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Response::status('success')
            ->message('Sales Deleted')
            ->result();
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Data Berhasil Di Hapus',
        // ]);
    }

    public function destroyAll(Request $request)
    {
        $sales = User::whereIn('id', $request->get('selected'))->delete();

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Data Checkbok Berhasil Di Hapus',
        //     'data' => $sales
        // ]);
        return Response::status('success')
        ->message('Data Checkbok Berhasil Di Hapu')
        ->result();
    }
}
