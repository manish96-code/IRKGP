<?php
$pageTitle = "About Us";
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!-- Banner Section (Light overlay, no gradients) -->
<section class="relative py-28 bg-cover bg-center" style="background-image: url('assets/images/about-banner.jpg');">
    <div class="absolute inset-0 bg-white/90"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-primary">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif tracking-tight">About Our Company</h1>
        <p class="text-slate-600 text-sm md:text-base font-light mt-3 max-w-lg mx-auto">Discover the foundation, values, and leadership driving IRKGP Services forward.</p>
    </div>
</section>

<!-- Company Introduction & History -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text Column -->
        <div class="space-y-6">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Our Background</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Company Overview & History</h2>
            <p class="text-slate-600 leading-relaxed font-light">
                Established with a vision to streamline hiring complexities, **IRKGP Services Pvt. Ltd.** has grown from a local staffing advisor in Patna, Bihar, to a recognized recruitment partner across industrial and commercial domains.
            </p>
            <p class="text-slate-600 leading-relaxed font-light">
                Our history is rooted in understanding candidate needs and operational corporate demands. By bridging geographic talent resources, we have supported construction pipelines, healthcare settings, and corporate grids with vetted professionals.
            </p>
        </div>
        <!-- Image Column (Removed gradient blur overlay) -->
        <div class="relative">
            <img src="assets/images/about-preview.jpg" alt="IRKGP History" class="rounded-2xl shadow-md border border-slate-200 object-cover w-full h-[380px]">
        </div>
    </div>
</section>

<!-- Mission, Vision & Core Values -->
<section class="py-20 bg-slateBg border-y border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Mission Card -->
        <div class="bg-white border border-slate-200/50 rounded-xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="h-12 w-12 rounded-xl bg-gold-100 text-secondary flex items-center justify-center text-xl font-bold mb-6">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h3 class="font-bold text-primary text-xl mb-3 font-serif">Our Mission</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                To identify and place qualified candidates who match organizational goals, while fostering transparent employment frameworks.
            </p>
        </div>

        <!-- Vision Card -->
        <div class="bg-white border border-slate-200/50 rounded-xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="h-12 w-12 rounded-xl bg-gold-100 text-secondary flex items-center justify-center text-xl font-bold mb-6">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h3 class="font-bold text-primary text-xl mb-3 font-serif">Our Vision</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                To lead the manpower solutions market in Bihar and beyond, recognized for legal compliance, client reliability, and career training.
            </p>
        </div>

        <!-- Core Values Card -->
        <div class="bg-white border border-slate-200/50 rounded-xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="h-12 w-12 rounded-xl bg-gold-100 text-secondary flex items-center justify-center text-xl font-bold mb-6">
                <i class="fa-solid fa-handshake"></i>
            </div>
            <h3 class="font-bold text-primary text-xl mb-3 font-serif">Core Values</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                Built on accountability, legal transparency, professional ethics, and customer satisfaction in staffing delivery.
            </p>
        </div>

    </div>
</section>

<!-- Why Choose IRKGP Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center max-w-3xl mx-auto mb-16 space-y-4">
        <span class="text-xs font-bold text-secondary uppercase tracking-widest block">The Strategic Edge</span>
        <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Why Choose IRKGP</h2>
        <p class="text-slate-500 font-medium max-w-xl mx-auto">Our recruitment methodologies focus on reducing organizational friction through compliance and vetted talent mapping.</p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="flex gap-4 p-6 bg-slateBg rounded-xl border border-slate-200/50">
            <div class="text-xl text-secondary"><i class="fa-solid fa-shield-halved"></i></div>
            <div>
                <h4 class="font-bold text-primary mb-1">Strict Legal Adherence</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Adhering completely to employee tax structures, contract guidelines, and government mandates in Bihar.</p>
            </div>
        </div>
        <div class="flex gap-4 p-6 bg-slateBg rounded-xl border border-slate-200/50">
            <div class="text-xl text-secondary"><i class="fa-solid fa-users-viewfinder"></i></div>
            <div>
                <h4 class="font-bold text-primary mb-1">Tailored Candidate Matching</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Every profile goes through preliminary validation and experience tests before final recommendation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Professional Team -->
<section class="py-20 bg-slateBg border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Our Team</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Leadership & Recruitment Experts</h2>
            <p class="text-slate-500 font-medium">Experienced professionals dedicated to your scaling outcomes.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Member 1 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <img src="assets/images/ceo.jpg" alt="CEO" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Rajesh Kumar</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Managing Director</p>
                    <p class="text-slate-500 text-sm font-light">Leading tactical corporate integrations and Bihar regional scaling actions.</p>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <img src="assets/images/recruiter.jpg" alt="Lead Recruiter" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Priya Sharma</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Lead Talent Advisor</p>
                    <p class="text-slate-500 text-sm font-light">Directing professional vetting scopes and client onboarding pipelines.</p>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <img src="assets/images/operations.jpg" alt="HR Operations" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Amit Verma</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Operations Manager</p>
                    <p class="text-slate-500 text-sm font-light">Managing staffing operations, compliance reports, and site payroll details.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section (Light theme, solid buttons) -->
<section class="py-20 bg-slate-100 text-slate-800 text-center border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-6 space-y-6">
        <h2 class="text-3xl font-extrabold font-serif tracking-tight text-primary">Partner with Bihar's Top Recruitment Team</h2>
        <p class="text-slate-500 max-w-lg mx-auto text-sm font-light font-sans">
            We provide verified skilled technical labor and corporate resources built on structural legal agreements.
        </p>
        <div class="pt-2">
            <a href="contact.php" class="px-8 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-xl shadow hover:-translate-y-1 transition-all duration-300 inline-block text-xs uppercase tracking-wider">
                Partner with Us
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
