<x-guest-layout>
    <!-- Session Status -->
    @if(isset($status))
        <p class='fw-bold'>{{ $status }}</p>
    @endif
    <h2 class="mt-5">Ingresar</h2>
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('login') }}" class="col-md-8 card mt-4" style="background-color: rgba(83, 83, 83, 0.1);">
            <p class="mt-2 mb-0">email@falso.com<br>123456</p>
            <div class="card-body p-4">
                @csrf
                <!-- Email Address -->
                <div>
                    <label class="form-label"> {{ __('Correo Electrónico:') }} </label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />

                </div>
                <!-- Password -->
                <div class="mt-4">
                    <label class="form-label"> {{ __('Contraseña:') }} </label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <span>{{ __('Recordarme') }}</span>
                    </label>
                </div>
                <p class="text-start text-danger">@error('email') {{ $message }} @enderror</p>
                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">{{ __('Olvidé mi contraseña') }}</a>
                    @endif
                    <button type="submit" class="btn btn-primary m-3">{{ __('Ingresar') }}</button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>