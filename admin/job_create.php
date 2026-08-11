<?php
$adminTitle = "Add New Job";
$adminActivePage = "jobs";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $jobType = trim($_POST['job_type'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $requirements = trim($_POST['requirements'] ?? '');
    $status = trim($_POST['status'] ?? 'active');

    if (!empty($title) && !empty($category) && !empty($jobType) && !empty($location) && !empty($description)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO `jobs` (`title`, `category`, `job_type`, `location`, `description`, `requirements`, `status`) VALUES (:title, :category, :job_type, :location, :description, :requirements, :status)");
            $stmt->execute([
                ':title' => $title,
                ':category' => $category,
                ':job_type' => $jobType,
                ':location' => $location,
                ':description' => $description,
                ':requirements' => $requirements,
                ':status' => $status
            ]);

            header("Location: /admin/index.php");
            exit;
        } catch (Exception $e) {
            $error = 'Error saving job: ' . $e->getMessage();
        }
    } else {
        $error = 'Please fill in all  fields.';
    }
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Header -->
<div class="flex items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl sm:text-3xl font-extrabold font-serif text-primary tracking-tight">Add New Job Opening</h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-1">Publish a new career opportunity for candidates.</p>
    </div>
    <div>
        <a href="/admin/jobs.php" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
            <i class="fa-solid fa-arrow-left"></i> Back to Jobs
        </a>
    </div>
</div>

<?php if (!empty($error)): ?>
    <div class="p-4 mb-6 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-600 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
        <span><?php echo htmlspecialchars($error); ?></span>
    </div>
<?php endif; ?>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <form method="POST" action="" class="space-y-6 max-w-3xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Job Title -->
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Title *</label>
                <input type="text" name="title"  placeholder="e.g. Talent Acquisition Specialist" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Department / Category *</label>
                <select name="category"  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="hr">HR & Recruitment</option>
                    <option value="operations">Operations & Management</option>
                    <option value="sales">Sales & Business Development</option>
                    <option value="it">IT & Software</option>
                    <option value="finance">Finance & Accounts</option>
                    <option value="admin">Administration</option>
                </select>
            </div>

            <!-- Job Type -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Type *</label>
                <select name="job_type"  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="Full Time">Full Time</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Remote / Hybrid">Remote / Hybrid</option>
                </select>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Location *</label>
                <input type="text" name="location"  placeholder="e.g. Purnia, Bihar (HO)" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
            </div>

            <!-- Status -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Status *</label>
                <select name="status"  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="active">Active (Visible on Website)</option>
                    <option value="inactive">Inactive (Hidden)</option>
                </select>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Description *</label>
            <textarea name="description" rows="4"  placeholder="Provide an overview of responsibilities and role summary..." 
                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition"></textarea>
        </div>

        <!-- Requirements -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Key Requirements (One point per line)</label>
            <textarea name="requirements" rows="4" placeholder="Minimum 2+ years HR experience&#10;Strong communication skills&#10;Degree in HR" 
                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition"></textarea>
        </div>

        <div class="pt-4 flex gap-4">
            <button type="submit" class="px-7 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold text-xs uppercase tracking-wider rounded-xl shadow transition">
                Publish Job Opening
            </button>
            <a href="/admin/jobs.php" class="px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
