<nav class="mobile-nav">
    <ul class="mobile-menu">
        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
          <a href="{{route('index')}}">Home</a>
        </li>
        @foreach ($categories as $category)
        
              
          <li class="menu-item  {{ (request()->is($category->slug.'*')) ? 'active' : '' }}">

            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
          </li>
        @endforeach
        <li class="">
          <a href="https://cinimovies.com/" target="_blank">Tamil Movies</a>
        </li>
       
    </ul>
</nav><!-- End .mobile-nav -->