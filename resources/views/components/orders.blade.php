<li class="nav-item">
    <a class="nav-link" href="{{ route('order') }}">
        
        <i class="bi bi-truck"></i>
        Order
        @if(!empty($orders)) 
        <span class="badge badge-success badge-pill">
            {{ $orders }}</span>
        @endif
    </a>
</li>