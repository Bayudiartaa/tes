<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
{
    public function index(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $user = User::whereId($id)->first();
        return view('landing_page', compact('user'));
    }

    public function store(MemberRequest $request)
    {
        $attributes = $request->validated();
        $data = [
            'nama'        => $attributes['nama'],
            'username'    => $attributes['username'],
            'email'       => $attributes['email'],
            'no_telepon'  => $attributes['no_telepon'],
            'user_id'     => $attributes['user_id'],
        ];
        $data = Member::create($data);
        if($data) {
            return back()->with('success', 'Data berhasil ditambahkan');
        } else {
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }
}
