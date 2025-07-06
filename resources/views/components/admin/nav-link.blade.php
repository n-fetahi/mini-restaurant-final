 @props(['href' , 'active' => false])
 
 <li class="nav-item">
     <a class="nav-link {{ $active ? 'text-warning' : 'text-light' }} " aria-current="page" href="{{ $href }}">{{ $slot }}</a>
</li>