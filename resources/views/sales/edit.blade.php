@extends('layouts.main')
@section('content')
@section('title','Update Sales')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sales.update', $sales->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" value="{{ $sales->nis }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama',$sales->nama) }}">
                    </div>
                    <div class="form-group">
                        <label>Username Sales</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $sales->username) }}">
                    </div>
                    <div class="form-group">
                        <label>Umur Sales</label>
                        <input type="number" class="form-control" name="umur" id="umur" value="{{ old('umur', $sales->umur) }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Sales</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  value="{{ old('tanggal_lahir', $sales->tanggal_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat Sales</label>
                        <textarea id="alamat" name ="alamat" rows="10" cols="50" style="height:150px" class="form-control">{{ old('alamat', $sales->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Email Sales</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $sales->email) }}">
                    </div>
                    <div class="form-group">
                        <label>Password Sales</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $sales->password }}" readonly>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('sales.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection
