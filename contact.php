<?php
$pageTitle = "Contact Us";
include 'includes/head.php';
include 'includes/navbar.php';

$messageSent = false;
$error = null;

// PHP Form Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'contact') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = "Please fill in all required fields (Name, Email, Subject, and Message).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $messageSent = true;
    }
}
?>

<!-- Banner Section (Light overlay, no gradients) -->
<section class="relative py-28 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e0ee268cfec?auto=format&fit=crop&w=1920&q=80');">
    <div class="absolute inset-0 bg-white/90"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-primary">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif tracking-tight">Contact Us</h1>
        <p class="text-slate-600 text-sm md:text-base font-light mt-3 max-w-lg mx-auto">Get in touch with our recruitment consultants for custom quote queries.</p>
    </div>
</section>

<!-- Contact Form & Details Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Success Alert Messages -->
        <?php if ($messageSent): ?>
            <div class="mb-12 p-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-start gap-4 shadow-sm animate-fade-in-up">
                <span class="text-2xl">🎉</span>
                <div>
                    <h4 class="font-bold text-emerald-900 text-lg">Message Submitted Successfully!</h4>
                    <p class="text-sm mt-1 font-sans">Thank you, <strong><?= $name ?></strong>. We have received your inquiry regarding <strong>"<?= $subject ?>"</strong>. Our operations team will get in touch with you shortly at <strong><?= $email ?></strong>.</p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="mb-12 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl flex items-center gap-3 shadow-sm">
                <span class="text-xl">⚠️</span>
                <span class="text-sm font-semibold"><?= $error ?></span>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Side: Office Info -->
            <div class="lg:col-span-4 space-y-8">
                <div>
                    <span class="text-xs font-bold text-secondary uppercase tracking-widest block mb-2">Reach Out</span>
                    <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight">Our Office Details</h2>
                </div>

                <div class="space-y-6">
                    <!-- Address -->
                    <div class="flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-lg bg-gold-50 text-secondary flex items-center justify-center text-lg flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary mb-1">Corporate Address</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">Patna, Bihar, India</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-lg bg-gold-50 text-secondary flex items-center justify-center text-lg flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary mb-1">Phone Number</h4>
                            <a href="tel:+919876543210" class="text-slate-500 text-sm hover:text-secondary transition">+91 98765 43210</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-lg bg-gold-50 text-secondary flex items-center justify-center text-lg flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary mb-1">Email Address</h4>
                            <a href="mailto:info@irkgpservices.com" class="text-slate-500 text-sm hover:text-secondary transition">info@irkgpservices.com</a>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-lg bg-gold-50 text-secondary flex items-center justify-center text-lg flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary mb-1">Office Timings</h4>
                            <p class="text-slate-500 text-sm">Mon - Sat: 9:00 AM - 6:00 PM</p>
                            <p class="text-slate-500 text-sm mt-0.5">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form (Removed gradient card background) -->
            <div class="lg:col-span-8">
                <div class="bg-white border border-slate-200/60 rounded-2xl p-8 md:p-10 shadow-md">
                    <form action="contact.php" method="POST" class="space-y-6">
                        <input type="hidden" name="action" value="contact">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your Name *</label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none text-slate-800 text-sm transition"
                                       placeholder="e.g. John Doe" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none text-slate-800 text-sm transition"
                                       placeholder="e.g. name@domain.com" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone"
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none text-slate-800 text-sm transition"
                                       placeholder="e.g. +91 99999 99999" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                            </div>
                            <div>
                                <label for="subject" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Subject *</label>
                                <input type="text" id="subject" name="subject" required
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none text-slate-800 text-sm transition"
                                       placeholder="e.g. Staffing Inquiry" value="<?= isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '' ?>">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none text-slate-800 text-sm transition"
                                      placeholder="Describe your requirements in detail..."><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                        </div>

                        <div>
                            <!-- Submit Button (Solid Primary Navy Color, no gradients) -->
                            <button type="submit" class="w-full py-4 bg-primary hover:bg-slate-800 text-white font-bold rounded-xl shadow transition duration-200 uppercase tracking-wider text-xs">
                                Send Message <i class="fa-solid fa-paper-plane ml-2 text-xs"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Google Map Embed (Removed absolute gradient blur outline wrapper) -->
<section class="pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115133.01016860368!2d85.07897217983637!3d25.608020764724213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f29937c52d4f05%3A0x831a0e05f607b270!2sPatna%2C%20Bihar!5e0!3m2!1sen!2sin!4v1689410000000!5m2!1sen!2sin" class="w-full h-[400px] border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
