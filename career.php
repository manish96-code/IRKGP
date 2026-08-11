<?php
$pageTitle = "Careers - Join Our Team";
include 'includes/head.php';
include 'includes/navbar.php';
?>

<!-- Hero Banner Section -->
<section class="relative py-16 lg:py-20 bg-slate-50 border-b border-slate-200/80 overflow-hidden">
    <!-- Subtle Pattern -->
    <div class="absolute inset-0 bg-gradient-to-r from-amber-50/50 via-white to-slate-50 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        <!-- Left Content -->
        <div class="lg:col-span-6 space-y-6">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-100/70 border border-secondary/40 text-amber-900 text-xs font-extrabold uppercase tracking-wider shadow-sm">
                <i class="fa-solid fa-briefcase text-secondary"></i> We Are Hiring
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-serif tracking-tight text-slate-900 leading-tight">
                Join Our Team & <br class="hidden sm:inline">
                <span class="text-secondary">Shape the Future</span>
            </h1>
            <p class="text-slate-700 text-base md:text-lg font-normal leading-relaxed">
                Start your journey today and become a part of a dynamic, forward-thinking recruitment & manpower solutions company that values your skills, growth, and ambitions.
            </p>
            <div class="pt-2 flex flex-wrap gap-4">
                <a href="#opportunities" class="px-7 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span>Explore Openings</span>
                    <i class="fa-solid fa-arrow-down text-xs"></i>
                </a>
            </div>
        </div>

        <!-- Right Media Frame -->
        <div class="lg:col-span-6 relative">
            <div class="relative mx-auto max-w-lg lg:max-w-none p-3 bg-white rounded-3xl shadow-xl border border-slate-200 group">
                <img src="/assets/images/career-hero.png" alt="IRKGP Team High Five" class="w-full h-[320px] sm:h-[380px] object-cover rounded-2xl group-hover:scale-[1.02] transition-transform duration-500">
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl bg-white/95 backdrop-blur-md border border-slate-200/80 shadow-lg text-primary flex items-center justify-between">
                    <div>
                        <p class="font-bold text-sm font-serif text-primary">Empowering Talent Across Bihar & India</p>
                        <p class="text-xs text-slate-500">Fast-paced, supportive & growth-oriented work culture.</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-secondary text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opportunities Section -->
