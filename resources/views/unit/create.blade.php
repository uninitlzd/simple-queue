@extends('layouts.main')
@section('panel-content')
    <div class="w-100 d-flex">
        <h3>Poli</h3>
        <div class="w-100 text-right">
            <a href="{{ route('unit.index') }}" class="btn btn-primary mb-2 btn-sm"><i class="fa fa-chevron-left"></i>
                Kembali</a>
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

            {{ Form::open(['action' => 'UnitController@store']) }}
            <div class="form-group">
                {{ Form::label('name', 'Nama')  }}
                {{ Form::text('name', null, ['class' => 'form-control'])  }}
            </div>
            <div class="form-group">
                {{  Form::submit('Simpan', ['class' => 'btn btn-primary'])  }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop