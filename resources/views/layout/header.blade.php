<header class="navbar navbar-expand-sm navbar-light d-print-none">
    <div class="container-xl">
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{route('home')}}" class="text-success" wire:navigate>
                Jersipedia
            </a>
        </h1>

        <div class="text-center align-items-center">
            <div class="input-icon">
                <input type="text" value="" class="form-control" placeholder="Search in Jersipedia" />
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                  </svg>
                </span>
            </div>
        </div>

        <div class="navbar-nav flex-row order-md-last">
            @guest()
                <div class="nav-item ms-4">
                    <a href="{{route('login')}}" class="btn btn-outline-success rounded-3">
                        Login
                    </a>
                </div>
                <div class="nav-item ms-3">
                    <a href="{{route('register')}}" class="btn btn-success rounded-3">Register</a>
                </div>
            @else
                <div class="nav-item me-2">
                    <livewire:cart.cart-badge/>
                </div>
                <div class="nav-item me-2">
                    <a href="" class="btn" aria-label="Button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                        <span class="badge badge-pill bg-red">0</span>
                    </a>
                </div>
                <div class="nav-item me-3">
                    <a href="" class="btn" aria-label="Button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                        <span class="badge badge-pill bg-red">0</span>
                    </a>
                </div>
                <div class="nav-item">
                    <span class="avatar rounded-circle avatar-sm" style="background-image: url({{auth()->user()->image}})"></span>
                </div>
            @endguest
        </div>
    </div>
</header>
