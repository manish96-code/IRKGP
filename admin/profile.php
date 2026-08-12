<?php
$adminTitle = "Admin Profile & Security";
$adminActivePage = "profile";
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/admin_auth.php';

$pdo = getDBConnection();
$adminId = $_SESSION['admin_id'];

$msgSuccess = '';
$errorGlobal = '';
$profileErrors = [];
$passErrors = [];

// Fetch latest admin data
$stmt = $pdo->prepare("SELECT * FROM `admins` WHERE `id` = :id LIMIT 1");
$stmt->execute([':id' => $adminId]);
$adminUser = $stmt->fetch();

if (!$adminUser) {
    header("Location: /admin/logout.php");
    exit;
}

// Handle Profile Details Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type']) && $_POST['action_type'] === 'update_profile') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (empty($name)) {
        $profileErrors['name'] = 'Please enter your full name.';
    }

    if (empty($email)) {
        $profileErrors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $profileErrors['email'] = 'Please enter a valid email address.';
    } else {
        // Check email uniqueness
        $checkStmt = $pdo->prepare("SELECT id FROM `admins` WHERE `email` = :email AND `id` != :id LIMIT 1");
        $checkStmt->execute([':email' => $email, ':id' => $adminId]);
        if ($checkStmt->fetch()) {
            $profileErrors['email'] = 'This email is already registered to another admin.';
        }
    }

    if (empty($profileErrors)) {
        try {
            $updateStmt = $pdo->prepare("UPDATE `admins` SET `name` = :name, `email` = :email WHERE `id` = :id");
            $updateStmt->execute([':name' => $name, ':email' => $email, ':id' => $adminId]);

            $_SESSION['admin_name'] = $name;
            $_SESSION['admin_email'] = $email;
            $adminUser['name'] = $name;
            $adminUser['email'] = $email;

            $msgSuccess = 'Profile details updated successfully!';
        } catch (Exception $e) {
            $errorGlobal = 'Error updating profile: ' . $e->getMessage();
        }
    }
}

// Handle Password Change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type']) && $_POST['action_type'] === 'change_password') {
    $currentPass = trim($_POST['current_password'] ?? '');
    $newPass = trim($_POST['new_password'] ?? '');
    $confirmPass = trim($_POST['confirm_password'] ?? '');

    if (empty($currentPass)) {
        $passErrors['current_password'] = 'Please enter your current password.';
    } elseif (!password_verify($currentPass, $adminUser['password'])) {
        $passErrors['current_password'] = 'Current password is incorrect.';
    }

    if (empty($newPass)) {
        $passErrors['new_password'] = 'Please enter a new password.';
    } elseif (strlen($newPass) < 6) {
        $passErrors['new_password'] = 'New password must be at least 6 characters long.';
    }

    if (empty($confirmPass)) {
        $passErrors['confirm_password'] = 'Please confirm your new password.';
    } elseif ($newPass !== $confirmPass) {
        $passErrors['confirm_password'] = 'New password and confirmation password do not match.';
    }

    if (empty($passErrors)) {
        try {
            $newHash = password_hash($newPass, PASSWORD_DEFAULT);
            $updatePassStmt = $pdo->prepare("UPDATE `admins` SET `password` = :password WHERE `id` = :id");
            $updatePassStmt->execute([':password' => $newHash, ':id' => $adminId]);

            // Refresh stored admin password hash
            $adminUser['password'] = $newHash;
            $msgSuccess = 'Security Password changed successfully!';
        } catch (Exception $e) {
            $errorGlobal = 'Error changing password: ' . $e->getMessage();
        }
    }
}

include __DIR__ . '/includes/admin_nav.php';
?>

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200/60">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Admin Profile & Security</h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Manage your administrator profile details and update your account password.</p>
    </div>
</div>

<?php if (!empty($msgSuccess)): ?>
    <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-sm"></i>
        <span><?php echo htmlspecialchars($msgSuccess); ?></span>
    </div>
<?php endif; ?>

