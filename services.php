<?php
$pageTitle = "Services";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Banner Section -->
<section class="relative py-28 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1920&q=80');">
    <div class="absolute inset-0 bg-primary/85"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif tracking-tight">Our Services</h1>
        <p class="text-slate-300 text-sm md:text-base font-light mt-3 max-w-lg mx-auto">Explore our range of workforce, staffing, and HR management solutions.</p>
    </div>
</section>

<!-- Detailed Services Grids -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">What We Do</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Tailored Manpower & Management Solutions</h2>
            <p class="text-slate-500 font-medium">Empowering your operational lines with professional, legally compliant, and vetted human resources.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 1. Recruitment Services -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">Recruitment Services</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Our team matches executive, management, and technical talent with key job specifications, reducing screening cycle times.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>

            <!-- 2. Staffing Solutions -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">Staffing Solutions</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Providing contract, seasonal, and permanent staff solutions to ensure your operations run continuously at peak capability.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>

            <!-- 3. HR Consulting -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">HR Consulting</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Formulating policies, auditing compliance, and designing employee performance programs tailored to regional laws.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>

            <!-- 4. Payroll Management -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">Payroll Management</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Automating payments, managing taxes, and structuring compliant reports to remove administrative overhead.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>

            <!-- 5. Workforce Management -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">Workforce Management</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Handling shift management, resource utilization, and tracking workforce productivity at physical industrial sites.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>

            <!-- 6. Recruitment Process Outsourcing (RPO) -->
            <div class="bg-[#fcfbf9] border border-slate-200/50 hover:border-secondary rounded-xl p-8 hover:-translate-y-2 hover:shadow-lg transition-all duration-300 group">
                <div class="h-12 w-12 rounded-xl bg-gold-50 text-secondary flex items-center justify-center text-xl mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="font-bold text-primary text-xl mb-3 font-serif">RPO (Recruitment Process Outsourcing)</h3>
                <p class="text-slate-500 text-sm leading-relaxed font-light mb-6">
                    Managing your entire corporate hiring department, from talent search to onboarding coordination seamlessly.
                </p>
                <a href="contact.php" class="text-secondary font-bold text-xs uppercase tracking-wider group-hover:text-gold-700 transition">Inquire Now &rarr;</a>
            </div>
        </div>

    </div>
</section>

<!-- Additional Banner / Trust Section -->
<section class="py-20 bg-slateBg border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Content -->
        <div class="space-y-6">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Workforce Verification</span>
            <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight">Structured Verification Scopes</h2>
            <p class="text-slate-600 leading-relaxed font-light">
                At IRKGP Services, we recognize that placing workforce assets involves risk. Thus, every single placement candidate goes through verification processes:
            </p>
            <ul class="space-y-3 text-slate-600 text-sm font-medium">
                <li><i class="fa-solid fa-circle-check text-secondary mr-2"></i> Thorough background & reference validation</li>
                <li><i class="fa-solid fa-circle-check text-secondary mr-2"></i> Preliminary technical skill tests</li>
                <li><i class="fa-solid fa-circle-check text-secondary mr-2"></i> Compliance with regional Bihar labor policies</li>
            </ul>
        </div>
        <!-- Right side CTA -->
        <div class="bg-primary text-white p-8 rounded-2xl border border-gold-800/10 space-y-6 shadow-md">
            <h3 class="text-2xl font-bold font-serif text-secondary">Looking for a custom labor recruitment quote?</h3>
            <p class="text-slate-400 text-sm leading-relaxed font-light">
                Give us details about your worker requirements, operational durations, and locations.
            </p>
            <a href="contact.php" class="px-6 py-3 bg-secondary text-primary font-bold text-xs uppercase tracking-wider rounded-lg shadow inline-block hover:bg-white hover:text-primary transition duration-300">Get Quote</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
