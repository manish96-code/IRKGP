<?php
$adminTitle = "Job Openings Manager";
$adminActivePage = "jobs";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$msg = '';
$error = '';

// Handle Status Toggle Action
if (isset($_GET['action']) && $_GET['action'] === 'toggle' && isset($_GET['id'])) {
    $jobId = intval($_GET['id']);
    try {
        $stmt = $pdo->prepare("SELECT `status` FROM `jobs` WHERE `id` = :id LIMIT 1");
        $stmt->execute([':id' => $jobId]);
        $currentStatus = $stmt->fetchColumn();

        if ($currentStatus !== false) {
            $newStatus = ($currentStatus === 'active') ? 'inactive' : 'active';
            $updateStmt = $pdo->prepare("UPDATE `jobs` SET `status` = :status WHERE `id` = :id");
            $updateStmt->execute([':status' => $newStatus, ':id' => $jobId]);
            $msg = "Job status changed to '{$newStatus}' successfully!";
        }
    } catch (Exception $e) {
        $error = "Error updating job: " . $e->getMessage();
    }
}

// Handle Delete Action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $jobId = intval($_GET['id']);
    try {
        $delStmt = $pdo->prepare("DELETE FROM `jobs` WHERE `id` = :id LIMIT 1");
        $delStmt->execute([':id' => $jobId]);
        $msg = "Job opening deleted successfully!";
    } catch (Exception $e) {
        $error = "Error deleting job: " . $e->getMessage();
    }
}

// Fetch all jobs
$totalJobs = 0;
$activeJobs = 0;
$inactiveJobs = 0;
$jobs = [];

try {
    $totalJobs = $pdo->query("SELECT COUNT(*) FROM `jobs`")->fetchColumn();
    $activeJobs = $pdo->query("SELECT COUNT(*) FROM `jobs` WHERE `status` = 'active'")->fetchColumn();
    $inactiveJobs = $pdo->query("SELECT COUNT(*) FROM `jobs` WHERE `status` = 'inactive'")->fetchColumn();
    $jobs = $pdo->query("SELECT * FROM `jobs` ORDER BY `created_at` DESC")->fetchAll();
} catch (Exception $e) {
    $jobs = [];
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Welcome Banner Card -->
<div class="relative bg-gradient-to-r from-primary via-slate-900 to-slate-950 text-white rounded-3xl p-6 sm:p-8 mb-8 shadow-xl overflow-hidden border border-slate-800">
    <div class="absolute -top-20 -right-20 w-80 h-80 bg-secondary/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="space-y-2">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary/10 border border-secondary/30 text-secondary text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-briefcase text-[10px]"></i> Job Management System
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold font-serif tracking-tight text-white">
                Admin Job Portal
            </h2>
            <p class="text-slate-300 text-xs sm:text-sm max-w-xl font-light">
                Post new career opportunities here. All active job openings will automatically display live on the public <a href="/career.php" target="_blank" class="text-secondary font-bold hover:underline">Career Page</a>.
            </p>
        </div>

        <div>
            <a href="/admin/job_create.php" class="px-6 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:shadow-secondary/20 transition-all duration-300 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-sm"></i>
                <span>Add New Job Opening</span>
            </a>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Posted Jobs</p>
            <p class="text-3xl font-extrabold font-serif text-primary mt-1"><?php echo $totalJobs; ?></p>
        </div>
        <div class="h-12 w-12 rounded-2xl bg-amber-50 text-secondary flex items-center justify-center text-xl shrink-0 border border-secondary/20">
            <i class="fa-solid fa-briefcase"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Active (Live on Website)</p>
            <p class="text-3xl font-extrabold font-serif text-emerald-600 mt-1"><?php echo $activeJobs; ?></p>
        </div>
        <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl shrink-0 border border-emerald-200">
            <i class="fa-solid fa-circle-check"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Inactive / Draft</p>
            <p class="text-3xl font-extrabold font-serif text-slate-500 mt-1"><?php echo $inactiveJobs; ?></p>
        </div>
        <div class="h-12 w-12 rounded-2xl bg-slate-100 text-slate-500 flex items-center justify-center text-xl shrink-0 border border-slate-200">
            <i class="fa-solid fa-eye-slash"></i>
        </div>
    </div>
</div>

<?php if (!empty($msg)): ?>
    <div class="p-4 mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-sm"></i>
        <span><?php echo htmlspecialchars($msg); ?></span>
    </div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="p-4 mb-6 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-600 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
        <span><?php echo htmlspecialchars($error); ?></span>
    </div>
<?php endif; ?>

<!-- Jobs Table -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h3 class="font-serif font-bold text-primary text-lg">Job Openings List</h3>
        <a href="/career.php" target="_blank" class="text-xs font-bold text-secondary hover:underline flex items-center gap-1">
            View Live Career Page <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase font-bold tracking-wider">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Job Type</th>
                    <th class="p-4">Location</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Created Date</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!empty($jobs)): ?>
                    <?php foreach ($jobs as $job): ?>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 font-mono font-bold text-slate-400">#<?php echo $job['id']; ?></td>
                            <td class="p-4 font-bold text-primary text-sm"><?php echo htmlspecialchars($job['title']); ?></td>
                            <td class="p-4 capitalize"><?php echo htmlspecialchars($job['category']); ?></td>
                            <td class="p-4"><span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md font-bold text-[11px]"><?php echo htmlspecialchars($job['job_type']); ?></span></td>
                            <td class="p-4"><?php echo htmlspecialchars($job['location']); ?></td>
                            <td class="p-4">
                                <?php if ($job['status'] === 'active'): ?>
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200/60 rounded-md font-bold text-[11px]">Active (Live)</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 bg-slate-100 text-slate-500 rounded-md font-bold text-[11px]">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-slate-400"><?php echo date('d M Y', strtotime($job['created_at'])); ?></td>
                            <td class="p-4 text-right space-x-2">
                                <a href="/admin/index.php?action=toggle&id=<?php echo $job['id']; ?>" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-lg transition inline-block">
                                    <?php echo $job['status'] === 'active' ? 'Deactivate' : 'Activate'; ?>
                                </a>
                                <a href="/admin/job_edit.php?id=<?php echo $job['id']; ?>" class="px-3 py-1.5 bg-secondary/10 hover:bg-secondary hover:text-primary text-secondary font-bold rounded-lg transition inline-block">Edit</a>
                                <a href="/admin/index.php?action=delete&id=<?php echo $job['id']; ?>" onclick="return confirm('Are you sure you want to delete this job opening?');" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-600 font-bold rounded-lg transition inline-block">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="p-12 text-center text-slate-400">
                            <div class="h-12 w-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3 text-xl">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">No job openings created yet</p>
                            <p class="text-xs text-slate-400 mt-1">Click "Add New Job Opening" above to publish your first job.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
