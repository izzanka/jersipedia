<div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="align-items-center">
                <div class="card rounded-3">
                    <div class="card-body">
                        <div class="text-center">
                            <h3><b>Register</b></h3>
                            Already have a jersipedia account? <a href="{{route('login')}}" wire:navigate class="text-green">Log In</a>
                        </div>
                        <button class="btn w-100 mt-3 rounded-3">Google</button>
                        <div class="hr-text">
                            <span>or register with</span>
                        </div>
                        <form wire:submit="register">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" wire:model.blur="name"/>
                                @error('name')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label required">Email</label>
                                <input type="text" class="form-control rounded-3 @error('email') is-invalid @enderror" wire:model.blur="email"/>
                                @error('email')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Password</label>
                                <input type="password" class="form-control rounded-3 @error('email') is-invalid @enderror" wire:model.blur="password"/>
                                @error('password')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success w-100 mt-2 rounded-3" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
