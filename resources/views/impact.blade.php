<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Impact - Training For Life (TFL)</title>
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
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Our 2025 Impact</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                <p class="mt-6 text-lg text-slate-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Measuring our commitment to youth empowerment through tangible assets and powerful partnerships[cite: 1].
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                    <div class="text-4xl font-bold text-primary mb-2">52</div>
                    <p class="text-slate-600 dark:text-gray-300 font-medium">Youth Empowered[cite: 1]</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">26 Course4 & 26 KFP graduates trained in 2025[cite: 1].</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                    <div class="text-4xl font-bold text-primary mb-2">845+</div>
                    <p class="text-slate-600 dark:text-gray-300 font-medium">Alumni Strong[cite: 1]</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Grew by 52 members in 2025, creating a vibrant network[cite: 1].</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                    <div class="text-4xl font-bold text-primary mb-2">13</div>
                    <p class="text-slate-600 dark:text-gray-300 font-medium">Businesses Activated[cite: 1]</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Contributing to local economic diversification[cite: 1].</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                    <div class="text-4xl font-bold text-primary mb-2">89%</div>
                    <p class="text-slate-600 dark:text-gray-300 font-medium">To Programs[cite: 1]</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Only 11% directed to administration[cite: 1].</p>
                </div>
            </div>

            <div class="bg-primary/5 dark:bg-slate-800 rounded-3xl p-8 md:p-12 border border-primary/20 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Strategic Asset Development & Partnerships</h2>
                <ul class="space-y-4 text-slate-600 dark:text-gray-300">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Our Alumni Collective purchased a 5-acre plot of land in KAWAWA Village for TZS 30 Million[cite: 1].</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>In its first cultivation cycle on the new land, we successfully harvested 33 bags of maize[cite: 1].</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Collaboration with CRDB Bank Foundation established a Seed Capital zero interest Loan Fund, providing graduates TZS 500,000 to TZS 5 million[cite: 1].</span>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>