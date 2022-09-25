@extends('back-end.template')
@section('title','List of Posts')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Posts
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Posts</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                        @can('add_post')
                            <a href="{{ route('youtube') }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Add new permission"><i class="fa fa-plus"></i> Youtube</a>
                        @endcan
                    </div>
                    <div class="card-title">List of Posts</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" datatable style="font-size:12px" id="posttable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    @can(['edit_post','delete_post'])
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->slug}}</td>
                                        <td>
                                           {{ isset($post->category->parent)? $post->category->parent->name :null}}
                                           <br>
                                           {{ $post->category->name }}
                                       
                                        
                                        </td>
                                        <td>
                                            @if(isset($post->image))
                                                <img src="{{ asset('post_image/'.$post->image) }}" alt="image" width="100px" height="100px">
                                            @endif
                                        </td>
                                        @can('edit_post')
                                        <td>
                                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="{{route('post.destroy',$post->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>

                                            {{-- <a href="{{ route('post.destroy',$post->id)}}" class="btn-icon ajax-load-modal">
                                              <form action="{{ route('post.destroy',$post->id)}}" method="post">
                                                    @csrf
                                                    inpu
                                              </form>
                                            </a> --}}
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
            $('#posttable').DataTable({
                 "order": [[ 0, "desc" ]]
            });
        })

    </script>
@endpush
@stop

