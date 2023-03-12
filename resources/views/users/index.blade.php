@extends('datatables.datatable')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4>Manage Users</h4>
                    </div>
                    <div class="col-6 text-right">
                        @can('users.create')
                            <a href="{{route('users.create')}}"><i class="fas fa-plus"></i> add</a>
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