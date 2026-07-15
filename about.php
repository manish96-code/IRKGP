<?php
$pageTitle = "About Us";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Banner Section -->
<section class="relative py-28 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e0ee268cfec?auto=format&fit=crop&w=1920&q=80');">
    <div class="absolute inset-0 bg-primary/85"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif tracking-tight">About Our Company</h1>
        <p class="text-slate-300 text-sm md:text-base font-light mt-3 max-w-lg mx-auto">Discover the foundation, values, and leadership driving IRKGP Services forward.</p>
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
        <!-- Image Column -->
        <div class="relative">
            <div class="absolute -inset-1 bg-gradient-to-r from-secondary to-primary rounded-2xl blur opacity-20"></div>
            <img src="https://images.unsplash.com/photo-1552581230-c013b8e48b9a?auto=format&fit=crop&w=800&q=80" alt="IRKGP History" class="relative rounded-2xl shadow-lg object-cover w-full h-[380px]">
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
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80" alt="CEO" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Rajesh Kumar</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Managing Director</p>
                    <p class="text-slate-500 text-sm font-light">Leading tactical corporate integrations and Bihar regional scaling actions.</p>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80" alt="Lead Recruiter" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Priya Sharma</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Lead Talent Advisor</p>
                    <p class="text-slate-500 text-sm font-light">Directing professional vetting scopes and client onboarding pipelines.</p>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80" alt="HR Operations" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">Amit Verma</h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Operations Manager</p>
                    <p class="text-slate-500 text-sm font-light">Managing staffing operations, compliance reports, and site payroll details.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-primary text-white text-center border-t border-gold-800/10">
    <div class="max-w-4xl mx-auto px-6 space-y-6">
        <h2 class="text-3xl font-extrabold font-serif tracking-tight">Partner with Bihar's Top Recruitment Team</h2>
        <p class="text-slate-400 max-w-lg mx-auto text-sm font-light">
            We provide verified skilled technical labor and corporate resources built on structural legal agreements.
        </p>
        <div class="pt-2">
            <a href="contact.php" class="px-8 py-3.5 bg-gradient-to-r from-secondary to-gold-600 text-primary font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 inline-block text-xs uppercase tracking-wider">
                Partner with Us
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
