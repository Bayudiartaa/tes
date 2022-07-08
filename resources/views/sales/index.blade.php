@extends('layouts.main')
@section('title','Sales')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @if (session('success'))
            <div class="alert alert-success" style="margin-top: 15px" role="alert">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            <div class="card-header">
                <div class="form-group">
                    <button class="btn btn-danger float-left mr-3" id="multi-delete" data-route="{{ route('sales.delete-all') }}">Delete All</button>
                    <a href="{{ route('sales.create') }}" class="btn btn-md btn-success">Create Sales</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered table-consoned" width="100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="check-all"></th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Link Ref</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        @forelse ($sales as $sale)
                        <tr>
                            <td><input type="checkbox" class="check" value="{{ $sale->id }}"></td>
                            <td>{{ $sale->nis }}</td>
                            <td>{{ $sale->nama }}</td>
                            <td>{{ $sale->username }}</td>
                            <td>{{ $sale->umur }}</td>
                            <td>{{ $sale->alamat }}</td>
                            <td>{{ url('landing_page',Crypt::encrypt($sale->id)) }}</td>
                            <td>{{ $sale->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                <form method="post" class="delete-form" data-route="{{route('sales.destroy',$sale->id)}}">
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td class="text-center" colspan="7">
                            Data Sales belum Tersedia.
                        </td>
                        @endforelse
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
        
        $('#table').TableCheckAll();
        $('#multi-delete').on('click', function(){
            var button = $(this);
            var selected = [];
            $('#table .check:checked').each(function(){
                selected.push($(this).val());
            });
            
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure you want to delete selected data?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: button.data('route'),
                        data: {
                            'selected': selected
                        },
                        success: function (response, textStatus, xhr) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                window.location='/sales';
                            });
                        }
                    });
                }
            });
        });
    });
    
    // function destroy 
    $(document).ready(function() {
        
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var button = $(this);
            
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure you want to delete this record?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: button.data('route'),
                        data: {
                            '_method': 'delete'
                        },
                        success: function (response, textStatus, xhr) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                window.location='/sales'
                            });
                        }
                    });
                }
            });
            
        })
    });
</script>
@endsection

