{!! Form::model($comment,['route' => ['comments.update',$comment->id], 'method' => 'post','files' => true]) !!}
@method('PUT') 
@foreach ($errors->all() as $error)
    <div class="form-group row" style="color: red;font-size: 15px;text-align: center;">    
        {{ $error }}
    </div>
@endforeach                          
 @include('back-end.comments.form')
<div class="">
   
    <button class="btn btn-primary">Save</button>
</div><!-- form-layout-footer -->
{{Form::close()}}