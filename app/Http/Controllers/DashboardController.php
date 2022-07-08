<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Member::with('refferal')->where(['user_id' => auth()->user()->id])->get();
        // dd($data);
        return view('dashboard.index', compact('data'));
    }
}
