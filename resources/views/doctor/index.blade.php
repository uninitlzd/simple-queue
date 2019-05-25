@extends('layouts.main')
@section('panel-content')
    <div class="w-100 d-flex">
        <h3>Dokter</h3>
        <div class="w-100 text-right">
            <a href="{{ route('doctor.create')  }}" class="btn btn-primary mb-2 btn-sm"><i class="fa fa-plus"></i> Tambah Dokter</a>
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
                    <th scope="col">Unit Id</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <th scope="row">{{ $doctors->currentPage() * $doctors->perPage() - $doctors->perPage() + $loop->iteration }}</th>
                        <td>{{ $doctor->unit_id }}</td>
                        <td>{{ $doctor->name}}</td>
                        <td>{{ $doctor->address }}</td>
                        <td>{{ $doctor->telephone }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     event.target.nextElementSibling.submit();"><i class="fa fa-trash"></i> Delete</button>
                                <form action="{{ route('doctor.delete', $doctor->id) }}" style="display: none" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!count($doctors))
                <div class="w-100 text-center">No Data</div>
            @endif
            {{ $doctors->links() }}
        </div>
    </div>
@stop
