
<div class="form-group">
    {!!Form::label('title', 'Title')!!}
    {!!Form::text('title',isset($title)?$title:null,['class' =>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('date', 'Date')!!}
    {!!Form::text('date',isset($post->date )?date('Y-m-d', strtotime($post->date)):date('Y-m-d'),['class' =>'form-control'])!!}
</div>
{{-- <div class="form-group">
    {!!Form::label('slug', 'Slug')!!}
    {!!Form::text('slug',null,['class' =>'form-control'])!!}
</div> --}}

<div class="form-group">
    {!!Form::label('content', 'Content')!!}
    {!!Form::textarea('content',isset($videourl)?$videourl:null,['class' =>'form-control','rows'=>3])!!}
    {{-- ,'id'=>'summernoteExample' --}}
</div>

<div class="form-group">
    {!!Form::label('title_text', 'Title Text')!!}
    {!!Form::select('title_text', ['tamil' => 'Tamil', 'title' => 'Title'], null, ['class' =>'form-control', ]) !!}
</div>
{{-- <div class="form-group">
    {!!Form::label('content2', 'Content 2')!!}
    {!!Form::textarea('content2',null,['class' =>'form-control','rows'=>3])!!}
</div>

<div class="form-group">
    {!!Form::label('content3', 'Content 3')!!}
    {!!Form::textarea('content3',null,['class' =>'form-control','rows'=>3])!!}
</div>

<div class="form-group">
    {!!Form::label('content4', 'Content 4')!!}
    {!!Form::textarea('content4',null,['class' =>'form-control','rows'=>3])!!}
</div> --}}

<div class="form-group">
    {!!Form::label('share', 'Share')!!}
    {!!Form::select('share', ['1' => 'Yes', '0' => 'No'], null, ['class' =>'form-control', ]) !!}
</div>
{{-- 
<div class="form-group">
    {!!Form::label('image', 'Featured Image')!!}
    {!!Form::file('image',['class' =>'dropify','data-default-file'=>isset($post->image)? url('post_image/' . $post->image):null])!!}
</div> --}}
