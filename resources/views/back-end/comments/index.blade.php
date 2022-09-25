@extends('back-end.template')
@section('title','List of Comments')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Comments
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Comments</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Comments</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                       
                    </div>
                    <div class="card-title">List of Comments</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" datatable style="font-size:12px" id="commentstable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Drama</th>
                                    @can('edit_comments')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>{{ $comment->comment}}</td>
                                        <td>{{ $comment->status}}</td>
                                        <td>
                                            {{!empty($comment->post->title)?$comment->post->title:null}}
                                        </td>
                                        @can('edit_comments')
                                        <td>
                                            <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-sm btn-info ajax-load-modal" data-title="Comment Status"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="{{route('comments.destroy',$comment->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>
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
            $('#commentstable').DataTable({
            });
        })

    </script>
@endpush
@stop

