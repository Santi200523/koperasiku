public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');
        $credentials['is_active'] = true; // Tambahan: Hanya akun aktif yang bisa login

        if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }