<?php
$adminTitle = "Edit Job Opening";
$adminActivePage = "jobs";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();

$jobId = intval($_GET['id'] ?? 0);
if ($jobId <= 0) {
    header("Location: /admin/index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM `jobs` WHERE `id` = :id LIMIT 1");
$stmt->execute([':id' => $jobId]);
$job = $stmt->fetch();

if (!$job) {
    header("Location: /admin/index.php");
    exit;
}

$errors = [];
$errorGlobal = '';

$standardCats = ['Parichari (Attendant)', 'Data Entry Operator', 'Clerk', 'Lipik'];
$isCustomCat = !in_array($job['category'], $standardCats);

$standardTypes = ['Full Time', 'Contractual', 'Remote', 'Hybrid'];
$isCustomType = !in_array($job['job_type'], $standardTypes);

$title = $job['title'];
$category = $isCustomCat ? 'Other' : $job['category'];
$customCategory = $isCustomCat ? $job['category'] : '';
$jobType = $isCustomType ? 'Other' : $job['job_type'];
$customJobType = $isCustomType ? $job['job_type'] : '';
$location = $job['location'];
$description = $job['description'];
$requirements = $job['requirements'];
$status = $job['status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $customCategory = trim($_POST['custom_category'] ?? '');
    if ($category === 'Other' && !empty($customCategory)) {
        $categoryValue = ucwords(strtolower($customCategory));
    } else {
        $categoryValue = $category;
    }

    $jobType = trim($_POST['job_type'] ?? '');
    $customJobType = trim($_POST['custom_job_type'] ?? '');
    if ($jobType === 'Other' && !empty($customJobType)) {
        $jobTypeValue = ucwords(strtolower($customJobType));
    } else {
        $jobTypeValue = $jobType;
    }

    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $requirements = trim($_POST['requirements'] ?? '');
    $status = trim($_POST['status'] ?? 'active');

    // Field-level validation checks
    if (empty($title)) {
        $errors['title'] = 'Please enter a job title.';
    }
    if ($category === 'Other' && empty($customCategory)) {
        $errors['category'] = 'Please specify custom department / category.';
    }
    if ($jobType === 'Other' && empty($customJobType)) {
        $errors['job_type'] = 'Please specify custom job type.';
    }
    if (empty($location)) {
        $errors['location'] = 'Please enter job location.';
    }
    if (empty($description)) {
        $errors['description'] = 'Please provide job description.';
    }

    if (empty($errors)) {
        try {
            $updateStmt = $pdo->prepare("UPDATE `jobs` SET `title` = :title, `category` = :category, `job_type` = :job_type, `location` = :location, `description` = :description, `requirements` = :requirements, `status` = :status WHERE `id` = :id LIMIT 1");
            $updateStmt->execute([
                ':title' => $title,
                ':category' => $categoryValue,
                ':job_type' => $jobTypeValue,
                ':location' => $location,
                ':description' => $description,
                ':requirements' => $requirements,
                ':status' => $status,
                ':id' => $jobId
            ]);

            header("Location: /admin/index.php");
            exit;
        } catch (Exception $e) {
            $errorGlobal = 'Error updating job: ' . $e->getMessage();
        }
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
        <a href="/admin/index.php" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
            <i class="fa-solid fa-arrow-left"></i> Back to Jobs
        </a>
    </div>
</div>

<?php if (!empty($errorGlobal)): ?>
    <div class="p-4 mb-6 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-600 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
        <span><?php echo htmlspecialchars($errorGlobal); ?></span>
    </div>
<?php endif; ?>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <form method="POST" action="" class="space-y-6 max-w-3xl" novalidate>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Job Title -->
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Title *</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" 
                       class="w-full px-4 py-3 bg-slate-50 border <?php echo isset($errors['title']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800">
                <?php if (isset($errors['title'])): ?>
                    <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span><?php echo htmlspecialchars($errors['title']); ?></span>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Department / Category *</label>
                <select name="category" id="category-select" class="w-full px-4 py-3 bg-slate-50 border <?php echo isset($errors['category']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="Parichari (Attendant)" <?php echo $category === 'Parichari (Attendant)' ? 'selected' : ''; ?>>Parichari (Attendant)</option>
                    <option value="Data Entry Operator" <?php echo $category === 'Data Entry Operator' ? 'selected' : ''; ?>>Data Entry Operator</option>
                    <option value="Clerk" <?php echo $category === 'Clerk' ? 'selected' : ''; ?>>Clerk</option>
                    <option value="Lipik" <?php echo $category === 'Lipik' ? 'selected' : ''; ?>>Lipik</option>
                    <option value="Other" <?php echo $category === 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
                <input type="text" name="custom_category" id="custom-category-input" placeholder="Type custom department / category..." 
                       value="<?php echo htmlspecialchars($customCategory); ?>"
                       class="<?php echo $category === 'Other' ? '' : 'hidden'; ?> w-full mt-3 px-4 py-3 bg-slate-50 border <?php echo isset($errors['category']) ? 'border-rose-500 bg-rose-50/20' : 'border-amber-300'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 font-medium">
                <?php if (isset($errors['category'])): ?>
                    <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span><?php echo htmlspecialchars($errors['category']); ?></span>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Job Type -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Type *</label>
                <select name="job_type" id="jobtype-select" class="w-full px-4 py-3 bg-slate-50 border <?php echo isset($errors['job_type']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="Full Time" <?php echo $jobType === 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                    <option value="Contractual" <?php echo $jobType === 'Contractual' ? 'selected' : ''; ?>>Contractual</option>
                    <option value="Remote" <?php echo $jobType === 'Remote' ? 'selected' : ''; ?>>Remote</option>
                    <option value="Hybrid" <?php echo $jobType === 'Hybrid' ? 'selected' : ''; ?>>Hybrid</option>
                    <option value="Other" <?php echo $jobType === 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
                <input type="text" name="custom_job_type" id="custom-jobtype-input" placeholder="Type custom job type..." 
                       value="<?php echo htmlspecialchars($customJobType); ?>"
                       class="<?php echo $jobType === 'Other' ? '' : 'hidden'; ?> w-full mt-3 px-4 py-3 bg-slate-50 border <?php echo isset($errors['job_type']) ? 'border-rose-500 bg-rose-50/20' : 'border-amber-300'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 font-medium">
                <?php if (isset($errors['job_type'])): ?>
                    <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span><?php echo htmlspecialchars($errors['job_type']); ?></span>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Location *</label>
                <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>" 
                       class="w-full px-4 py-3 bg-slate-50 border <?php echo isset($errors['location']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800">
                <?php if (isset($errors['location'])): ?>
                    <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span><?php echo htmlspecialchars($errors['location']); ?></span>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Status *</label>
                <select name="status" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition">
                    <option value="active" <?php echo $status === 'active' ? 'selected' : ''; ?>>Active (Visible on Website)</option>
                    <option value="inactive" <?php echo $status === 'inactive' ? 'selected' : ''; ?>>Inactive (Hidden)</option>
                </select>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Job Description *</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 bg-slate-50 border <?php echo isset($errors['description']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800"><?php echo htmlspecialchars($description); ?></textarea>
            <?php if (isset($errors['description'])): ?>
                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                    <span><?php echo htmlspecialchars($errors['description']); ?></span>
                </p>
            <?php endif; ?>
        </div>

        <!-- Requirements -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Key Requirements (One point per line)</label>
            <textarea name="requirements" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800"><?php echo htmlspecialchars($requirements); ?></textarea>
        </div>

        <div class="pt-4 flex gap-4">
            <button type="submit" class="px-7 py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold text-xs uppercase tracking-wider rounded-xl shadow transition">
                Update Job Opening
            </button>
            <a href="/admin/index.php" class="px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category-select');
    const customInput = document.getElementById('custom-category-input');

    if (categorySelect && customInput) {
        categorySelect.addEventListener('change', function() {
            if (this.value === 'Other') {
                customInput.classList.remove('hidden');
                customInput.focus();
            } else {
                customInput.classList.add('hidden');
            }
        });
    }

    const jobtypeSelect = document.getElementById('jobtype-select');
    const customJobtypeInput = document.getElementById('custom-jobtype-input');

    if (jobtypeSelect && customJobtypeInput) {
        jobtypeSelect.addEventListener('change', function() {
            if (this.value === 'Other') {
                customJobtypeInput.classList.remove('hidden');
                customJobtypeInput.focus();
            } else {
                customJobtypeInput.classList.add('hidden');
            }
        });
    }
});
</script>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
