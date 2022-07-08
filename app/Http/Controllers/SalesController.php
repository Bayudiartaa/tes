<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Requests\SalesRequest;
use Illuminate\Support\Facades\Hash;

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
        $user = User::findOrFail($id);
        return view('sales.edit', compact('password', 'nis', 'user'));
    }

    public function store(SalesRequest $request)
    {
        $attributes = $request->validated();
        $data = User::create($attributes);
        return Response::status('success')
            ->message('Sales created')
            ->result($data);
    }

    public function update(SalesRequest $request, User $user)
    {
        $attributes = $request->validated();

        $user->update($attributes);
        return Response::status('success')
            ->message('Sales updated')
            ->result($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Di Hapus',
        ]);
    }

    public function destroyAll(Request $request)
    {
        $sales = User::whereIn('id', $request->get('selected'))->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Checkbok Berhasil Di Hapus',
            'data' => $sales
        ]);
    }
}
