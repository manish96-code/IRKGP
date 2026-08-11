<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/db.php';

$pdo = getDBConnection();

$jobId = intval($_GET['id'] ?? 0);
if ($jobId <= 0) {
    header("Location: /career.php");
    exit;
}

// Fetch Job Details
$stmt = $pdo->prepare("SELECT * FROM `jobs` WHERE `id` = :id AND `status` = 'active' LIMIT 1");
$stmt->execute([':id' => $jobId]);
$job = $stmt->fetch();

if (!$job) {
    header("Location: /career.php");
    exit;
}

// Handle Application Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicantName = trim($_POST['applicant_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $experience = trim($_POST['experience'] ?? 'Fresher');
    $notes = ucfirst(trim($_POST['notes'] ?? ''));

    $appErrors = [];

    if (empty($applicantName)) {
        $appErrors['applicant_name'] = 'Please enter your full name.';
    }

    if (empty($email)) {
        $appErrors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $appErrors['email'] = 'Please enter a valid email address.';
    }

    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
    if (empty($phone)) {
        $appErrors['phone'] = 'Please enter your phone/mobile number.';
    } elseif (!preg_match('/^[6-9]\d{9}$/', $cleanPhone)) {
        $appErrors['phone'] = 'Please enter a valid 10-digit mobile number.';
    }

    if (empty($appErrors)) {
        $applicantNameFormatted = ucwords(strtolower($applicantName));
        $jobTitleFormatted = ucwords(strtolower($job['title']));
        try {
            $insertStmt = $pdo->prepare("INSERT INTO `job_applications` (`job_id`, `applicant_name`, `email`, `phone`, `experience`, `notes`, `status`) VALUES (:job_id, :name, :email, :phone, :experience, :notes, 'new')");
            $insertStmt->execute([
                ':job_id' => $job['id'],
                ':name' => $applicantNameFormatted,
                ':email' => $email,
                ':phone' => $phone,
                ':experience' => $experience,
                ':notes' => $notes
            ]);

            $_SESSION['app_success'] = "Thank you, <strong>" . htmlspecialchars($applicantNameFormatted) . "</strong>! Your application for <strong>" . htmlspecialchars($jobTitleFormatted) . "</strong> has been submitted successfully. Our HR team will contact you soon.";
            header("Location: /job_detail.php?id={$jobId}&applied=1");
            exit;
        } catch (Exception $e) {
            $_SESSION['app_error'] = "Error submitting application. Please try again or contact us directly.";
            header("Location: /job_detail.php?id={$jobId}");
            exit;
        }
    } else {
        $_SESSION['app_field_errors'] = $appErrors;
        $_SESSION['app_old'] = [
            'applicant_name' => $applicantName,
            'email' => $email,
            'phone' => $phone,
            'experience' => $experience,
            'notes' => $notes
        ];
        header("Location: /job_detail.php?id={$jobId}");
        exit;
    }
}

// Retrieve & Clear Flash Messages
$successMsg = $_SESSION['app_success'] ?? '';
$errorMsg = $_SESSION['app_error'] ?? '';
$appErrors = $_SESSION['app_field_errors'] ?? [];
$appOld = $_SESSION['app_old'] ?? [];

unset($_SESSION['app_success'], $_SESSION['app_error'], $_SESSION['app_field_errors'], $_SESSION['app_old']);

$pageTitle = $job['title'] . " - IRKGP Careers";
include 'includes/head.php';
include 'includes/navbar.php';

$reqArray = array_values(array_filter(array_map('trim', explode("\n", $job['requirements']))));
?>