<section id="opportunities" class="py-20 bg-slateBg relative">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Current Openings</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-primary font-serif tracking-tight">Explore Career Opportunities</h2>
            <p class="text-slate-500 font-medium text-sm sm:text-base">Find the role that fits your expertise and join IRKGP Services Pvt. Ltd. in driving corporate excellence.</p>
        </div>

        <!-- Search Bar -->
        <div class="bg-white p-3 sm:p-4 rounded-2xl border border-slate-200/80 shadow-sm mb-12 max-w-2xl mx-auto">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5 text-slate-400 text-base"></i>
                <input type="text" id="job-search" placeholder="Search by job title, department, or location..." class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 font-medium">
            </div>
        </div>

        <!-- Layout: Side Graphic + Job Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Side Graphic Column -->
            <div class="lg:col-span-3 hidden lg:block sticky top-28 space-y-6">
                <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-sm text-center relative overflow-hidden group">
                    <img src="/assets/images/career-side-graphic.png" alt="Professional Representative" class="w-full h-auto object-cover rounded-xl mb-4 group-hover:scale-105 transition duration-500">
                    <h4 class="font-serif font-bold text-primary text-base">Ready to Excel?</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">We match talent with purpose. Grow your career with structured corporate policies.</p>
                </div>
                <div class="bg-primary text-white rounded-2xl p-5 shadow-sm space-y-3 border border-slate-800">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-briefcase text-2xl text-secondary"></i>
                        <div>
                            <p class="text-2xl font-extrabold font-serif text-secondary">50+</p>
                            <p class="text-xs text-slate-300 font-medium">Active Openings</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Job Cards Grid -->
            <div class="lg:col-span-9">
                <div id="jobs-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Job Card 1 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="hr" data-jobtype="Full Time" data-location="Purnia">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Purnia</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Talent Acquisition Specialist</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Sourcing, interviewing, and placing skilled technical candidates for key enterprise contracts.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">HR & Recruitment</span>
                            <button onclick="openJobModal('Talent Acquisition Specialist', 'Full Time', 'Purnia, Bihar (HO)', 'HR & Recruitment', 'We are looking for an experienced Talent Acquisition Specialist to drive our manpower recruitment pipeline. You will be responsible for candidate sourcing, preliminary screening, client alignment, and managing talent acquisition databases across Bihar & Pan India.', ['Minimum 2+ years experience in HR recruitment', 'Strong communication & screening skills', 'Degree in HR, Business Administration or related field'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 2 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="hr" data-jobtype="Full Time" data-location="Patna">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Patna</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Senior HR Recruiter</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Leading end-to-end recruitment drives, headcount allocations, and onboarding compliance.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">HR & Recruitment</span>
                            <button onclick="openJobModal('Senior HR Recruiter', 'Full Time', 'Patna, Bihar', 'HR & Recruitment', 'Lead high-volume recruitment projects for corporate staffing demands. Oversee interviewer scheduling, background check validation, and offer issuance.', ['3+ years in corporate recruitment or consultancy', 'Proven record in volume hiring', 'Bachelor degree in relevant stream'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 3 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="sales" data-jobtype="Full Time" data-location="Delhi NCR">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Delhi NCR</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Business Development Manager</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Acquiring new enterprise clients and establishing manpower supply contracts with industries.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Sales & Marketing</span>
                            <button onclick="openJobModal('Business Development Manager', 'Full Time', 'Delhi NCR', 'Sales & Business Development', 'Drive B2B sales and manpower contract acquisitions with industrial clients. Negotiate service-level agreements and manage corporate relationships.', ['4+ years B2B corporate sales experience', 'Extensive network in manufacturing/corporate sector', 'Strong pitch & negotiation skills'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 4 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="operations" data-jobtype="Full Time" data-location="Purnia">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Purnia</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Manpower Operations Lead</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Coordinating shift schedules, site worker deployments, and physical site compliance.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Operations</span>
                            <button onclick="openJobModal('Manpower Operations Lead', 'Full Time', 'Purnia, Bihar (HO)', 'Operations & Management', 'Supervise industrial site deployments, attendance tracking, shift allocation, and ground staff safety compliance.', ['2+ years field operational supervision', 'Leadership & dispute resolution skills', 'Willingness to conduct site visits'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 5 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="it" data-jobtype="Remote / Hybrid" data-location="Remote">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-[11px] font-bold uppercase tracking-wider border border-slate-200">Remote / Hybrid</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-laptop-code mr-1"></i>Remote</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Full-Stack Web Developer</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Maintaining internal portal software, candidate management tools, and website features.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">IT & Software</span>
                            <button onclick="openJobModal('Full-Stack Web Developer', 'Remote / Hybrid', 'Remote / Hybrid', 'IT & Software', 'Develop and optimize internal portals, CRM systems, and candidate tracking web tools using PHP, JavaScript, Tailwind CSS, and MySQL.', ['Solid proficiency in PHP, JavaScript & MySQL', 'Experience with responsive web UI & REST APIs', 'Good problem-solving mindset'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 6 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="finance" data-jobtype="Full Time" data-location="Purnia">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Purnia</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Accounts & Payroll Executive</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Managing monthly payroll disbursements, tax withholdings, and client invoicing records.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Finance & Accounts</span>
                            <button onclick="openJobModal('Accounts & Payroll Executive', 'Full Time', 'Purnia, Bihar (HO)', 'Finance & Accounts', 'Handle corporate accounting, Tally Prime entries, GST filing data preparation, and staff payroll computation.', ['B.Com / M.Com or Tally certification', 'Knowledge of GST, PF & ESIC regulations', 'Proficiency in MS Excel'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 7 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="operations" data-jobtype="Contractual" data-location="Patna">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-[11px] font-bold uppercase tracking-wider border border-slate-200">Contractual</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Patna</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Industrial Site Supervisor</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Overseeing daily factory worker attendance, safety gear checks, and shift handovers.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Operations</span>
                            <button onclick="openJobModal('Industrial Site Supervisor', 'Contractual', 'Patna / Industrial Units', 'Operations & Management', 'Oversee physical worker presence at client industrial sites, enforce safety protocols, and submit daily deployment reports.', ['1+ year experience in industrial/factory site supervision', 'Strong leadership skills', 'Immediate joiner preferred'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 8 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="sales" data-jobtype="Full Time" data-location="Patna">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Patna</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Digital Marketing Associate</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Managing social media channels, recruitment campaigns, and corporate brand awareness.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Sales & Marketing</span>
                            <button onclick="openJobModal('Digital Marketing Associate', 'Full Time', 'Patna, Bihar', 'Sales & Marketing', 'Design social media posters, execute job campaign ads, manage LinkedIn/Instagram company pages, and boost candidate reach.', ['1-2 years digital marketing experience', 'Basic graphic design (Canva/Photoshop)', 'Ad campaign management skills'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 9 -->
                    <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                         data-category="hr" data-jobtype="Full Time" data-location="Purnia">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60">Full Time</span>
                                <span class="text-xs text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Purnia</span>
                            </div>
                            <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition">Executive Admin Assistant</h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">Handling office documentation, visitor logs, mail dispatch, and director schedule coordination.</p>
                        </div>
                        <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-medium">Administration</span>
                            <button onclick="openJobModal('Executive Admin Assistant', 'Full Time', 'Purnia, Bihar (HO)', 'Administration', 'Manage office front desk operations, coordinate internal documentation, maintain office supplies, and support directorate secretarial tasks.', ['Graduate in any discipline', 'Proficiency in MS Office & typing', 'Polite phone & email etiquette'])" 
                                    class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                More Details
                            </button>
                        </div>
                    </div>

                </div>

                <!-- No Results State -->
                <div id="no-results" class="hidden text-center py-16 bg-white rounded-2xl border border-slate-200">
                    <div class="h-14 w-14 rounded-full bg-amber-50 text-secondary flex items-center justify-center mx-auto text-2xl mb-4 border border-secondary/20">
                        <i class="fa-solid fa-folder-open"></i>
                    </div>
                    <h3 class="font-serif font-bold text-primary text-lg">No matching opportunities found</h3>
                    <p class="text-slate-500 text-xs mt-1">Try resetting your search query or filters.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Beware of Recruitment Scams Notice Box (IRKGP Accent Alert Theme) -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-6xl mx-auto px-6">
        <div class="bg-amber-50/40 border border-secondary/30 rounded-3xl p-6 sm:p-10 shadow-sm relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-secondary/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="flex items-start gap-4 mb-6">
                <div class="h-12 w-12 rounded-2xl bg-secondary text-primary flex items-center justify-center text-xl shrink-0 shadow-sm font-bold">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-extrabold font-serif text-primary tracking-tight">Beware of Recruitment Scams</h3>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1 leading-relaxed">
                        It has come to our attention that certain unauthorized individuals or fake agencies may impersonate IRKGP representatives, offering fraudulent job opportunities, collecting personal information, or demanding money.
                    </p>
                </div>
            </div>

            <div class="space-y-3 text-xs sm:text-sm text-slate-700 pl-2 sm:pl-16">
                <p class="font-bold text-slate-800 text-xs uppercase tracking-wider">Please be aware of the following official policies:</p>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-circle-check text-secondary text-base mt-0.5 shrink-0"></i>
                        <span><strong>Zero Fee Policy:</strong> We never charge any fees, processing charges, or security deposits at any stage of our recruitment process.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-circle-check text-secondary text-base mt-0.5 shrink-0"></i>
                        <span><strong>Official Channels Only:</strong> All job openings and offer communications are shared exclusively via our official website (<a href="/" class="text-secondary font-bold hover:underline">irkgpservices.com</a>) and verified company emails (<span class="font-mono text-slate-800">@irkgpservices.com</span>).</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-circle-check text-secondary text-base mt-0.5 shrink-0"></i>
                        <span><strong>No Unauthorized Payments:</strong> Do not share bank account details or make payments to any individual claiming to represent IRKGP.</span>
                    </li>
                </ul>

                <div class="pt-4 border-t border-secondary/20 mt-4 text-xs text-slate-600">
                    If you receive any suspicious job offer or communication, please verify its authenticity immediately by writing to <a href="mailto:info@irkgpservices.com" class="text-secondary font-bold hover:underline">info@irkgpservices.com</a>.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Job Details Modal -->
