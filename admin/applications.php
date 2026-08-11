<?php
$adminTitle = "Job Applications";
$adminActivePage = "applications";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$msg = '';
$error = '';

// Handle Status Change Action
if (isset($_GET['action']) && $_GET['action'] === 'status' && isset($_GET['id']) && isset($_GET['new_status'])) {
    $appId = intval($_GET['id']);
    $newStatus = trim($_GET['new_status']);
    $allowed = ['new', 'reviewed', 'shortlisted', 'rejected'];

    if (in_array($newStatus, $allowed)) {
        try {
            $stmt = $pdo->prepare("UPDATE `job_applications` SET `status` = :status WHERE `id` = :id LIMIT 1");
            $stmt->execute([':status' => $newStatus, ':id' => $appId]);
            $msg = "Application status updated to '{$newStatus}'!";
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}

// Handle Delete Action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $appId = intval($_GET['id']);
    try {
        $delStmt = $pdo->prepare("DELETE FROM `job_applications` WHERE `id` = :id LIMIT 1");
        $delStmt->execute([':id' => $appId]);
        $msg = "Application entry deleted successfully!";
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}

// Fetch applications with joined job title
$applications = [];
try {
    $query = "SELECT a.*, j.title as job_title, j.location as job_location FROM `job_applications` a LEFT JOIN `jobs` j ON a.job_id = j.id ORDER BY a.created_at DESC";
    $applications = $pdo->query($query)->fetchAll();
} catch (Exception $e) {
    $applications = [];
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl sm:text-3xl font-extrabold font-serif text-primary tracking-tight">Job Applications</h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-1">Review candidate applications submitted from the website career portal.</p>
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

<!-- Applications Table -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase font-bold tracking-wider">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Applicant Name</th>
                    <th class="p-4">Applied Job Position</th>
                    <th class="p-4">Contact Details</th>
                    <th class="p-4">Experience</th>
                    <th class="p-4">Cover Note / Remarks</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Applied Date</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!empty($applications)): ?>
                    <?php foreach ($applications as $app): ?>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 font-mono font-bold text-slate-400">#<?php echo $app['id']; ?></td>
                            <td class="p-4 font-bold text-primary text-sm"><?php echo htmlspecialchars($app['applicant_name']); ?></td>
                            <td class="p-4">
                                <p class="font-semibold text-slate-800 text-xs capitalize"><?php echo htmlspecialchars($app['job_title'] ?? 'General Candidate'); ?></p>
                                <p class="text-[10px] text-slate-400"><?php echo htmlspecialchars($app['job_location'] ?? ''); ?></p>
                            </td>
                            <td class="p-4 space-y-1">
                                <p class="font-medium text-slate-800"><i class="fa-solid fa-envelope text-slate-400 mr-1"></i><?php echo htmlspecialchars($app['email']); ?></p>
                                <p class="text-slate-500"><i class="fa-solid fa-phone text-slate-400 mr-1"></i><?php echo htmlspecialchars($app['phone']); ?></p>
                            </td>
                            <td class="p-4 font-bold text-slate-700"><?php echo htmlspecialchars($app['experience'] ?? 'Fresher'); ?></td>
                            <td class="p-4 max-w-xs text-slate-600 leading-relaxed"><?php echo nl2br(htmlspecialchars($app['notes'] ?? '-')); ?></td>
                            <td class="p-4">
                                <?php
                                $badgeClasses = [
                                    'new' => 'bg-blue-50 text-blue-700 border-blue-200',
                                    'reviewed' => 'bg-amber-50 text-amber-700 border-amber-200',
                                    'shortlisted' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    'rejected' => 'bg-rose-50 text-rose-700 border-rose-200'
                                ];
                                $cls = $badgeClasses[$app['status']] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                                ?>
                                <span class="px-2.5 py-1 rounded-md font-bold text-[11px] uppercase border <?php echo $cls; ?>"><?php echo $app['status']; ?></span>
                            </td>
                            <td class="p-4 text-slate-400"><?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?></td>
                            <td class="p-4 text-right space-x-1">
                                <a href="/admin/applications.php?action=status&id=<?php echo $app['id']; ?>&new_status=shortlisted" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-500 hover:text-white text-emerald-700 font-bold rounded-md transition text-[11px] inline-block">Shortlist</a>
                                <a href="/admin/applications.php?action=status&id=<?php echo $app['id']; ?>&new_status=rejected" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-700 font-bold rounded-md transition text-[11px] inline-block">Reject</a>
                                <a href="/admin/applications.php?action=delete&id=<?php echo $app['id']; ?>" onclick="return confirm('Delete this application entry?');" class="px-2 py-1 bg-slate-100 hover:bg-rose-500 hover:text-white text-slate-500 font-bold rounded-md transition text-[11px] inline-block"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="p-12 text-center text-slate-400">
                            <div class="h-12 w-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3 text-xl">
                                <i class="fa-solid fa-users-viewfinder"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">No candidate applications received yet</p>
                            <p class="text-xs text-slate-400 mt-1">Applications submitted by candidates on job detail pages will appear here live.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
