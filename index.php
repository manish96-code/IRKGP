<?php
$pageTitle = "Home";
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!-- 1. Hero Section -->
<section class="relative min-h-[75vh] md:h-[calc(100vh-112px)] flex items-center justify-center bg-cover bg-center" style="background-image: url('assets/images/hero-bg.jpg');">
    <!-- Light overlay -->
    <div class="absolute inset-0 bg-white/90"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-slate-800 space-y-6 animate-fade-in-up">
        <h2 class="text-xs font-bold text-secondary uppercase tracking-widest block">IRKGP SERVICES PVT. LTD.</h2>
        
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold tracking-tight leading-tight max-w-4xl mx-auto font-serif text-primary">
            Professional Manpower Recruitment & Management Solutions
        </h1>
        
        <p class="text-base md:text-lg text-slate-600 max-w-2xl mx-auto font-light">
            Bridging the gap between premier organizations and elite talent. Headquartered in Bihar, serving strategic corporate staffing demands nationwide.
        </p>
        
        <div class="flex flex-wrap gap-4 justify-center pt-4">
            <a href="contact.php" class="px-8 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-xl shadow hover:-translate-y-1 transition-all duration-300">
                Contact Us <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
            <a href="services.php" class="px-8 py-3.5 bg-white border border-slate-300 hover:border-secondary hover:text-secondary text-slate-700 font-bold rounded-xl hover:-translate-y-1 transition-all duration-300">
                Explore Services
            </a>
        </div>
    </div>

    <!-- Scroll down indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-slate-400 animate-bounce">
        <a href="#about" aria-label="Scroll Down"><i class="fa-solid fa-chevron-down text-lg"></i></a>
    </div>
</section>

<!-- 2. About Company Preview -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Image Col -->
        <div class="relative">
            <img src="assets/images/about-preview.jpg" alt="About IRKGP team" class="rounded-2xl shadow-md border border-slate-200 object-cover w-full h-[280px] sm:h-[400px]">
        </div>

        <!-- Info Col -->
        <div class="space-y-6">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">About Company</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">
                Your Trusted Strategic Staffing & Manpower Partner
            </h2>
            <p class="text-slate-600 leading-relaxed font-light font-sans">
                Registered in Bihar, **IRKGP Services Pvt. Ltd.** is a leading manpower recruitment & management solution provider. We bridge the gap between aspirations and opportunities, helping companies grow through strategic hiring.
            </p>
            <p class="text-slate-600 leading-relaxed font-light font-sans">
                We combine industry-specific headhunting expertise with a transparent, responsive placement workflow to deliver qualified professionals across technical, administrative, and management sectors.
            </p>
            <div class="pt-2">
                <a href="about.php" class="px-6 py-3.5 bg-primary text-white font-bold rounded-xl shadow hover:bg-secondary hover:text-primary hover:-translate-y-1 transition-all duration-300 inline-block">
                    Read More About Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Services Preview -->
