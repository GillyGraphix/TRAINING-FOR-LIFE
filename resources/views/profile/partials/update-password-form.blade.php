<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
            Badilisha Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            Weka password yako ya sasa, kisha chagua password mpya.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Password ya sasa -->
        <div>
            <x-input-label for="update_password_current_password" value="Password ya sasa" />

            <div class="relative mt-1">
                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="block w-full pr-12"
                    autocomplete="current-password"
                    required
                />

                <button
                    type="button"
                    data-password-toggle="#update_password_current_password"
                    aria-label="Onyesha password ya sasa"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white"
                >
                    <svg data-eye-open class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M2.25 12s3.5-6.25 9.75-6.25S21.75 12 21.75 12s-3.5 6.25-9.75 6.25S2.25 12 2.25 12Z" />
                        <circle cx="12" cy="12" r="2.5" stroke-width="1.8" />
                    </svg>
                    <svg data-eye-closed class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9.9 5.9A10.7 10.7 0 0 1 12 5.75c6.25 0 9.75 6.25 9.75 6.25a16.4 16.4 0 0 1-3.1 3.8M6.2 6.2C3.65 7.8 2.25 12 2.25 12s3.5 6.25 9.75 6.25c1.3 0 2.45-.3 3.45-.78" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- Password mpya -->
        <div>
            <x-input-label for="update_password_password" value="Password mpya" />

            <div class="relative mt-1">
                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="block w-full pr-12"
                    autocomplete="new-password"
                    required
                />

                <button
                    type="button"
                    data-password-toggle="#update_password_password"
                    aria-label="Onyesha password mpya"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white"
                >
                    <svg data-eye-open class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M2.25 12s3.5-6.25 9.75-6.25S21.75 12 21.75 12s-3.5 6.25-9.75 6.25S2.25 12 2.25 12Z" />
                        <circle cx="12" cy="12" r="2.5" stroke-width="1.8" />
                    </svg>
                    <svg data-eye-closed class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9.9 5.9A10.7 10.7 0 0 1 12 5.75c6.25 0 9.75 6.25 9.75 6.25a16.4 16.4 0 0 1-3.1 3.8M6.2 6.2C3.65 7.8 2.25 12 2.25 12s3.5 6.25 9.75 6.25c1.3 0 2.45-.3 3.45-.78" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Thibitisha password mpya -->
        <div>
            <x-input-label for="update_password_password_confirmation" value="Thibitisha password mpya" />

            <div class="relative mt-1">
                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="block w-full pr-12"
                    autocomplete="new-password"
                    required
                />

                <button
                    type="button"
                    data-password-toggle="#update_password_password_confirmation"
                    aria-label="Onyesha uthibitisho wa password"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white"
                >
                    <svg data-eye-open class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M2.25 12s3.5-6.25 9.75-6.25S21.75 12 21.75 12s-3.5 6.25-9.75 6.25S2.25 12 2.25 12Z" />
                        <circle cx="12" cy="12" r="2.5" stroke-width="1.8" />
                    </svg>
                    <svg data-eye-closed class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9.9 5.9A10.7 10.7 0 0 1 12 5.75c6.25 0 9.75 6.25 9.75 6.25a16.4 16.4 0 0 1-3.1 3.8M6.2 6.2C3.65 7.8 2.25 12 2.25 12s3.5 6.25 9.75 6.25c1.3 0 2.45-.3 3.45-.78" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Hifadhi Password</x-primary-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm font-medium text-green-600">
                    Password imebadilishwa kikamilifu.
                </p>
            @endif
        </div>
    </form>
</section>

<script>
    document.addEventListener('click', function (event) {
        const button = event.target.closest('[data-password-toggle]');

        if (!button) return;

        const input = document.querySelector(button.dataset.passwordToggle);

        if (!input) return;

        const isShowing = input.type === 'text';
        input.type = isShowing ? 'password' : 'text';

        const eyeOpen = button.querySelector('[data-eye-open]');
        const eyeClosed = button.querySelector('[data-eye-closed]');

        eyeOpen.classList.toggle('hidden', !isShowing);
        eyeClosed.classList.toggle('hidden', isShowing);

        button.setAttribute(
            'aria-label',
            isShowing ? 'Onyesha password' : 'Ficha password'
        );
    });
</script>