<?php if (!empty($errorGlobal)): ?>
    <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-600 text-xs font-bold flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
        <span><?php echo htmlspecialchars($errorGlobal); ?></span>
    </div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Profile Summary Badge Card -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs text-center space-y-4">
            <div class="h-20 w-20 rounded-full bg-amber-500/15 text-amber-700 font-bold text-3xl flex items-center justify-center border border-amber-500/30 mx-auto">
                <?php echo strtoupper(substr($adminUser['name'], 0, 1)); ?>
            </div>
            
            <div>
                <h3 class="font-bold text-slate-900 text-lg capitalize"><?php echo htmlspecialchars($adminUser['name']); ?></h3>
                <p class="text-xs text-slate-500 font-medium mt-0.5"><?php echo htmlspecialchars($adminUser['email']); ?></p>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-center gap-2">
                <span class="px-3 py-1 bg-amber-50 text-amber-800 border border-amber-200/60 rounded-full text-[11px] font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-shield-halved text-[10px] text-amber-500 mr-1"></i>
                    <?php echo htmlspecialchars(ucfirst($adminUser['role'])); ?>
                </span>
            </div>

            <div class="text-[11px] text-slate-400 font-medium pt-2">
                Account Created: <?php echo date('d M Y', strtotime($adminUser['created_at'])); ?>
            </div>
        </div>
    </div>

    <!-- Right Side Forms Grid -->
    <div class="lg:col-span-8 space-y-8">
        
        <!-- Form 1: Profile Info -->
        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100">
                <i class="fa-solid fa-user-gear text-amber-500 text-lg"></i>
                <h3 class="text-base font-bold text-slate-900">Personal Account Details</h3>
            </div>

            <form method="POST" action="" class="space-y-5" novalidate>
                <input type="hidden" name="action_type" value="update_profile">

                <!-- Admin Name -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Full Name *</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($adminUser['name']); ?>" 
                           class="w-full px-4 py-2.5 bg-slate-50 border <?php echo isset($profileErrors['name']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                    <?php if (isset($profileErrors['name'])): ?>
                        <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                            <span><?php echo htmlspecialchars($profileErrors['name']); ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Admin Email -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Email Address *</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($adminUser['email']); ?>" 
                           class="w-full px-4 py-2.5 bg-slate-50 border <?php echo isset($profileErrors['email']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                    <?php if (isset($profileErrors['email'])): ?>
                        <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                            <span><?php echo htmlspecialchars($profileErrors['email']); ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-amber-500 hover:text-slate-950 text-white font-bold text-xs rounded-xl shadow-xs transition flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        <span>Save Profile Changes</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Form 2: Password Change -->
        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center gap-2.5 pb-4 border-b border-slate-100">
                <i class="fa-solid fa-key text-amber-500 text-lg"></i>
                <h3 class="text-base font-bold text-slate-900">Change Account Password</h3>
            </div>

            <form method="POST" action="" class="space-y-5" novalidate>
                <input type="hidden" name="action_type" value="change_password">

                <!-- Current Password -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Current Password *</label>
                    <div class="relative">
                        <input type="password" name="current_password" id="pass-current" placeholder="Enter current password" 
                               class="w-full pl-4 pr-11 py-2.5 bg-slate-50 border <?php echo isset($passErrors['current_password']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                        <button type="button" onclick="togglePassVisibility('pass-current', 'icon-current')" class="absolute right-3.5 top-3 text-slate-400 hover:text-slate-600 focus:outline-none">
                            <i class="fa-solid fa-eye text-sm" id="icon-current"></i>
                        </button>
                    </div>
                    <?php if (isset($passErrors['current_password'])): ?>
                        <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                            <span><?php echo htmlspecialchars($passErrors['current_password']); ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- New Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">New Password *</label>
                        <div class="relative">
                            <input type="password" name="new_password" id="pass-new" placeholder="Min 6 characters" 
                                   class="w-full pl-4 pr-11 py-2.5 bg-slate-50 border <?php echo isset($passErrors['new_password']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                            <button type="button" onclick="togglePassVisibility('pass-new', 'icon-new')" class="absolute right-3.5 top-3 text-slate-400 hover:text-slate-600 focus:outline-none">
                                <i class="fa-solid fa-eye text-sm" id="icon-new"></i>
                            </button>
                        </div>
                        <?php if (isset($passErrors['new_password'])): ?>
                            <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                                <span><?php echo htmlspecialchars($passErrors['new_password']); ?></span>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Confirm New Password *</label>
                        <div class="relative">
                            <input type="password" name="confirm_password" id="pass-confirm" placeholder="Re-enter new password" 
                                   class="w-full pl-4 pr-11 py-2.5 bg-slate-50 border <?php echo isset($passErrors['confirm_password']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                            <button type="button" onclick="togglePassVisibility('pass-confirm', 'icon-confirm')" class="absolute right-3.5 top-3 text-slate-400 hover:text-slate-600 focus:outline-none">
                                <i class="fa-solid fa-eye text-sm" id="icon-confirm"></i>
                            </button>
                        </div>
                        <?php if (isset($passErrors['confirm_password'])): ?>
                            <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                                <span><?php echo htmlspecialchars($passErrors['confirm_password']); ?></span>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs rounded-xl shadow-xs transition flex items-center gap-2">
                        <i class="fa-solid fa-lock text-xs"></i>
                        <span>Update Password</span>
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>

<script>
function togglePassVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input && icon) {
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
}
</script>

<?php include __DIR__ . '/includes/admin_footer.php'; ?>
