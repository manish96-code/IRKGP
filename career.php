<?php
$pageTitle = "Careers - Join Our Team";
require_once __DIR__ . '/config/db.php';
include 'includes/head.php';
include 'includes/navbar.php';

// Fetch active jobs and unique categories from database
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM `jobs` WHERE `status` = 'active' ORDER BY `created_at` DESC");
    $dbJobs = $stmt->fetchAll();

    $stmtCats = $pdo->query("SELECT DISTINCT `category` FROM `jobs` WHERE `status` = 'active'");
    $dbCategories = $stmtCats->fetchAll(PDO::FETCH_COLUMN);

    $stmtTypes = $pdo->query("SELECT DISTINCT `job_type` FROM `jobs` WHERE `status` = 'active'");
    $dbJobTypes = $stmtTypes->fetchAll(PDO::FETCH_COLUMN);
} catch (Exception $e) {
    $dbJobs = [];
    $dbCategories = [];
    $dbJobTypes = [];
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
                    <?php 
                    $standardCats = ['Parichari (Attendant)', 'Data Entry Operator', 'Clerk', 'Lipik'];
                    $allCats = array_unique(array_merge($standardCats, $dbCategories ?? []));
                    foreach ($allCats as $catName):
                        if (empty(trim($catName))) continue;
                    ?>
                        <option value="<?php echo htmlspecialchars($catName); ?>"><?php echo htmlspecialchars($catName); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Job Type Filter -->
            <div>
                <select id="jobtype-filter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-700 font-medium">
                    <option value="all">All Job Types</option>
                    <?php 
                    $standardTypes = ['Full Time', 'Contractual', 'Remote', 'Hybrid'];
                    $allTypes = array_unique(array_merge($standardTypes, $dbJobTypes ?? []));
                    foreach ($allTypes as $typeName):
                        if (empty(trim($typeName))) continue;
                    ?>
                        <option value="<?php echo htmlspecialchars($typeName); ?>"><?php echo htmlspecialchars($typeName); ?></option>
                    <?php endforeach; ?>
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
                                    <a href="/job_detail.php?id=<?php echo $job['id']; ?>" 
                                       class="px-4 py-2 bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 font-bold text-xs rounded-xl transition-all duration-200 flex items-center gap-1.5">
                                        <span>More Details</span>
                                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                    </a>
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
</script>

<?php include 'includes/footer.php'; ?>
