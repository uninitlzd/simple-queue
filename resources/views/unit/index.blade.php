@extends('layouts.main')
@section('panel-content')
    <div class="w-100 d-flex">
        <h3>Poli</h3>
        <div class="w-100 text-right">
            <a href="{{ route('unit.create')  }}" class="btn btn-primary mb-2 btn-sm"><i class="fa fa-plus"></i> Tambah Poli</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <th scope="row">{{ $units->currentPage() * $units->perPage() - $units->perPage() + $loop->iteration }}</th>
                        <td>{{ $unit->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     event.target.nextElementSibling.submit();"><i class="fa fa-trash"></i> Delete</button>
                                <form action="{{ route('unit.delete', $unit->id) }}" style="display: none" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!count($units))
                <div class="w-100 text-center">No Data</div>
            @endif
            {{ $units->links() }}
        </div>
    </div>
@stop
