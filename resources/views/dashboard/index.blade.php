@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-statistic-1">
            <div class="card-body">
                <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
                {{-- <li class="list-group-item">Email: {{ Auth::user()->email }}</li> --}}
                {{-- <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li> --}}
                {{-- <li class="list-group-item">Referrer: {{ Auth::user()->referrer->nama ?? 'Not Specified' }}</li> --}}
                <li class="list-group-item">Refferal count: {{ count($data) }}</li>
            </div>
        </div>
    </div>
</div>

@endsection
