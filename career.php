<?php
$pageTitle = "Careers - Join Our Team";
require_once __DIR__ . '/config/db.php';
include 'includes/head.php';
include 'includes/navbar.php';

// Fetch active jobs from database
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM `jobs` WHERE `status` = 'active' ORDER BY `created_at` DESC");
    $dbJobs = $stmt->fetchAll();
} catch (Exception $e) {
    $dbJobs = [];
}
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

        <!-- Filters & Search Bar -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm mb-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Search Input -->
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                <input type="text" id="job-search" placeholder="Search job title..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 font-medium">
            </div>

            <!-- Category Filter -->
            <div>
                <select id="category-filter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-700 font-medium">
                    <option value="all">All Categories</option>
                    <option value="hr">HR & Recruitment</option>
                    <option value="operations">Operations & Management</option>
                    <option value="sales">Sales & Business Development</option>
                    <option value="it">IT & Software</option>
                    <option value="finance">Finance & Accounts</option>
                    <option value="admin">Administration</option>
                </select>
            </div>

            <!-- Job Type Filter -->
            <div>
                <select id="jobtype-filter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-700 font-medium">
                    <option value="all">All Job Types</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Remote / Hybrid">Remote / Hybrid</option>
                </select>
            </div>

            <!-- Location Filter -->
            <div>
                <select id="location-filter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-700 font-medium">
                    <option value="all">All Locations</option>
                    <option value="Purnia">Purnia, Bihar (HO)</option>
                    <option value="Patna">Patna, Bihar</option>
                    <option value="Delhi NCR">Delhi NCR</option>
                    <option value="Remote">Remote</option>
                </select>
            </div>
        </div>

        <!-- Full Width Job Cards Grid -->
        <div id="jobs-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($dbJobs)): ?>
                        <?php foreach ($dbJobs as $job): ?>
                            <?php 
                            $reqArray = array_values(array_filter(array_map('trim', explode("\n", $job['requirements']))));
                            $reqJson = htmlspecialchars(json_encode($reqArray), ENT_QUOTES, 'UTF-8');
                            ?>
                            <div class="job-card bg-white border border-slate-200 hover:border-secondary rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group"
                                 data-category="<?php echo htmlspecialchars($job['category']); ?>" 
                                 data-jobtype="<?php echo htmlspecialchars($job['job_type']); ?>" 
                                 data-location="<?php echo htmlspecialchars($job['location']); ?>">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between gap-2">
                                        <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 text-[11px] font-bold uppercase tracking-wider border border-amber-200/60"><?php echo htmlspecialchars($job['job_type']); ?></span>
                                        <span class="text-xs text-slate-400 capitalize"><i class="fa-solid fa-location-dot mr-1"></i><?php echo htmlspecialchars($job['location']); ?></span>
                                    </div>
                                    <h3 class="font-serif font-bold text-primary text-lg group-hover:text-secondary transition capitalize"><?php echo htmlspecialchars($job['title']); ?></h3>
                                    <p class="text-slate-500 text-xs leading-relaxed line-clamp-2 capitalize"><?php echo htmlspecialchars($job['description']); ?></p>
                                </div>
                                <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 font-medium capitalize"><?php echo htmlspecialchars($job['category']); ?></span>
                                    <button onclick="openJobModal('<?php echo htmlspecialchars(addslashes($job['title'])); ?>', '<?php echo htmlspecialchars(addslashes($job['job_type'])); ?>', '<?php echo htmlspecialchars(addslashes($job['location'])); ?>', '<?php echo htmlspecialchars(addslashes($job['category'])); ?>', '<?php echo htmlspecialchars(addslashes($job['description'])); ?>', <?php echo $reqJson; ?>)" 
                                            class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200">
                                        More Details
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
    const categorySelect = document.getElementById('category-filter');
    const jobtypeSelect = document.getElementById('jobtype-filter');
    const locationSelect = document.getElementById('location-filter');
    const jobcards = document.querySelectorAll('.job-card');
    const noResults = document.getElementById('no-results');

    function filterJobs() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedCat = categorySelect.value.toLowerCase();
        const selectedType = jobtypeSelect.value.toLowerCase();
        const selectedLoc = locationSelect.value.toLowerCase();

        let visibleCount = 0;

        jobcards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const desc = card.querySelector('p').textContent.toLowerCase();
            const cat = (card.getAttribute('data-category') || '').toLowerCase();
            const type = (card.getAttribute('data-jobtype') || '').toLowerCase();
            const loc = (card.getAttribute('data-location') || '').toLowerCase();

            const matchesQuery = query === '' || title.includes(query) || desc.includes(query) || loc.includes(query);
            const matchesCat = selectedCat === 'all' || cat === selectedCat;
            const matchesType = selectedType === 'all' || type === selectedType;
            const matchesLoc = selectedLoc === 'all' || loc.includes(selectedLoc);

            if (matchesQuery && matchesCat && matchesType && matchesLoc) {
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
    categorySelect.addEventListener('change', filterJobs);
    jobtypeSelect.addEventListener('change', filterJobs);
    locationSelect.addEventListener('change', filterJobs);
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
