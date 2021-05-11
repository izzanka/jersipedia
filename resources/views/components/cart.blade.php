
<li class="nav-item">
    <a class="nav-link" href="{{ route('cart') }}">
        
        <i class="bi bi-cart"></i>
        Cart
        @if(!empty($orderdetails)) 
        <span class="badge badge-success badge-pill">
            {{ $orderdetails }}</span>
        @endif
    </a>
</li>