<div id="job-modal" class="fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 relative max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button onclick="closeJobModal()" class="absolute top-5 right-5 h-9 w-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition focus:outline-none">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- Modal Header -->
        <div class="space-y-3 pb-6 border-b border-slate-100">
            <div class="flex flex-wrap items-center gap-2">
                <span id="modal-type" class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-xs font-bold uppercase tracking-wider border border-amber-200/60"></span>
                <span id="modal-category" class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-semibold"></span>
            </div>
            <h2 id="modal-title" class="text-2xl font-serif font-bold text-primary"></h2>
            <p id="modal-location" class="text-xs text-slate-500"><i class="fa-solid fa-location-dot mr-1"></i><span></span></p>
        </div>

        <!-- Modal Body -->
        <div class="py-6 space-y-5 text-sm text-slate-600 leading-relaxed">
            <div>
                <h4 class="font-bold text-primary font-serif mb-2">Job Description</h4>
                <p id="modal-description" class="font-light"></p>
            </div>

            <div>
                <h4 class="font-bold text-primary font-serif mb-2">Key Requirements</h4>
                <ul id="modal-requirements" class="space-y-2 text-xs font-medium"></ul>
            </div>
        </div>

        <!-- Modal Footer CTA -->
        <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-slate-500">Send your resume to <span class="font-mono font-bold text-slate-800">irkgpservicespvtltd@gmail.com</span></p>
            <a id="modal-apply-btn" href="https://wa.me/917384779569?text=Hello%20IRKGP%20Services%2C%20I%20want%20to%20apply%20for%20a%20career%20opening." target="_blank" class="w-full sm:w-auto px-6 py-3 bg-secondary hover:bg-amber-500 text-primary font-bold text-xs uppercase tracking-wider rounded-xl shadow transition text-center">
                Apply via WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- Dynamic Search & Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('job-search');
    const jobcards = document.querySelectorAll('.job-card');
    const noResults = document.getElementById('no-results');

    function filterJobs() {
        const query = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        jobcards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const desc = card.querySelector('p').textContent.toLowerCase();
            const loc = card.getAttribute('data-location').toLowerCase();
            const type = card.getAttribute('data-jobtype').toLowerCase();

            const matchesQuery = query === '' || title.includes(query) || desc.includes(query) || loc.includes(query) || type.includes(query);

            if (matchesQuery) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
    }

    searchInput.addEventListener('input', filterJobs);
});

function openJobModal(title, type, location, category, description, requirements) {
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-type').textContent = type;
    document.getElementById('modal-category').textContent = category;
    document.getElementById('modal-location').querySelector('span').textContent = location;
    document.getElementById('modal-description').textContent = description;

    const reqList = document.getElementById('modal-requirements');
    reqList.innerHTML = '';
    requirements.forEach(req => {
        const li = document.createElement('li');
        li.className = 'flex items-start gap-2';
        li.innerHTML = `<i class="fa-solid fa-check text-secondary mt-0.5 shrink-0"></i> <span>${req}</span>`;
        reqList.appendChild(li);
    });

    const applyBtn = document.getElementById('modal-apply-btn');
    const msg = encodeURIComponent(`Hello IRKGP Services, I am interested in applying for the position of "${title}" (${type}, ${location}). Please guide me with the application process.`);
    applyBtn.href = `https://wa.me/917384779569?text=${msg}`;

    const modal = document.getElementById('job-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeJobModal() {
    const modal = document.getElementById('job-modal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

document.getElementById('job-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeJobModal();
    }
});
</script>

<?php include 'includes/footer.php'; ?>