<!-- Main Details & Application Section -->
<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Breadcrumb / Back Link -->
        <div class="mb-8">
            <a href="/career.php" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-secondary transition uppercase tracking-wider">
                <i class="fa-solid fa-arrow-left"></i> Back to All Career Openings
            </a>
        </div>
        
        <?php if (!empty($successMsg)): ?>
            <div class="p-6 mb-8 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 text-sm font-medium flex items-start gap-3 shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-600 text-xl shrink-0 mt-0.5"></i>
                <div>
                    <h4 class="font-bold text-emerald-900 text-base mb-1">Application Received!</h4>
                    <p class="leading-relaxed"><?php echo $successMsg; ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($errorMsg)): ?>
            <div class="p-4 mb-8 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-700 text-xs font-bold flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-sm shrink-0"></i>
                <span><?php echo htmlspecialchars($errorMsg); ?></span>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            <!-- Left Column: Job Description & Requirements -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Description Card -->
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                        <div class="h-10 w-10 rounded-xl bg-amber-50 text-secondary flex items-center justify-center text-lg font-bold border border-secondary/20">
                            <i class="fa-solid fa-align-left"></i>
                        </div>
                        <h3 class="text-xl font-bold font-serif text-primary">Job Description</h3>
                    </div>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed whitespace-pre-line capitalize">
                        <?php echo htmlspecialchars($job['description']); ?>
                    </p>
                </div>

                <!-- Key Requirements Card -->
                <?php if (!empty($reqArray)): ?>
                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                        <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                            <div class="h-10 w-10 rounded-xl bg-amber-50 text-secondary flex items-center justify-center text-lg font-bold border border-secondary/20">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <h3 class="text-xl font-bold font-serif text-primary">Key Requirements & Skills</h3>
                        </div>
                        <ul class="space-y-3 text-slate-700 text-sm">
                            <?php foreach ($reqArray as $req): ?>
                                <li class="flex items-start gap-3">
                                    <i class="fa-solid fa-circle-check text-secondary text-base mt-0.5 shrink-0"></i>
                                    <span class="leading-relaxed"><?php echo htmlspecialchars($req); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Why Join Us Card -->
                <div class="bg-amber-50/40 border border-secondary/30 text-slate-800 p-6 sm:p-8 rounded-3xl shadow-xs space-y-4 relative overflow-hidden">
                    <h4 class="font-serif font-bold text-primary text-lg">Why Work With IRKGP Services?</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-slate-700 font-medium">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-secondary text-base"></i> Structured corporate working environment & clear growth hierarchy.</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-secondary text-base"></i> Timely disbursements, transparent policies, and skill development.</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-secondary text-base"></i> Direct placement with top industrial & corporate enterprises.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Candidate Application Form -->
            <div class="lg:col-span-5 sticky top-28">
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-lg space-y-6">
                    <div>
                        <span class="text-xs font-bold text-secondary uppercase tracking-widest block">Direct Candidate Portal</span>
                        <h3 class="text-2xl font-extrabold font-serif text-primary mt-1">Apply For This Job</h3>
                        <p class="text-xs text-slate-500 mt-1">Fill out the form below. Our HR team will review your application.</p>
                    </div>

                    <form method="POST" action="" class="space-y-4" novalidate>
                        <!-- Applicant Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Full Name *</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                                <input type="text" name="applicant_name" value="<?php echo htmlspecialchars($appOld['applicant_name'] ?? ''); ?>" placeholder="e.g. Rahul Kumar" 
                                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border <?php echo isset($appErrors['applicant_name']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 capitalize">
                            </div>
                            <?php if (isset($appErrors['applicant_name'])): ?>
                                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                                    <span><?php echo htmlspecialchars($appErrors['applicant_name']); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Email Address *</label>
                            <div class="relative">
                                <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                                <input type="email" name="email" value="<?php echo htmlspecialchars($appOld['email'] ?? ''); ?>" placeholder="e.g. rahul@example.com" 
                                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border <?php echo isset($appErrors['email']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800">
                            </div>
                            <?php if (isset($appErrors['email'])): ?>
                                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                                    <span><?php echo htmlspecialchars($appErrors['email']); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Phone / Mobile Number *</label>
                            <div class="relative">
                                <i class="fa-solid fa-phone absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                                <input type="tel" name="phone" value="<?php echo htmlspecialchars($appOld['phone'] ?? ''); ?>" placeholder="e.g. 9876543210" 
                                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border <?php echo isset($appErrors['phone']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800">
                            </div>
                            <?php if (isset($appErrors['phone'])): ?>
                                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                                    <span><?php echo htmlspecialchars($appErrors['phone']); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Experience -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Relevant Experience</label>
                            <?php $selectedExp = $appOld['experience'] ?? 'Fresher'; ?>
                            <select name="experience" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-700">
                                <option value="Fresher" <?php echo $selectedExp === 'Fresher' ? 'selected' : ''; ?>>Fresher / Entry Level</option>
                                <option value="1-2 Years" <?php echo $selectedExp === '1-2 Years' ? 'selected' : ''; ?>>1 - 2 Years</option>
                                <option value="3-5 Years" <?php echo $selectedExp === '3-5 Years' ? 'selected' : ''; ?>>3 - 5 Years</option>
                                <option value="5+ Years" <?php echo $selectedExp === '5+ Years' ? 'selected' : ''; ?>>5+ Years Senior Level</option>
                            </select>
                        </div>

                        <!-- Cover Note / Message -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Cover Note / Remarks</label>
                            <textarea name="notes" rows="3" placeholder="Briefly mention your qualification or why you are a good fit for this role..." 
                                      class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-secondary focus:bg-white transition text-slate-800 first-letter:uppercase"><?php echo htmlspecialchars($appOld['notes'] ?? ''); ?></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:shadow-secondary/20 transition-all duration-300 flex items-center justify-center gap-2">
                                <span>Submit Application</span>
                                <i class="fa-solid fa-paper-plane text-xs"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
