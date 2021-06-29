<li class="nav-item">
    <a class="nav-link" href="{{ route('cart') }}">
        
        <i class="bi bi-cart"></i>
        Cart
        <span class="badge badge-success badge-pill">
            {{ $orderdetails ?? 0}}</span>
    </a>
</li>