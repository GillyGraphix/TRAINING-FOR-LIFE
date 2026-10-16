<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    private const MAX_ATTEMPTS = 5;
    private const LOCKOUT_SECONDS = 120;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(
            $this->only('username', 'password'),
            $this->boolean('remember')
        )) {
            RateLimiter::hit($this->throttleKey(), self::LOCKOUT_SECONDS);

            if (RateLimiter::tooManyAttempts(
                $this->throttleKey(),
                self::MAX_ATTEMPTS
            )) {
                /*
                 * Anzisha muda mpya wa sekunde 120 kuanzia jaribio la tano.
                 * Tunaweka attempts kwenye kiwango cha lockout baada ya kusafisha
                 * counter ili muda wote wa kusubiri uwe sekunde 120 kamili.
                 */
                RateLimiter::clear($this->throttleKey());

                for ($attempt = 0; $attempt < self::MAX_ATTEMPTS; $attempt++) {
                    RateLimiter::hit($this->throttleKey(), self::LOCKOUT_SECONDS);
                }

                $this->ensureIsNotRateLimited();
            }

            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts(
            $this->throttleKey(),
            self::MAX_ATTEMPTS
        )) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('username')) . '|' . $this->ip()
        );
    }
}