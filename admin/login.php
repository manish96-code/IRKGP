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

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
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
                $error = 'Invalid email or password!';
            }
        } catch (Exception $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | IRKGP Services</title>
    <link rel="icon" type="image/png" href="/assets/images/newlogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
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
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden text-slate-100 antialiased">
    <!-- Glow Background Effects -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-secondary/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full space-y-8 relative z-10">
        <!-- Logo & Header -->
        <div class="text-center space-y-4">
            <a href="/" class="inline-block">
                <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-16 w-auto mx-auto object-contain bg-white/10 p-2 rounded-2xl border border-white/10 backdrop-blur-md">
            </a>
            <h2 class="text-3xl font-extrabold font-serif text-white tracking-tight">Admin Portal</h2>
            <p class="text-sm text-slate-400">Sign in to manage jobs, applications, and website inquiries</p>
        </div>

        <!-- Login Card -->
        <div class="bg-slate-800/80 backdrop-blur-xl border border-slate-700/80 p-8 rounded-3xl shadow-2xl space-y-6">
            <?php if (!empty($error)): ?>
                <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-sm shrink-0"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="" class="space-y-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Admin Email</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                        <input type="email" name="email" required placeholder="admin@irkgpservices.com" value="admin@irkgpservices.com" 
                               class="w-full pl-10 pr-4 py-3 bg-slate-900/90 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Password</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                        <input type="password" name="password" required placeholder="••••••••" value="Admin@123" 
                               class="w-full pl-10 pr-4 py-3 bg-slate-900/90 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 bg-secondary hover:bg-amber-500 text-primary font-extrabold rounded-xl shadow-lg hover:shadow-secondary/20 transition-all duration-300 text-sm uppercase tracking-wider flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>

            <div class="pt-4 border-t border-slate-700/60 text-center text-xs text-slate-400">
                Default Credentials: <span class="font-mono text-secondary">admin@irkgpservices.com</span> / <span class="font-mono text-secondary">Admin@123</span>
            </div>
        </div>

        <div class="text-center">
            <a href="/" class="text-xs text-slate-400 hover:text-secondary transition flex items-center justify-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Back to IRKGP Main Website
            </a>
        </div>
    </div>
</body>
</html>
