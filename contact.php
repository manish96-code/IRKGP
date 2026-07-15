<?php
$pageTitle = "Contact Us";
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!-- Banner Section -->
<section class="relative py-28 bg-cover bg-center" style="background-image: url('assets/images/contact-banner.jpg');">
    <div class="absolute inset-0 bg-white/90"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-primary">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif tracking-tight">Contact Us</h1>
        <p class="text-slate-600 text-sm md:text-base font-light mt-3 max-w-lg mx-auto">Get in touch with our team for manpower recruitment and management inquiries.</p>
    </div>
</section>

<!-- Office Details Section (Centered, Form Removed) -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        
        <div class="text-center mb-12 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Reach Out</span>
            <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight">Our Office Details</h2>
            <p class="text-slate-500 font-medium">Feel free to connect with our recruitment coordinators directly using the details below.</p>
        </div>

        <!-- Centered Office Details Card -->
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-12 shadow-md bg-gradient-to-br from-white to-slateBg/30">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Address -->
                <div class="flex gap-4 items-start p-4 hover:bg-slate-50 rounded-xl transition duration-200">
                    <div class="h-12 w-12 rounded-xl bg-gold-100 text-secondary flex items-center justify-center text-xl flex-shrink-0 shadow-sm">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-primary text-base mb-1 font-serif">Corporate Address</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">Manjhli Chowk, Madhubani, Purnia, Bihar, India</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex gap-4 items-start p-4 hover:bg-slate-50 rounded-xl transition duration-200">
                    <div class="h-12 w-12 rounded-xl bg-gold-100 text-secondary flex items-center justify-center text-xl flex-shrink-0 shadow-sm">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-primary text-base mb-1 font-serif">Phone Number</h3>
                        <a href="tel:+919876543210" class="text-slate-600 text-sm hover:text-secondary transition font-semibold">+91 98765 43210</a>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex gap-4 items-start p-4 hover:bg-slate-50 rounded-xl transition duration-200">
                    <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl flex-shrink-0 shadow-sm">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-primary text-base mb-1 font-serif">Email Address</h3>
                        <a href="mailto:info@irkgpservices.com" class="text-slate-600 text-sm hover:text-secondary transition font-semibold">info@irkgpservices.com</a>
                    </div>
                </div>

                <!-- Hours -->
                <div class="flex gap-4 items-start p-4 hover:bg-slate-50 rounded-xl transition duration-200">
                    <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl flex-shrink-0 shadow-sm">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-primary text-base mb-1 font-serif">Office Timings</h3>
                        <p class="text-slate-600 text-sm">Mon - Sat: 9:00 AM - 6:00 PM</p>
                        <p class="text-slate-500 text-xs mt-0.5 font-medium">Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Google Map Embed (Madhubani, Purnia, Bihar) -->
<section class="pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <iframe src="https://maps.google.com/maps?q=Manjhli%20Chowk,%20Madhubani,%20Purnia,%20Bihar&t=&z=16&ie=UTF8&iwloc=&output=embed" class="w-full h-[450px] border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
