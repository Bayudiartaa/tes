@extends('layouts.main')
@section('content')
@section('title','Update Sales')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="form-edit">
                    @csrf
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" value="{{ $user->nis }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama',$user->nama) }}">
                    </div>
                    <div class="form-group">
                        <label>Username Sales</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $user->username) }}">
                    </div>
                    <div class="form-group">
                        <label>Umur Sales</label>
                        <input type="number" class="form-control" name="umur" id="umur" value="{{ old('umur', $user->umur) }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Sales</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat Sales</label>
                        <textarea id="alamat" name ="alamat" rows="10" cols="50" style="height:150px" class="form-control">
                            {{ old('alamat', $user->alamat) }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Email Sales</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group">
                        <label>Password Sales</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}" readonly>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" onclick="document.location.href='{{ route('sales.index') }}'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    // Update Data
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form-edit').on('submit', function(e){
            e.preventDefault();

            var id = $('#id').val();

            if (id < 1) {
                alert("Error: user id is null! make sure it has a value from the {{ $user->id }}");
                return;
            }

            $.ajax({
                type: "PUT",
                url: "/sales/update/" + id,
                dataType: $('#form-edit').serialize(),
                success: function (data) {
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