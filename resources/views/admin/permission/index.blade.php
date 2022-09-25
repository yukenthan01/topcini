@extends('back-end.template')
@section('title','List of Permissions')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Permissions
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Permissions</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Permissions</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                        @can('add_permission')
                            <a href="{{ route('permission.create') }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Add new permission"><i class="fa fa-plus"></i> New permission</a>
                        @endcan
                    </div>
                    <div class="card-title">List of permissions</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display nowrap" datatable style="font-size:12px">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Permission</th>
                                    <th>name</th>
                                    @can('edit_permission')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->module->name}}</td>
                                        <td>{{$permission->display_name}}</td>
                                        <td>{{$permission->name}}</td>
                                        @can('edit_permission')
                                        <td>
                                            <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="{{route('permission.destroy',$permission->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

