<x-guest-layout>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#070049] via-[#0d1b3e] to-[#d35907] px-4 sm:px-6 lg:px-8 py-6 relative overflow-hidden">

        <!-- Background Soft Glow Shapes -->
        <div class="absolute top-0 left-0 w-full h-full opacity-15 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-black blur-3xl"></div>
        </div>

        <div class="max-w-md w-full bg-white p-6 sm:p-8 rounded-xl shadow-2xl relative z-10 border-t-4 border-[#f79120]">

            <!-- Logo Section -->
            <div class="flex flex-col items-center justify-center mb-6">
                <img src="{{ asset('images/loginlogo.png') }}"
                     alt="TFL Logo"
                     class="h-16 w-auto mb-2 drop-shadow-sm">

                <h2 class="text-center text-2xl font-bold text-black">
                    Welcome Back
                </h2>

                <p class="text-center text-xs sm:text-sm text-gray-500 mt-1">
                    Sign in to your admin panel
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form and Lockout Countdown -->
            <form method="POST"
                  action="{{ route('login') }}"
                  class="space-y-4"
                  x-data="{
                      remaining: 0,
                      lockoutActive: false,
                      timer: null,

                      startCountdown(seconds) {
                          this.remaining = seconds;
                          this.lockoutActive = true;

                          this.timer = setInterval(() => {
                              if (this.remaining > 0) {
                                  this.remaining--;
                              }

                              if (this.remaining <= 0) {
                                  clearInterval(this.timer);
                                  this.remaining = 0;
                              }
                          }, 1000);
                      }
                  }"
                  x-init="
                      const loginError = @js($errors->first('username'));
                      const match = loginError.match(/(\d+)\s*seconds?/i);

                      if (match) {
                          startCountdown(parseInt(match[1], 10));
                      }
                  ">
                @csrf

                <!-- Countdown Message -->
                <div x-show="lockoutActive"
                     x-cloak
                     role="status"
                     aria-live="polite"
                     class="rounded-lg border border-amber-300 bg-amber-50 px-4 py-3 text-sm text-amber-900">
                    <template x-if="remaining > 0">
                        <p>
                            Too many login attempts.
                            Please wait.
                            <strong x-text="remaining" class="font-extrabold"></strong>
                            seconds before trying again.
                        </p>
                    </template>

                    <template x-if="remaining === 0">
                        <p>Timeout expired. You can now try again.</p>
                    </template>
                </div>

                <!-- Username Field -->
                <div>
                    <label for="username"
                           class="block text-xs font-semibold uppercase tracking-wider text-[#070049] mb-1">
                        Username
                    </label>

                    <input id="username"
                           name="username"
                           type="text"
                           autocomplete="username"
                           required
                           autofocus
                           value="{{ old('username') }}"
                           placeholder="Enter your username"
                           class="appearance-none block w-full px-3.5 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#f79120] focus:border-[#f79120] transition-colors">

                    @if ($errors->has('username'))
                        <p x-show="!lockoutActive"
                           class="mt-1 text-xs text-red-600">
                            {{ $errors->first('username') }}
                        </p>
                    @endif
                </div>

                <!-- Password Field with Working Show/Hide Eye -->
                <div x-data="{ showPassword: false }">
                    <label for="password"
                           class="block text-xs font-semibold uppercase tracking-wider text-[#070049] mb-1">
                        Password
                    </label>

                    <div class="relative">
                        <input id="password"
                               name="password"
                               x-bind:type="showPassword ? 'text' : 'password'"
                               x-bind:disabled="remaining > 0"
                               autocomplete="current-password"
                               required
                               placeholder="••••••••"
                               class="appearance-none block w-full px-3.5 py-2.5 pr-12 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#f79120] focus:border-[#f79120] transition-colors disabled:bg-gray-100 disabled:cursor-not-allowed">

                        <button type="button"
                                x-on:click="showPassword = !showPassword"
                                x-bind:aria-label="showPassword ? 'Hide password' : 'Show password'"
                                x-bind:title="showPassword ? 'Hide password' : 'Show password'"
                                x-bind:disabled="remaining > 0"
                                aria-controls="password"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-[#f79120] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#f79120] rounded-r-lg disabled:opacity-50 disabled:cursor-not-allowed">

                            <!-- Eye icon: password is hidden -->
                            <svg x-show="!showPassword"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8"
                                 aria-hidden="true">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.25 12s3.5-7 9.75-7 9.75 7 9.75 7-3.5 7-9.75 7-9.75-7-9.75-7z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>

                            <!-- Crossed eye icon: password is visible -->
                            <svg x-show="showPassword"
                                 x-cloak
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8"
                                 aria-hidden="true">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 3l18 18M10.6 10.7a2 2 0 002.7 2.7" />
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M9.9 5.2A10.8 10.8 0 0112 5c6.2 0 9.8 7 9.8 7a16 16 0 01-3.1 3.8M6.2 6.2C3.7 7.8 2.2 12 2.2 12s3.6 7 9.8 7c1.2 0 2.3-.3 3.3-.7" />
                            </svg>
                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('password')"
                                   class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-sm py-1">
                    <div class="flex items-center">
                        <input id="remember_me"
                               name="remember"
                               type="checkbox"
                               class="h-4 w-4 text-[#f79120] focus:ring-[#f79120] border-gray-300 rounded">

                        <label for="remember_me" class="ml-2 block text-xs text-gray-700">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-xs font-medium text-[#070049] hover:text-[#f79120] transition-colors">
                            {{--Forgot password?--}}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            x-bind:disabled="remaining > 0"
                            class="group relative w-full flex justify-center items-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-[#f79120] hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#070049] transition-all duration-300 shadow-md disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-[#f79120]">
                        <svg class="h-4 w-4 mr-2 text-white/80 group-hover:text-[#f79120] transition-colors"
                             fill="currentColor"
                             viewBox="0 0 20 20"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span x-show="remaining === 0">Sign In</span>
                        <span x-show="remaining > 0">
                            Wait <span x-text="remaining"></span>s
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>