<section class="py-20 bg-slateBg border-y border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Our Focus</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Recruitment & Staffing Services</h2>
            <p class="text-slate-500 font-medium">Providing robust recruitment capabilities to scale operational outcomes across corporate domains.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="bg-white border border-slate-200/60 rounded-xl p-8 text-center hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-md group">
                <div class="h-14 w-14 rounded-2xl bg-slateBg text-secondary flex items-center justify-center text-2xl mx-auto mb-6 group-hover:bg-secondary group-hover:text-primary transition-colors duration-300">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <h3 class="font-bold text-primary text-lg mb-3">Recruitment Services</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-4">Sourcing top professionals for executive roles with detailed screening.</p>
                <a href="services.php" class="text-secondary font-bold text-xs uppercase tracking-wider hover:underline">Learn More &rarr;</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-slate-200/60 rounded-xl p-8 text-center hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-md group">
                <div class="h-14 w-14 rounded-2xl bg-slateBg text-secondary flex items-center justify-center text-2xl mx-auto mb-6 group-hover:bg-secondary group-hover:text-primary transition-colors duration-300">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                <h3 class="font-bold text-primary text-lg mb-3">Staffing Solutions</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-4">Flexible contractual and permanent staffing to keep your systems running.</p>
                <a href="services.php" class="text-secondary font-bold text-xs uppercase tracking-wider hover:underline">Learn More &rarr;</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-slate-200/60 rounded-xl p-8 text-center hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-md group">
                <div class="h-14 w-14 rounded-2xl bg-slateBg text-secondary flex items-center justify-center text-2xl mx-auto mb-6 group-hover:bg-secondary group-hover:text-primary transition-colors duration-300">
                    <i class="fa-solid fa-comments-dollar"></i>
                </div>
                <h3 class="font-bold text-primary text-lg mb-3">HR Consulting</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-4">Advising on compliance, policy formulation, and structuring workforce goals.</p>
                <a href="services.php" class="text-secondary font-bold text-xs uppercase tracking-wider hover:underline">Learn More &rarr;</a>
            </div>

            <!-- Card 4 -->
            <div class="bg-white border border-slate-200/60 rounded-xl p-8 text-center hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-md group">
                <div class="h-14 w-14 rounded-2xl bg-slateBg text-secondary flex items-center justify-center text-2xl mx-auto mb-6 group-hover:bg-secondary group-hover:text-primary transition-colors duration-300">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="font-bold text-primary text-lg mb-3">Workforce Management</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-4">Complete operational scaling, workforce reviews, and performance pipelines.</p>
                <a href="services.php" class="text-secondary font-bold text-xs uppercase tracking-wider hover:underline">Learn More &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- 4. Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Why Choose Us</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Our Professional Commitment</h2>
            <p class="text-slate-500 font-medium">Delivering reliability, compliance, and vetted workforce placements.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-circle-check"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Trusted Company</h4>
                    <p class="text-slate-500 text-sm">Registered in Bihar, offering fully legal and compliant contract workforce solutions.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-user-group"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Experienced Team</h4>
                    <p class="text-slate-500 text-sm">Professional recruiters who understand domain specifics and local manpower resources.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-magnifying-glass"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Quality Recruitment</h4>
                    <p class="text-slate-500 text-sm">Strict candidate validation checks to align profile matches accurately.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-bolt"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Fast Hiring</h4>
                    <p class="text-slate-500 text-sm">Utilizing a dynamic local talent database to fill vacant roles rapidly.</p>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-headset"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Reliable Support</h4>
                    <p class="text-slate-500 text-sm">Providing continuous operational client assistance 24/7 during staffing cycles.</p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="flex gap-4 p-6 bg-slateBg border border-slate-200/50 rounded-xl shadow-sm hover:shadow transition duration-300">
                <div class="text-2xl text-secondary"><i class="fa-solid fa-smile"></i></div>
                <div>
                    <h4 class="font-bold text-primary text-base mb-1">Customer Satisfaction</h4>
                    <p class="text-slate-500 text-sm">Consistently focusing on quality indicators to foster long-term partnerships.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Company Statistics -->
<!-- <section class="py-20 bg-white border-y border-slate-200 text-slate-800">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <div class="text-4xl md:text-5xl font-extrabold text-primary mb-2"><span class="counter-val" data-target="150">0</span>+</div>
            <div class="text-xs md:text-sm text-slate-500 uppercase tracking-widest font-semibold">Happy Clients</div>
        </div>
        <div>
            <div class="text-4xl md:text-5xl font-extrabold text-primary mb-2"><span class="counter-val" data-target="1200">0</span>+</div>
            <div class="text-xs md:text-sm text-slate-500 uppercase tracking-widest font-semibold">Candidates Placed</div>
        </div>
        <div>
            <div class="text-4xl md:text-5xl font-extrabold text-primary mb-2"><span class="counter-val" data-target="25">0</span>+</div>
            <div class="text-xs md:text-sm text-slate-500 uppercase tracking-widest font-semibold">Industries Served</div>
        </div>
        <div>
            <div class="text-4xl md:text-5xl font-extrabold text-primary mb-2"><span class="counter-val" data-target="8">0</span>+</div>
            <div class="text-xs md:text-sm text-slate-500 uppercase tracking-widest font-semibold">Years Experience</div>
        </div>
    </div>
</section> -->

<!-- 6. Call To Action -->
<section class="py-24 bg-slate-100 border-b border-slate-200 text-center relative overflow-hidden">
    <div class="relative z-10 max-w-4xl mx-auto px-6 space-y-6">
        <h2 class="text-3xl md:text-5xl font-extrabold font-serif tracking-tight leading-tight text-primary">
            Looking for Professional Recruitment Solutions?
        </h2>
        <p class="text-slate-500 max-w-xl mx-auto text-base font-light">
            Connect with our recruitment coordinators today. We offer flexible corporate consulting and manpower scaling quotes customized for you.
        </p>
        <div class="pt-4">
            <a href="contact.php" class="px-8 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-xl shadow hover:-translate-y-1 transition-all duration-300 inline-block uppercase tracking-wider text-xs">
                Contact Us Now
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
