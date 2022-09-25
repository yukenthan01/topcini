<div class="form-group" style="border: double;">
    <div style="height:224px; overflow-y: scroll; margin-left: 15%; margin-top: 5%;">
        <ul class="tree">

            @foreach ($categories as $category)
        
                @php 
                  $is_checked = isset($post) ? in_array($category->id, [$post->category->parent->id]) ? 'checked' : '' : null;
                @endphp
            
                @if ($category->children()->count() > 0)
                    <li class="has">
                        <label> <i class="fab fa-bandcamp menu-icon"></i> {{$category->name}} <span class="total">({{$category->children()->where('status', 'active')->count()}})</span></label>
                
                        <ul style="{{ $is_checked ? 'display:block' : '' }}">
                
                        @foreach ($category->children as $child)
                            @if ($child->status == 'active')
                                
                                @php 
                                $is_checked_child = isset($post) ? in_array($child->id, [$post->category_id]) ? 'checked' : '' : null;
                                @endphp
                                <li class="">
                                    <label>
                                    <input class="category"  type="radio" name="category_id" value="{{$child->id}}" {{ $is_checked_child }}>
                                    {{$child->name}}</label>
                                </li>
                            @endif

                        @endforeach
                        </ul>
                    </li>
                @else
                    
                    <li class="has">
                    <label><i class="fab fa-bandcamp menu-icon"></i> {{$category->name}} </label>
                    </li>
                @endif
            @endforeach
        </ul>
            
    </div>
</div>

@push('script')
    <script type="text/javascript">
        $(document).on('click', '.tree label', function(e) {
        $(this).next('ul').toggle();
            e.stopPropagation();
        });

        $(document).on('change', '.tree input[type=radio]', function(e) {
        $(this).siblings('ul').find("input[type='radio']").prop('checked', this.checked);
        $(this).parentsUntil('.tree').children("input[type='radio']").prop('checked', this.checked);
        e.stopPropagation();
        });
    </script>
@endpush           