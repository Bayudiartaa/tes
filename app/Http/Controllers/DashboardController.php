<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Member::withCount('refferal')->get();
        return view('dashboard.index', compact('data'));
    }
}
