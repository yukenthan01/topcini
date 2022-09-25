@extends('back-end.template')
@section('title','List of Subscribers')
@section('content')

<div class="page-header">
    <h3 class="page-title">
        List of Subscribers
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Subscribers</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Subscribers</li>
        </ol>
    </nav>
    </div>
    <div class="row">  
        <div class="col-md-12">
            <div class="card card-default card-demo" id="cardChart9">
                <div class="card-header">
                    <div class="float-right">
                       
                    </div>
                    <div class="card-title">List of Subscribers</div>
                </div>
                <div class="card-wrapper collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display nowrap" datatable style="font-size:12px" id="Subscriberstable">
                            <thead>
                                <tr>
                                   
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    @can('delete_subscribers')
                                        <th>Action</th>
                                    @endcan
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{$subscriber->id}}</td>
                                        <td>{{$subscriber->name}}</td>
                                        <td>{{$subscriber->email}}</td>
                                        @can('delete_subscribers')
                                        <td>
                                            <a href="{{route('subscribers.destroy',$subscriber->id)}}" class="btn btn-sm btn-warning ajax-delete" data-set="tr"><i class="fa fa-trash"></i></a>
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
            $('#Subscriberstable').DataTable({
            });
        })

    </script>
@endpush
@stop

