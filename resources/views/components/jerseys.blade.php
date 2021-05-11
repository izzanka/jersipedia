<li class="nav-item">
    <a class="nav-link" href="{{ route('jerseys.index') }}">
        <i class="bi bi-archive"></i>
        Jersey
        @if(!empty($jerseys)) 
        <span class="badge badge-primary badge-pill">
            {{ $jerseys }}</span>
        @endif
    </a>
</li>