<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: /admin/index.php");
    exit;
}

require_once __DIR__ . '/../config/db.php';

$loginErrors = [];
$errorGlobal = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email)) {
        $loginErrors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loginErrors['email'] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $loginErrors['password'] = 'Please enter your password.';
    }

    if (empty($loginErrors)) {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare("SELECT * FROM `admins` WHERE `email` = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_name'] = $admin['name'];
                $_SESSION['admin_email'] = $admin['email'];
                $_SESSION['admin_role'] = $admin['role'];

                header("Location: /admin/index.php");
                exit;
            } else {
                $errorGlobal = 'Invalid email address or password.';
            }
        } catch (Exception $e) {
            $errorGlobal = 'Database Connection Error. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Login | IRKGP Services</title>
    <link rel="icon" type="image/png" href="/assets/images/newlogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        primary: '#0F172A',
                        secondary: '#C8A04A',
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative bg-slate-50 font-sans antialiased text-slate-800">
    
    <!-- Background Gradient Accent -->
    <div class="absolute inset-0 bg-gradient-to-tr from-amber-50/60 via-slate-50 to-amber-50/40 pointer-events-none"></div>

    <div class="max-w-md w-full space-y-6 relative z-10">
        
        <!-- Header Title -->
        <div class="text-center space-y-1">
            <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-800 text-[11px] font-extrabold uppercase tracking-widest border border-amber-500/20">
                Management Portal
            </span>
            <h2 class="text-3xl font-extrabold font-serif text-slate-900 tracking-tight pt-2">IRKGP Control Portal</h2>
            <p class="text-xs text-slate-500 font-medium">Enterprise Administrative Sign-In</p>
        </div>

        <!-- Login Card (Light Theme) -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-xl space-y-6">
            
            <?php if (!empty($errorGlobal)): ?>
                <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-700 text-xs font-bold flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-sm shrink-0"></i>
                    <span><?php echo htmlspecialchars($errorGlobal); ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="" class="space-y-5" novalidate>
                <!-- Email Field -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Admin Email Address *</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-3.5 text-slate-400 text-sm"></i>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="admin@irkgpservices.com" 
                               class="w-full pl-11 pr-4 py-3 bg-slate-50 border <?php echo isset($loginErrors['email']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                    </div>
                    <?php if (isset($loginErrors['email'])): ?>
                        <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                            <span><?php echo htmlspecialchars($loginErrors['email']); ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Password *</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-3.5 text-slate-400 text-sm"></i>
                        <input type="password" name="password" id="password-input" placeholder="Enter password..." 
                               class="w-full pl-11 pr-11 py-3 bg-slate-50 border <?php echo isset($loginErrors['password']) ? 'border-rose-500 bg-rose-50/20' : 'border-slate-200'; ?> rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-secondary focus:bg-white transition font-medium">
                        <button type="button" id="toggle-password-btn" class="absolute right-4 top-3.5 text-slate-400 hover:text-slate-600 transition focus:outline-none">
                            <i class="fa-solid fa-eye text-sm" id="toggle-password-icon"></i>
                        </button>
                    </div>
                    <?php if (isset($loginErrors['password'])): ?>
                        <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                            <span><?php echo htmlspecialchars($loginErrors['password']); ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Sign In Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold rounded-xl shadow-lg hover:shadow-secondary/20 transition-all duration-200 text-xs uppercase tracking-wider flex items-center justify-center gap-2">
                        <span>Sign In To Dashboard</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Website Footer Link -->
        <div class="text-center">
            <a href="/" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-secondary transition">
                <i class="fa-solid fa-arrow-left text-[10px]"></i>
                <span>Back to IRKGP Main Website</span>
            </a>
        </div>

    </div>

    <!-- Password Eye Toggle Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggle-password-btn');
        const passInput = document.getElementById('password-input');
        const toggleIcon = document.getElementById('toggle-password-icon');

        if (toggleBtn && passInput && toggleIcon) {
            toggleBtn.addEventListener('click', function() {
                if (passInput.type === 'password') {
                    passInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            });
        }
    });
    </script>

</body>
</html>
