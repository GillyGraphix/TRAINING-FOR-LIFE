<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Training For Life (TFL)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    @include('partials.header')

    <main class="pt-32 pb-20 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Get In Touch</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-4">Contact Us</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <!-- Contact Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Phone Card -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 mx-auto bg-primary/10 text-primary rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Phone</h3>
                    <p class="text-slate-600 dark:text-gray-300 text-sm">+255 765 082 693</p>
                </div>

                <!-- Email & Web Card -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 mx-auto bg-primary/10 text-primary rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Email & Web</h3>
                    <p class="text-slate-600 dark:text-gray-300 text-sm">tfltanzania@gmail.com</p>
                    <p class="text-slate-600 dark:text-gray-300 text-sm mt-1">www.trainingforlifetz.org</p>
                </div>

                <!-- Office Location Card -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 mx-auto bg-primary/10 text-primary rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Office</h3>
                    <p class="text-slate-600 dark:text-gray-300 text-sm">Market Street, ELCT Northern Diocese Building, Second floor, Office no 42 & 43.</p>
                </div>

                <!-- Postal Address Card -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-800 hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 mx-auto bg-primary/10 text-primary rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Postal Address</h3>
                    <p class="text-slate-600 dark:text-gray-300 text-sm">P.O. Box 998 Moshi, Kilimanjaro - Tanzania.</p>
                </div>

            </div>

            <!-- Social Media Section -->
            <div class="mt-12 text-center bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 max-w-2xl mx-auto">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4">Connect on Social Media</h3>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-2 sm:space-y-0 sm:space-x-8 text-slate-600 dark:text-gray-300 text-sm font-medium">
                    <p><strong>Facebook:</strong> Trainingforlifetz</p>
                    <p><strong>Instagram:</strong> @trainingforlife_tz</p>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>