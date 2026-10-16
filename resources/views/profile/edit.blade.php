<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                Admin Account
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Change system login password
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-10 dark:bg-gray-900 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-200 bg-[#070049] px-6 py-5 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-white">Change password</h3>
                    <p class="mt-1 text-sm text-gray-200">
                        Your username will remain the same.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6 p-6">
                    @csrf
                    @method('PUT')

                    {{-- Current password --}}
                    <div>
                        <label for="current_password" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Current password
                        </label>

                        <div class="relative">
                            <input
                                id="current_password"
                                name="current_password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="block w-full rounded-lg border-gray-300 pr-12 text-gray-900 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            >

                            <button type="button" class="password-toggle absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#070049] dark:text-gray-300" data-target="current_password" aria-label="Onyesha password ya sasa">
                                <svg class="eye-open h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg class="eye-closed hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 012.187-3.568M6.18 6.18A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.958 9.958 0 01-4.043 5.18M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>

                        @if ($errors->updatePassword->has('current_password'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('current_password') }}</p>
                        @endif
                    </div>

                    {{-- New password --}}
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            New password
                        </label>

                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                required
                                class="block w-full rounded-lg border-gray-300 pr-12 text-gray-900 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            >

                            <button type="button" class="password-toggle absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#070049] dark:text-gray-300" data-target="password" aria-label="Onyesha password mpya">
                                <svg class="eye-open h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg class="eye-closed hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 012.187-3.568M6.18 6.18A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.958 9.958 0 01-4.043 5.18M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>

                        @if ($errors->updatePassword->has('password'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password') }}</p>
                        @endif
                    </div>

                    {{-- Confirm new password --}}
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Confirm new password
                        </label>

                        <div class="relative">
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                autocomplete="new-password"
                                required
                                class="block w-full rounded-lg border-gray-300 pr-12 text-gray-900 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            >

                            <button type="button" class="password-toggle absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-[#070049] dark:text-gray-300" data-target="password_confirmation" aria-label="Onyesha uthibitisho wa password">
                                <svg class="eye-open h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg class="eye-closed hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 012.187-3.568M6.18 6.18A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.958 9.958 0 01-4.043 5.18M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>

                        @if ($errors->updatePassword->has('password'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password') }}</p>
                        @endif
                    </div>

                    @if (session('status') === 'password-updated')
                        <p class="rounded-lg bg-green-50 p-3 text-sm font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                            Password changed successfully.
                        </p>
                    @endif

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center rounded-lg bg-[#f79120] px-5 py-3 font-semibold text-white shadow hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-[#f79120] focus:ring-offset-2">
                            Save password
                        </button>

                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-[#070049] dark:text-gray-300 dark:hover:text-white">
                            Back to dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.password-toggle').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = document.getElementById(button.dataset.target);
                    const eyeOpen = button.querySelector('.eye-open');
                    const eyeClosed = button.querySelector('.eye-closed');

                    if (!input || !eyeOpen || !eyeClosed) return;

                    const showPassword = input.type === 'password';
                    input.type = showPassword ? 'text' : 'password';
                    eyeOpen.classList.toggle('hidden', showPassword);
                    eyeClosed.classList.toggle('hidden', !showPassword);
                });
            });
        });
    </script>
</x-app-layout>