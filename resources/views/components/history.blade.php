<li class="nav-item">
    <a class="nav-link" href="{{ route('history') }}">
        
        <i class="bi bi-clock-history"></i>
        History
        @if(!empty($orders)) 
        <span class="badge badge-primary badge-pill">
            {{ $orders }}</span>
        @endif
    </a>
</li>