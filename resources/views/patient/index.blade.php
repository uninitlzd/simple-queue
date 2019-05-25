@extends('layouts.main')
@section('panel-content')
    <div class="w-100 d-flex">
        <h3>Pasien</h3>
        <div class="w-100 text-right">
            <a href="{{ route('patient.create')  }}" class="btn btn-primary mb-2 btn-sm"><i class="fa fa-plus"></i> Tambah Pasien</a>
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
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Email Pasien</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patient as $p)
                    <tr>
                        <th scope="row">{{ $patient->currentPage() * $patient->perPage() - $patient->perPage() + $loop->iteration }}</th>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email}}</td>
                        <td>{{ $p->role }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('patient.edit', $p->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     event.target.nextElementSibling.submit();"><i class="fa fa-trash"></i> Delete</button>
                                <form action="{{ route('doctor.delete', $p->id) }}" style="display: none" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!count($patient))
                <div class="w-100 text-center">No Data</div>
            @endif
            {{ $patient->links() }}
        </div>
    </div>
@stop
