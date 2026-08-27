<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Involved - Training For Life (TFL)</title>
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
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Get Involved & Shape the Future</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Local Donations.</h2>
                    <div class="space-y-6">
                        <div class="p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <h3 class="font-bold text-primary mb-2">Mobile Money.</h3>
                            <p class="text-slate-600 dark:text-gray-300">M-pesa: +255 765 082 693.</p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                            <h3 class="font-bold text-primary mb-2">Bank Transfers.</h3>
                            <p class="text-slate-600 dark:text-gray-300">CRDB, TRAINING FOR LIFE<br>No. 01J1040830000.</p>
                            <div class="my-2 border-t border-gray-200 dark:border-gray-600"></div>
                            <p class="text-slate-600 dark:text-gray-300">NMB, TRAINING FOR LIFE<br>No. 40310079986.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">US Donors (Tax-Deductible).</h2>
                    <p class="text-slate-600 dark:text-gray-300 mb-6">Give easily via Donor-Advised Funds (DAF) and other channels through our fiscal sponsor, Mama Hope International..</p>
                    
                    <div class="p-4 bg-gray-50 dark:bg-slate-700/50 rounded-lg">
                        <h3 class="font-bold text-primary mb-2">Bank Information.</h3>
                        <p class="text-slate-600 dark:text-gray-300 font-medium">JPMorgan Chase Bank, N.A.</p>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">P O Box 659754<br>San Antonio, TX 78265 – 9754.</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600 dark:text-gray-300">
                            <li><strong>Routing No.:</strong> 322271627.</li>
                            <li><strong>Account Number:</strong> 478801082.</li>
                            <li><strong>Address:</strong> 276 5th Avenue, Suite 704 #722, New York, NY 10001.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>