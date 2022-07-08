@extends('layouts.main')
@section('content')
@section('title','Create Sales')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form>
                    @csrf
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" value="{{ $nis }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label>Username Sales</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label>Umur Sales</label>
                        <input type="number" class="form-control" name="umur" id="umur" value="{{ old('umur') }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Sales</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  value="{{ old('tanggal_lahir') }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat Sales</label>
                        <textarea id="alamat" name ="alamat" rows="10" cols="50" style="height:150px" class="form-control">
                            {{ old('alamat') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Email Sales</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Password Sales</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $password }}" readonly>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('sales.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary btn-submit">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };

    $(document).ready(function() {
        
        $(".btn-submit").click(function(e){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var nama = $("#nama").val();
            var nis = $("#nis").val();
            var username = $("#username").val();
            var umur = $("#umur").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var alamat = $("#alamat").val();
            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                url: "{{ route('sales.store') }}",
                type:'POST',
                data: {
                    _token:_token,
                    nama:nama,
                    nis:nis,
                    username:username,
                    umur:umur,
                    tanggal_lahir:tanggal_lahir,
                    alamat:alamat,
                    email:email,
                    password:password,
                },
                success: function(data) {
                    if($.isEmptyObject(data.error)) {
                        toastr.success('Data Sales Berhasil Di Tambahkan'),(data.success);
                        setTimeout(function() {
                            document.location.href='{{ route('sales.index') }}'
                        },3000);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
@endsection