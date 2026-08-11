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
            $msg = "Job opening status updated to '{$newStatus}' successfully!";
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

// Fetch all jobs and counts
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

<!-- Page Header & Action CTA -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/60">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Job Openings Overview</h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Manage recruitment postings, publication status, and public career listings.</p>
    </div>

    <div>
        <a href="/admin/job_create.php" class="px-4 py-2.5 bg-slate-900 hover:bg-amber-500 hover:text-slate-950 text-white font-bold text-xs rounded-xl shadow-sm transition-all duration-200 flex items-center gap-2">
            <i class="fa-solid fa-plus text-xs text-amber-400"></i>
            <span>Post New Job Opening</span>
        </a>
    </div>
</div>

<!-- Key Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Total Openings</span>
            <span class="text-3xl font-extrabold text-slate-900 block mt-1"><?php echo $totalJobs; ?></span>
        </div>
        <div class="h-11 w-11 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-lg shrink-0 border border-amber-500/20">
            <i class="fa-solid fa-briefcase"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Live on Website</span>
            <span class="text-3xl font-extrabold text-emerald-600 block mt-1"><?php echo $activeJobs; ?></span>
        </div>
        <div class="h-11 w-11 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-lg shrink-0 border border-emerald-500/20">
            <i class="fa-solid fa-globe"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Inactive / Drafts</span>
            <span class="text-3xl font-extrabold text-slate-500 block mt-1"><?php echo $inactiveJobs; ?></span>
        </div>
        <div class="h-11 w-11 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center text-lg shrink-0 border border-slate-200">
            <i class="fa-solid fa-eye-slash"></i>
        </div>
    </div>
</div>

<?php if (!empty($msg)): ?>
    <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-sm"></i>
        <span><?php echo htmlspecialchars($msg); ?></span>
    </div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-600 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
        <span><?php echo htmlspecialchars($error); ?></span>
    </div>
<?php endif; ?>

<!-- Executive Data Table -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="font-bold text-slate-900 text-sm">All Job Postings</h3>
        <span class="text-xs text-slate-400 font-medium">Showing <?php echo count($jobs); ?> entries</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-50/80 border-b border-slate-200/60 text-slate-400 uppercase font-bold tracking-wider">
                <tr>
                    <th class="py-3.5 px-4">Job ID</th>
                    <th class="py-3.5 px-4">Title</th>
                    <th class="py-3.5 px-4">Category</th>
                    <th class="py-3.5 px-4">Job Type</th>
                    <th class="py-3.5 px-4">Location</th>
                    <th class="py-3.5 px-4">Status</th>
                    <th class="py-3.5 px-4">Posted Date</th>
                    <th class="py-3.5 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!empty($jobs)): ?>
                    <?php foreach ($jobs as $job): ?>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-4 font-mono font-bold text-slate-400">#<?php echo $job['id']; ?></td>
                            <td class="py-4 px-4">
                                <a href="/job_detail.php?id=<?php echo $job['id']; ?>" target="_blank" class="font-bold text-slate-900 hover:text-amber-600 transition text-sm block capitalize">
                                    <?php echo htmlspecialchars($job['title']); ?>
                                </a>
                            </td>
                            <td class="py-4 px-4 font-medium text-slate-700 capitalize"><?php echo htmlspecialchars($job['category']); ?></td>
                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md font-semibold text-[11px] border border-slate-200">
                                    <?php echo htmlspecialchars($job['job_type']); ?>
                                </span>
                            </td>
                            <td class="py-4 px-4 text-slate-600 capitalize"><?php echo htmlspecialchars($job['location']); ?></td>
                            <td class="py-4 px-4">
                                <?php if ($job['status'] === 'active'): ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200/80 rounded-full text-[11px] font-bold">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Active
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-100 text-slate-500 border border-slate-200 rounded-full text-[11px] font-bold">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Inactive
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-4 text-slate-400 font-medium"><?php echo date('d M Y', strtotime($job['created_at'])); ?></td>
                            <td class="py-4 px-4 text-right space-x-1.5">
                                <a href="/admin/job_edit.php?id=<?php echo $job['id']; ?>" class="px-2.5 py-1.5 bg-amber-50 hover:bg-amber-400 hover:text-slate-950 text-amber-700 font-bold rounded-lg transition text-[11px] inline-flex items-center gap-1 border border-amber-200/60">
                                    <i class="fa-solid fa-pen-to-square text-[10px]"></i> Edit
                                </a>
                                <a href="/admin/index.php?action=delete&id=<?php echo $job['id']; ?>" onclick="return confirm('Are you sure you want to delete this job opening?');" class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-600 font-bold rounded-lg transition text-[11px] inline-flex items-center gap-1 border border-rose-200/60">
                                    <i class="fa-solid fa-trash-can text-[10px]"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="p-12 text-center text-slate-400">
                            <div class="h-12 w-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3 text-xl">
                                <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">No job openings found</p>
                            <p class="text-xs text-slate-400 mt-1">Click "Post New Job Opening" above to create your first career listing.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
