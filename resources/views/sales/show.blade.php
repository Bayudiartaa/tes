@extends('layouts.main')
@section('content')
@section('title','Show Sales')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" value="{{ $user->nis }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama',$user->nama) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username Sales</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $user->username) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Umur Sales</label>
                        <input type="number" class="form-control" name="umur" id="umur" value="{{ old('umur', $user->umur) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Sales</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat Sales</label>
                        <textarea id="alamat" name ="alamat" rows="10" cols="50" style="height:150px" class="form-control" readonly>{{ old('alamat', $user->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Email Sales</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password Sales</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}" readonly>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('sales.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection
