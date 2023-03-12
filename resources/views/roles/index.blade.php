@extends('datatables.datatable')

@section('title', 'Roles')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4>Manage Roles</h4>
                    </div>
                    <div class="col-6 text-right">
                        @can('roles.create')
                            <a href="{{route('roles.create')}}"><i class="fas fa-plus"></i> add</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table(["width" => "100%"]) }}
            </div>
        </div>
    </div>
    @parent
@endsection

@section('js')
    @parent
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection