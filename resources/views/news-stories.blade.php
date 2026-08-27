<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News & Stories - Training For Life (TFL)</title>
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
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Our Alumni Stories.</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border-l-4 border-primary">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white uppercase mb-2">AINGAYA LEMA.</h3>
                    <p class="text-sm text-primary mb-4">KIJANA FURSA Alumni 2024.</p>
                    <p class="text-slate-600 dark:text-gray-300 italic mb-4">"I want to give back what was given to me".</p>
                    <p class="text-slate-600 dark:text-gray-300">AINGAYA is currently a trainee facilitator with TFL guiding new KFP students..</p>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border-l-4 border-primary">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white uppercase mb-2">VICTORIA KESSY.</h3>
                    <p class="text-sm text-primary mb-4">Class of 2019 Alumni.</p>
                    <p class="text-slate-600 dark:text-gray-300 italic mb-4">"TFL equipped me with self-management skills, courage, and resilience"..</p>
                    <p class="text-slate-600 dark:text-gray-300">Victoria is now a teacher at NEW BEGGING PRIMARY SCHOOL, fulfilling her wish during the social replacement in MWERENI PRIMARY SCHOOL..</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Asset Builders.</h2>
                <p class="text-slate-600 dark:text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    The most profound demonstration of alumni commitment was the mobilization to fundraise for and purchase the 5-acre land in KAWAWA Village worthy TZS 30 Million.. This act represents a deep investment in the legacy of the organization they helped build..
                </p>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>