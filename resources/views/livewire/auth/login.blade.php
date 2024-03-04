<div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="align-items-center">
                <div class="card rounded-3">
                    <div class="card-body">
                        <div class="text-center">
                            <h3><b>Login</b></h3>
                            Doesn't have a jersipedia account? <a href="{{route('register')}}" wire:navigate class="text-green">Register</a>
                        </div>
                        <form wire:submit="login">
                            <div class="mb-3 mt-4">
                                <label class="form-label required">Email</label>
                                <input type="text" class="form-control rounded-3 @error('email') is-invalid @enderror" wire:model.blur="email"/>
                                @error('email')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Password</label>
                                <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" wire:model.blur="password"/>
                                @error('password')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success w-100 mt-2 rounded-3" type="submit">Login</button>
                        </form>
                        <div class="hr-text">
                                <span>or login with</span>
                            </div>
                        <button class="btn w-100 mt-2 rounded-3">Google</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
