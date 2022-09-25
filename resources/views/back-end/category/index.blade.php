@extends('back-end.template')
@section('title','List of Categories')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Categories
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Categories</li>
        </ol>
    </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                        @can('add_category')
                            <a href="{{ route('category.create') }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Add new permission"><i class="fa fa-plus"></i> New category</a>
                        @endcan
                    </div>
                    <div class="card-title">List of category</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" datatable style="font-size:12px" id="categorytable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Parent Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    @can('edit_category')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                {{--  {{ $categories }}  --}}
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{ isset($category->parent) ? $category->parent->name : ''}}</td>
                                        <td>{{$category->status}}</td>
                                        <td><img src="{{ asset('category_image/'.$category->image) }}" alt="image" width="100px" height="100px"></td>
                                        @can('edit_category')
                                        <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="{{route('category.destroy',$category->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>
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
@push('script')
    <script>

        $(document).ready(function () {
            $('#categorytable').DataTable({
            });
        })

    </script>
@endpush
@stop

