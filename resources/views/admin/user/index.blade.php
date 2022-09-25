@extends('back-end.template')
@section('title','List of users')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Users
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Users</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                        @can('add_user')
                            <a href="{{ route('user.create') }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Add new User"><i class="fa fa-plus"></i> New User</a>
                        @endcan
                    </div>
                    <div class="card-title">List of Users</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table datatable  class="table display nowrap">
                                <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email ID</th>
                                        <th>Created At</th>
                                            @can('edit_user', 'delete_users')
                                                <th>Actions</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if(!$user->hasRole('SAdmin'))
                                            <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{ $user->roles->implode('name', ', ') }}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                            @can('edit_user')
                                                <td>
                                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="{{route('user.destroy',$user->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>
                                                </td>
                                            @endcan
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                            
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@push('script')
<script>
  $(document).ready(function(){
    datatableJs();
  });
</script>

@endpush

@stop