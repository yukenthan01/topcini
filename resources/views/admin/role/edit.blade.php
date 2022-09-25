@extends('back-end.template')
@section('title','Edit Roles')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        Allocate Permission
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Allocate Permission</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="card-title">Permission for {{$role->name}}</div>
                </div>
                <div class="card-wrapper collapse show">
                        <div class="card-body">
                            {!! Form::model($role, ['method' => 'PUT', 'route' => ['role.update',  $role->id ]]) !!}
                                <div id="accordion6" class="accordion accordion-head-colored accordion-info mg-t-20" role="tablist" aria-multiselectable="true">
                                    @php $number=1; @endphp
                                    @foreach($modules as $module)
                                    <div class="card">
                                            <div class="hr-line"></div>
                                            <div class="card-header" role="tab" id="">
                                                <h4 class="mg-b-0">
                                                  <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion6" href="#my-collapse-{{$module->id}}" aria-expanded="false" aria-controls="collapseThree6">
                                                        {{$number++}}. {{$module->name}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="my-collapse-{{$module->id}}" class="collapse" role="tabpanel" aria-labelledby="">
                                                <div class="card-block pd-20">
                                                    <div class="row row-sm">
                                                        @foreach($module->permissions as $perm)
                                                        
                                                        <?php
                                                                $per_found = null;
                                                                if( isset($role) ) {
                                                                    $per_found = $role->hasPermissionTo($perm->name);
                                                                }
                
                                                                if( isset($user)) {
                                                                    $per_found = $user->hasDirectPermission($perm->name);
                                                                }
                                                            ?>
                                                            <div class="col-sm-2">    </div>  
                                                            <div class="col-sm-2">
                
                                                                <label class="ckbox">
                                                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!}
                                                                    <span> {{ $perm->display_name }}</span>
                                                                </label>
                                                                
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div><!-- collapse -->
                                        </div><!-- card -->
                
                                        @endforeach
                                        
                                        </div><!-- accordion -->
                                        
                                    <br>
                                    <div class="">
                                    <a class="btn btn-secondary" href="{{ route('role.index') }}"> <i class="ion-ios-arrow-thin-left"></i> Back</a>
                                        @can('edit_role')
                                        <button class="btn btn-primary">Update</button>
                                        @endcan
                                    </div><!-- form-layout-footer -->
                            {{Form::close()}}
                        </div>
                
                    </div>
            </div>
        </div>
    </div>
@stop
