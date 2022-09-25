{{--  {{ $category->parent_id }}  --}}
<div class="form-group">
    {!!Form::label('name', 'Name')!!}
    {!!Form::text('name',null,['class' =>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('tamil', 'Tamil')!!}
    {!!Form::text('tamil',null,['class' =>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('slug', 'Slug')!!}
    {!!Form::text('slug',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">

    {!!Form::label('parent', 'Parent Category')!!}
    {!!Form::select('parent',$categories,isset($category->parent_id)?$category->parent_id : null,['class' =>'form-control col-12','placeholder'=>'Choose'])!!}
</div>

<div class="form-group">

    {!!Form::label('status', 'Status')!!}
    {!!Form::select('status',['active'=>'Active','deactive'=>'Deactive'],isset($category->status)?$category->status : null,['class' =>'form-control col-12','placeholder'=>'Choose'])!!}
</div>

<div class="form-group">
    {!!Form::label('image', 'Category Image')!!}
    {!!Form::file('image',['class' =>'dropify','data-default-file'=>isset($category->image)? url('category_image/' . $category->image):null])!!}
    {{-- // 'data-default-file'=>isset($service->image)? url('serviceimages/' . $service->image):null) --}}
</div>

