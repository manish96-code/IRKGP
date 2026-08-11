<?php
$adminTitle = "Edit Job Opening";
$adminActivePage = "jobs";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$jobId = intval($_GET['id'] ?? 0);
if ($jobId <= 0) {
    header("Location: /admin/jobs.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM `jobs` WHERE `id` = :id LIMIT 1");
$stmt->execute([':id' => $jobId]);
$job = $stmt->fetch();

if (!$job) {
    header("Location: /admin/jobs.php");
    exit;
}

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
            $updateStmt = $pdo->prepare("UPDATE `jobs` SET `title` = :title, `category` = :category, `job_type` = :job_type, `location` = :location, `description` = :description, `requirements` = :requirements, `status` = :status WHERE `id` = :id LIMIT 1");
            $updateStmt->execute([
                ':title' => $title,
                ':category' => $category,
                ':job_type' => $jobType,
                ':location' => $location,
                ':description' => $description,
                ':requirements' => $requirements,
                ':status' => $status,
                ':id' => $jobId
            ]);

            header("Location: /admin/index.php");
            exit;
        } catch (Exception $e) {
            $error = 'Error updating job: ' . $e->getMessage();
        }
    } else {
        $error = 'Please fill in all required fields.';
    }
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Header -->
<div class="flex items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl sm:text-3xl font-extrabold font-serif text-primary tracking-tight">Edit Job Opening #<?php echo $job['id']; ?></h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-1">Update role details and publication status.</p>
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
                <input type="text" name="title" required value="<?php echo htmlspecialchars($job['title']); ?>" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Department / Category *</label>
                <select name="category" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="hr" <?php echo $job['category'] === 'hr' ? 'selected' : ''; ?>>HR & Recruitment</option>
                    <option value="operations" <?php echo $job['category'] === 'operations' ? 'selected' : ''; ?>>Operations & Management</option>
                    <option value="sales" <?php echo $job['category'] === 'sales' ? 'selected' : ''; ?>>Sales & Business Development</option>
                    <option value="it" <?php echo $job['category'] === 'it' ? 'selected' : ''; ?>>IT & Software</option>
                    <option value="finance" <?php echo $job['category'] === 'finance' ? 'selected' : ''; ?>>Finance & Accounts</option>
                    <option value="admin" <?php echo $job['category'] === 'admin' ? 'selected' : ''; ?>>Administration</option>
                </select>
            </div>

            <!-- Job Type -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Type *</label>
                <select name="job_type" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="Full Time" <?php echo $job['job_type'] === 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                    <option value="Contractual" <?php echo $job['job_type'] === 'Contractual' ? 'selected' : ''; ?>>Contractual</option>
                    <option value="Remote / Hybrid" <?php echo $job['job_type'] === 'Remote / Hybrid' ? 'selected' : ''; ?>>Remote / Hybrid</option>
                </select>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Location *</label>
                <input type="text" name="location" required value="<?php echo htmlspecialchars($job['location']); ?>" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
            </div>

            <!-- Status -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="active" <?php echo $job['status'] === 'active' ? 'selected' : ''; ?>>Active (Visible on Website)</option>
                    <option value="inactive" <?php echo $job['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive (Hidden)</option>
                </select>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Description *</label>
            <textarea name="description" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition"><?php echo htmlspecialchars($job['description']); ?></textarea>
        </div>

        <!-- Requirements -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Key Requirements (One point per line)</label>
            <textarea name="requirements" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition"><?php echo htmlspecialchars($job['requirements']); ?></textarea>
        </div>

        <div class="pt-4 flex gap-4">
            <button type="submit" class="px-7 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold text-xs uppercase tracking-wider rounded-xl shadow transition">
                Update Job Opening
            </button>
            <a href="/admin/jobs.php" class="px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
