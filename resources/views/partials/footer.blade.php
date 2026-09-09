<!-- Footer Section with Stars and Light Ray Effect -->
<style>
    .stars-bg {
        position: relative;
        background-color: #020617;
        overflow: hidden;
    }
    .stars-bg::before,
    .stars-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background-repeat: repeat;
        background-size: 400px 400px;
        pointer-events: none;
        z-index: 0;
    }
    .stars-bg::before {
        background-image: 
            radial-gradient(1.5px 1.5px at 20px 30px, rgba(255,255,255,0.8), rgba(0,0,0,0)),
            radial-gradient(2px 2px at 80px 70px, rgba(255,255,255,0.9), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 150px 20px, rgba(255,255,255,0.6), rgba(0,0,0,0)),
            radial-gradient(2.5px 2.5px at 220px 110px, rgba(255,255,255,1), rgba(0,0,0,0)),
            radial-gradient(1.5px 1.5px at 300px 50px, rgba(255,255,255,0.7), rgba(0,0,0,0)),
            radial-gradient(2px 2px at 350px 160px, rgba(255,255,255,0.8), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 50px 180px, rgba(255,255,255,0.5), rgba(0,0,0,0)),
            radial-gradient(2px 2px at 180px 220px, rgba(255,255,255,0.9), rgba(0,0,0,0));
        animation: twinkle 4s ease-in-out infinite, drift 60s linear infinite;
    }
    .stars-bg::after {
        background-image: 
            radial-gradient(1px 1px at 40px 90px, rgba(255,255,255,0.7), rgba(0,0,0,0)),
            radial-gradient(1.5px 1.5px at 110px 40px, rgba(255,255,255,0.6), rgba(0,0,0,0)),
            radial-gradient(2px 2px at 190px 130px, rgba(255,255,255,0.9), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 260px 60px, rgba(255,255,255,0.5), rgba(0,0,0,0)),
            radial-gradient(2px 2px at 330px 190px, rgba(255,255,255,0.8), rgba(0,0,0,0)),
            radial-gradient(1.5px 1.5px at 15px 240px, rgba(255,255,255,0.6), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 240px 250px, rgba(255,255,255,0.7), rgba(0,0,0,0));
        animation: twinkle 5s ease-in-out infinite reverse, drift 90s linear infinite reverse;
        animation-delay: 1.5s;
    }
    @keyframes twinkle {
        0%, 100% { opacity: 0.25; }
        50% { opacity: 1; }
    }
    @keyframes drift {
        from { background-position: 0 0; }
        to { background-position: 400px 400px; }
    }
</style>

<footer class="relative stars-bg text-white pt-20 pb-8 overflow-hidden">
    <!-- Volumetric Light Rays -->
    <div class="absolute -top-[20%] -right-[10%] w-[120%] md:w-[70%] h-[150%] bg-gradient-to-bl from-blue-500/30 via-blue-800/10 to-transparent transform rotate-[-15deg] blur-[80px] pointer-events-none z-0"></div>
    <div class="absolute -top-[10%] -right-[5%] w-[80%] md:w-[40%] h-[120%] bg-gradient-to-bl from-blue-300/20 via-blue-600/5 to-transparent transform rotate-[-25deg] blur-[60px] pointer-events-none z-0"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- Column 1: About TFL -->
            <div>
                <a href="{{ route('home') }}" class="inline-block mb-6 hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/footer.logo.png') }}" alt="Training For Life Logo" class="h-16 w-auto object-contain brightness-0 invert">
                </a>
                <p class="text-gray-300 leading-relaxed mb-6 text-left drop-shadow-sm">
                    Training For Life (TFL) is a registered NGO in Tanzania under Non-Governmental Organization act, 2002 with registration No. 00NGO/0245, dedicated to transforming youth into empowered leaders by closing the gaps of awareness, access, and marketable skills.
                </p>
                <a href="{{ route('get-involved') }}" class="bg-primary hover:bg-orange-600 text-white font-bold py-2.5 px-6 rounded-md shadow-lg shadow-primary/20 transition-all duration-300 inline-block hover:-translate-y-1">
                    Support
                </a>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6 border-b border-gray-700/50 pb-2 drop-shadow">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition flex items-center group"><svg class="w-4 h-4 mr-2 text-primary group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg> About Us</a></li>
                    <li><a href="{{ route('programmes') }}" class="text-gray-400 hover:text-white transition flex items-center group"><svg class="w-4 h-4 mr-2 text-primary group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg> Our Programmes</a></li>
                    <li><a href="{{ route('impact') }}" class="text-gray-400 hover:text-white transition flex items-center group"><svg class="w-4 h-4 mr-2 text-primary group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg> Alumni Stories</a></li>
                    <li><a href="{{ route('news-stories') }}" class="text-gray-400 hover:text-white transition flex items-center group"><svg class="w-4 h-4 mr-2 text-primary group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg> News & Events</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition flex items-center group"><svg class="w-4 h-4 mr-2 text-primary group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg> Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-6 border-b border-gray-700/50 pb-2 drop-shadow">Contact Us</h4>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-primary mt-1 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Moshi-Kilimanjaro, Tanzania<br>P.O. Box 12345</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-primary mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:tfltanzania@gmail.com" class="hover:text-white transition">tfltanzania@gmail.com</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-primary mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:+255765082693" class="hover:text-white transition">+255 765 082 693</a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Newsletter -->
