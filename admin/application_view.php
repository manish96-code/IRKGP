<?php
$adminTitle = "Application Details";
$adminActivePage = "applications";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$appId = intval($_GET['id'] ?? 0);
if ($appId <= 0) {
    header("Location: /admin/applications.php");
    exit;
}

$msg = '';
$error = '';

// Handle Status Update
if (isset($_GET['new_status'])) {
    $newStatus = trim($_GET['new_status']);
    $allowed = ['new', 'reviewed', 'shortlisted', 'rejected'];
    if (in_array($newStatus, $allowed)) {
        try {
            $stmt = $pdo->prepare("UPDATE `job_applications` SET `status` = :status WHERE `id` = :id LIMIT 1");
            $stmt->execute([':status' => $newStatus, ':id' => $appId]);
            $msg = "Application status updated to '{$newStatus}'!";
        } catch (Exception $e) {
            $error = "Error updating status: " . $e->getMessage();
        }
    }
}

// Fetch Application Details with Job Info
$stmt = $pdo->prepare("
    SELECT a.*, j.title as job_title, j.category as job_category, j.job_type as job_type, j.location as job_location 
    FROM `job_applications` a 
    LEFT JOIN `jobs` j ON a.job_id = j.id 
    WHERE a.id = :id LIMIT 1
");
$stmt->execute([':id' => $appId]);
$app = $stmt->fetch();

if (!$app) {
    header("Location: /admin/applications.php");
    exit;
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Top Breadcrumb & Actions Header -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/60">
    <div>
        <a href="/admin/applications.php" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-900 transition uppercase tracking-wider mb-2">
            <i class="fa-solid fa-arrow-left text-[10px]"></i> Back to All Applications
        </a>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight capitalize">
            Candidate Application #<?php echo $app['id']; ?>
        </h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Submitted on <?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?></p>
    </div>

    <!-- Quick Status Change Toolbar -->
    <div class="flex flex-wrap items-center gap-2">
        <a href="/admin/application_view.php?id=<?php echo $app['id']; ?>&new_status=shortlisted" class="px-3.5 py-2 bg-emerald-50 hover:bg-emerald-500 hover:text-white text-emerald-700 font-bold text-xs rounded-xl transition border border-emerald-200/60 flex items-center gap-1.5 shadow-xs">
            <i class="fa-solid fa-circle-check text-xs"></i> Shortlist
        </a>
        <a href="/admin/application_view.php?id=<?php echo $app['id']; ?>&new_status=reviewed" class="px-3.5 py-2 bg-amber-50 hover:bg-amber-400 hover:text-slate-950 text-amber-800 font-bold text-xs rounded-xl transition border border-amber-200/60 flex items-center gap-1.5 shadow-xs">
            <i class="fa-solid fa-eye text-xs"></i> Mark Reviewed
        </a>
        <a href="/admin/application_view.php?id=<?php echo $app['id']; ?>&new_status=rejected" class="px-3.5 py-2 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-700 font-bold text-xs rounded-xl transition border border-rose-200/60 flex items-center gap-1.5 shadow-xs">
            <i class="fa-solid fa-circle-xmark text-xs"></i> Reject
        </a>
        <a href="/admin/applications.php?action=delete&id=<?php echo $app['id']; ?>" onclick="return confirm('Delete this candidate application permanently?');" class="px-3.5 py-2 bg-slate-100 hover:bg-rose-500 hover:text-white text-slate-600 font-bold text-xs rounded-xl transition border border-slate-200 flex items-center gap-1.5 shadow-xs">
            <i class="fa-solid fa-trash-can text-xs"></i> Delete
        </a>
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

<!-- Main Profile Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Candidate Main Card -->
    <div class="lg:col-span-8 space-y-6">
        
        <!-- Header Info Box -->
        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex flex-wrap items-start justify-between gap-4 border-b border-slate-100 pb-6">
                <div class="flex items-center gap-4">
                    <div class="h-14 w-14 rounded-2xl bg-amber-500/15 text-amber-700 font-bold text-2xl flex items-center justify-center border border-amber-500/30 shrink-0">
                        <?php echo strtoupper(substr($app['applicant_name'], 0, 1)); ?>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 capitalize leading-tight">
                            <?php echo htmlspecialchars(ucwords(strtolower($app['applicant_name']))); ?>
                        </h2>
                        <p class="text-xs text-slate-500 font-medium mt-1">
                            Applied Position: <strong class="text-slate-800 capitalize"><?php echo htmlspecialchars($app['job_title'] ?? 'General Candidate'); ?></strong>
                        </p>
                    </div>
                </div>

                <?php
                $badgeClasses = [
                    'new' => 'bg-blue-50 text-blue-700 border-blue-200',
                    'reviewed' => 'bg-amber-50 text-amber-800 border-amber-200',
                    'shortlisted' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'rejected' => 'bg-rose-50 text-rose-700 border-rose-200'
                ];
                $cls = $badgeClasses[$app['status']] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                ?>
                <span class="px-3.5 py-1.5 rounded-full font-bold text-xs uppercase border tracking-wider <?php echo $cls; ?>">
                    Current Status: <?php echo $app['status']; ?>
                </span>
            </div>

            <!-- Contact & Qualification Details Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                
                <!-- Email -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Email Address</span>
                    <a href="mailto:<?php echo htmlspecialchars($app['email']); ?>" class="text-sm font-bold text-slate-900 hover:text-amber-600 transition flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-amber-500 text-xs"></i>
                        <span><?php echo htmlspecialchars($app['email']); ?></span>
                    </a>
                </div>

                <!-- Phone -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Phone / Mobile</span>
                    <a href="tel:<?php echo htmlspecialchars($app['phone']); ?>" class="text-sm font-bold text-slate-900 hover:text-amber-600 transition flex items-center gap-2">
                        <i class="fa-solid fa-phone text-amber-500 text-xs"></i>
                        <span><?php echo htmlspecialchars($app['phone']); ?></span>
                    </a>
                </div>

                <!-- Experience -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total Work Experience</span>
                    <p class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-briefcase text-amber-500 text-xs"></i>
                        <span><?php echo htmlspecialchars($app['experience'] ?? 'Fresher'); ?></span>
                    </p>
                </div>

                <!-- Application Date -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Application Date</span>
                    <p class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-regular fa-clock text-amber-500 text-xs"></i>
                        <span><?php echo date('d F Y, h:i A', strtotime($app['created_at'])); ?></span>
                    </p>
                </div>

            </div>
        </div>

        <!-- Cover Note / Remarks Card -->
        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100">
                <i class="fa-solid fa-comment-dots text-amber-500 text-base"></i>
                <h3 class="text-lg font-bold text-slate-900">Cover Note / Candidate Message</h3>
            </div>

            <div class="p-5 rounded-xl bg-slate-50 border border-slate-200/80 text-sm text-slate-700 leading-relaxed font-normal">
                <?php if (!empty(trim($app['notes'] ?? ''))): ?>
                    <p class="first-letter:uppercase whitespace-pre-line"><?php echo ucfirst(htmlspecialchars(trim($app['notes']))); ?></p>
                <?php else: ?>
                    <p class="text-slate-400 italic text-xs">No cover note provided by candidate.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Right Side Job Summary Box -->
    <div class="lg:col-span-4 sticky top-24">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs space-y-5">
            <h4 class="font-bold text-slate-900 text-base pb-3 border-b border-slate-100">Applied Job Information</h4>
            
            <?php if (!empty($app['job_title'])): ?>
                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-slate-400 font-medium block text-[11px]">Role Title:</span>
                        <p class="font-bold text-slate-900 text-sm capitalize mt-0.5"><?php echo htmlspecialchars($app['job_title']); ?></p>
                    </div>
                    
                    <div>
                        <span class="text-slate-400 font-medium block text-[11px]">Category:</span>
                        <p class="font-semibold text-slate-700 capitalize mt-0.5"><?php echo htmlspecialchars($app['job_category'] ?? '-'); ?></p>
                    </div>

                    <div>
                        <span class="text-slate-400 font-medium block text-[11px]">Job Type:</span>
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md font-semibold text-[11px] inline-block mt-1">
                            <?php echo htmlspecialchars($app['job_type'] ?? '-'); ?>
                        </span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-medium block text-[11px]">Location:</span>
                        <p class="font-semibold text-slate-700 capitalize mt-0.5"><?php echo htmlspecialchars($app['job_location'] ?? '-'); ?></p>
                    </div>

                    <div class="pt-3 border-t border-slate-100">
                        <a href="/job_detail.php?id=<?php echo $app['job_id']; ?>" target="_blank" class="w-full py-2.5 bg-slate-100 hover:bg-amber-400 hover:text-slate-950 text-slate-700 font-bold text-xs rounded-xl transition text-center flex items-center justify-center gap-1.5">
                            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i> View Public Job Listing
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-xs text-slate-400">General application (no specific job linked).</p>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
