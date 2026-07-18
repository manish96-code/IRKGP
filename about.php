<?php
$pageTitle = "About Us";
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!-- Banner Section -->
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
                Established with a vision to streamline hiring complexities, **IRKGP Services Pvt. Ltd.** has grown from a local staffing advisor in Bihar, to a recognized recruitment partner across industrial and commercial domains.
            </p>
            <p class="text-slate-600 leading-relaxed font-light">
                Our history is rooted in understanding candidate needs and operational corporate demands. By bridging geographic talent resources, we have supported construction pipelines, healthcare settings, and corporate grids with vetted professionals.
            </p>
        </div>
        <!-- Image Column -->
        <div class="relative">
            <img src="assets/images/about-preview.jpg" alt="IRKGP History" class="rounded-2xl shadow-md border border-slate-200 object-cover w-full h-[280px] sm:h-[380px]">
        </div>
    </div>
</section>

<!-- Corporate Registration & Credentials -->
<section class="py-20 bg-slateBg border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Official Credentials</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Corporate Registration Details</h2>
            <p class="text-slate-500 font-medium">Official corporate details registered under the Ministry of Corporate Affairs (MCA), Government of India.</p>
        </div>

        <div class="max-w-4xl mx-auto bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-200">
                <!-- Col 1 -->
                <div class="p-6 md:p-8 space-y-4">
                    <div class="flex justify-between items-center pb-3 border-b border-slate-200/60">
                        <span class="text-sm font-semibold text-slate-500">Company Name</span>
                        <span class="text-sm font-bold text-primary text-right">IRKGP SERVICES PRIVATE LIMITED</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-slate-500">CIN</span>
                        <span class="text-sm font-mono font-bold text-secondary text-right text-xs">U78100BR2026PTC086015</span>
                    </div>
                </div>
                <!-- Col 2 -->
                <div class="p-6 md:p-8 space-y-4">
                    <div class="flex justify-between items-center pb-3 border-b border-slate-200/60">
                        <span class="text-sm font-semibold text-slate-500">Class of Company</span>
                        <span class="text-sm font-bold text-primary text-right">Private Limited</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-slate-500">Primary Business Activity</span>
                        <span class="text-sm font-bold text-primary text-right">Employment placement services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision & Core Values -->
<section class="py-20 bg-white border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Mission -->
        <div class="p-8 bg-slateBg border border-slate-200/50 rounded-xl space-y-4">
            <div class="h-10 w-10 bg-gold-50 text-secondary rounded-lg flex items-center justify-center text-lg shadow-sm">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h3 class="text-xl font-bold text-primary font-serif">Our Mission</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                To connect leading enterprises with thoroughly vetted workforce assets, minimizing operational vacancy times with absolute compliance.
            </p>
        </div>

        <!-- Vision -->
        <div class="p-8 bg-slateBg border border-slate-200/50 rounded-xl space-y-4">
            <div class="h-10 w-10 bg-gold-50 text-secondary rounded-lg flex items-center justify-center text-lg shadow-sm">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h3 class="text-xl font-bold text-primary font-serif">Our Vision</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                To set the benchmark for reliable, high-performance placement architectures across Eastern India, boosting employment potentials.
            </p>
        </div>

        <!-- Values -->
        <div class="p-8 bg-slateBg border border-slate-200/50 rounded-xl space-y-4">
            <div class="h-10 w-10 bg-gold-50 text-secondary rounded-lg flex items-center justify-center text-lg shadow-sm">
                <i class="fa-solid fa-handshake"></i>
            </div>
            <h3 class="text-xl font-bold text-primary font-serif">Core Values</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-light">
                Integrity, adherence to legal employment directives, speed of candidate matching, and total transparency in billing arrangements.
            </p>
        </div>
    </div>
</section>

<!-- Compliance & Verification Section -->
<section class="py-20 bg-[#fcfbf9] border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block mb-2">Standards Code</span>
            <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight mb-6">Strict Adherence to Staffing Compliance</h2>
            <p class="text-slate-600 font-light leading-relaxed mb-6">
                Operational stability depends on compliance. We structure our recruitment pathways to align completely with regulatory standards, licensing requirements, and safety policies.
            </p>
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="h-5 w-5 bg-gold-100 text-secondary rounded-full flex items-center justify-center text-xs"><i class="fa-solid fa-check"></i></span>
                    <span class="text-slate-700 text-sm font-semibold">EPF & ESIC structure alignment options</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="h-5 w-5 bg-gold-100 text-secondary rounded-full flex items-center justify-center text-xs"><i class="fa-solid fa-check"></i></span>
                    <span class="text-slate-700 text-sm font-semibold">Strict candidate verification protocols</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="h-5 w-5 bg-gold-100 text-secondary rounded-full flex items-center justify-center text-xs"><i class="fa-solid fa-check"></i></span>
                    <span class="text-slate-700 text-sm font-semibold">Contract security policies and transparent documentation</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex gap-4 p-6 bg-slateBg rounded-xl border border-slate-200/50">
                <div class="text-xl text-secondary"><i class="fa-solid fa-scale-balanced"></i></div>
                <div>
                    <h4 class="font-bold text-primary mb-1">Bihar Employment Compliance</h4>
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
    </div>
</section>

<!-- Our Team -->
<section class="py-20 bg-slateBg border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Our Team</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Leadership & Recruitment Experts</h2>
            <p class="text-slate-500 font-medium">Experienced professionals dedicated to your scaling outcomes.</p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Member 1 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">
                        <a href="director-profile.php?id=indradeo" class="hover:text-secondary transition duration-200">Indradeo Mehta</a>
                    </h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Director</p>
                    <p class="text-slate-500 text-sm font-light">Directing corporate governance, compliance, and strategic scaling policies.</p>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="bg-white border border-slate-200/50 rounded-xl overflow-hidden shadow-sm hover:shadow transition-all duration-300 text-center">
                <div class="p-6">
                    <h3 class="font-bold text-primary text-lg mb-1 font-serif">
                        <a href="director-profile.php?id=rajiv" class="hover:text-secondary transition duration-200">Rajiv Kumar</a>
                    </h3>
                    <p class="text-secondary text-xs font-bold uppercase tracking-wider mb-3">Director</p>
                    <p class="text-slate-500 text-sm font-light">Overseeing workforce recruitment pipelines and operational integrations.</p>
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
            We provide verified skilled technical workforce and corporate resources built on structural legal agreements.
        </p>
        <div class="pt-2">
            <a href="contact.php" class="px-8 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-xl shadow hover:-translate-y-1 transition-all duration-300 inline-block text-xs uppercase tracking-wider">
                Partner with Us
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