<div x-data="{ 
    email: '', 
    loading: false, 
    successMessage: '', 
    errorMessage: '',
    submitNewsletter() {
        this.loading = true;
        this.successMessage = '';
        this.errorMessage = '';

        fetch('{{ route('newsletter.subscribe') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ email: this.email })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            this.loading = false;
            this.successMessage = data.message;
            this.email = ''; // Safisha input box
            
            // Ficha ujumbe baada ya sekunde 5
            setTimeout(() => { this.successMessage = ''; }, 5000);
        })
        .catch(error => {
            this.loading = false;
            if (error.errors && error.errors.email) {
                this.errorMessage = error.errors.email[0];
            } else {
                this.errorMessage = 'Imeshindikana. Tafadhali jaribu tena.';
            }
        });
    }
}">
    <h4 class="text-lg font-bold mb-6 border-b border-gray-700/50 pb-2 drop-shadow">Stay Updated</h4>
    <p class="text-gray-400 mb-4">Subscribe to our newsletter to receive the latest updates on our programmes and impact.</p>
    
    <!-- Fomu inayotumia Alpine.js @submit.prevent kuzuia reload -->
    <form @submit.prevent="submitNewsletter" class="flex flex-col space-y-3 relative z-20">
        <input type="email" x-model="email" required placeholder="Enter your email" class="bg-gray-900/60 border border-gray-700/50 text-white rounded-md px-4 py-2.5 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary backdrop-blur-sm">
        
        <button type="submit" :disabled="loading" class="bg-white text-gray-900 hover:bg-gray-100 font-bold py-2.5 rounded-md transition shadow-md flex items-center justify-center">
            <span x-show="!loading">Subscribe</span>
            <span x-show="loading" class="flex items-center gap-2">
                <svg class="animate-spin h-5 w-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                Sending...
            </span>
        </button>
    </form>

    <!-- Ujumbe wa Error kama email si sahihi -->
    <p x-show="errorMessage" x-text="errorMessage" class="text-red-400 text-xs mt-2 font-medium"></p>

    <!-- SUCCESS TOAST MESSAGE (Inatokea papo hapo bila preloader) -->
    <div x-show="successMessage" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed bottom-8 right-8 z-[100] bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 border border-green-500/50">
        
        <svg class="w-6 h-6 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="font-bold text-sm">Success!</h4>
            <p class="text-sm text-green-50" x-text="successMessage"></p>
        </div>
        <button @click="successMessage = ''" class="ml-4 text-green-200 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
</div>

        <!-- Copyright & Social Media -->
        <div class="border-t border-gray-800/60 pt-8 flex flex-col md:flex-row justify-between items-center gap-17 md:gap-0">
            <p class="text-gray-500 text-sm text-center md:text-left drop-shadow-sm">
                &copy; {{ date('Y') }} Training For Life. All rights reserved.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center space-y-9 sm:space-y-6 sm:space-x-4">
                <span class="text-gray-500 text-xs font-bold tracking-widest uppercase">Our Social Media:</span>
                <div class="flex space-x-5 text-gray-400">
                    <a href="https://www.linkedin.com/in/training-for-life-tfltz-6222063b8" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition hover:-translate-y-1 transform" title="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/trainingforlife_tz?igsh=MWNkdDJsd3V6a2RqYQ==" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition hover:-translate-y-1 transform" title="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://www.tiktok.com/@training.for.lifetz?_r=1&_t=ZS-98n4qcWsN4j" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition hover:-translate-y-1 transform" title="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SUCCESS TOAST MESSAGE (Hapa ndipo ujumbe wa mafanikio unapotokea) -->
    @if(session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             class="fixed bottom-8 right-8 z-[100] bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 border border-green-500/50">
            
            <svg class="w-6 h-6 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h4 class="font-bold text-sm">Success!</h4>
                <p class="text-sm text-green-50">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-green-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif
</footer>