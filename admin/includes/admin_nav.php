<?php
require_once __DIR__ . '/admin_auth.php';
require_once __DIR__ . '/../../config/db.php';

$adminActivePage = $adminActivePage ?? 'jobs';

// Fetch quick counts for sidebar badges
$navJobsCount = 0;
$navAppsCount = 0;
try {
    $pdoNav = getDBConnection();
    $navJobsCount = $pdoNav->query("SELECT COUNT(*) FROM `jobs` WHERE `status` = 'active'")->fetchColumn();
    $navAppsCount = $pdoNav->query("SELECT COUNT(*) FROM `job_applications` WHERE `status` = 'new'")->fetchColumn();
} catch (Exception $e) {
    $navJobsCount = 0;
    $navAppsCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($adminTitle) ? htmlspecialchars($adminTitle) . " | IRKGP Admin" : "IRKGP Job Manager"; ?></title>
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
<body class="bg-slate-100 font-sans antialiased text-slate-800 min-h-screen relative">

    <!-- Mobile Top Header Bar -->
    <div class="md:hidden bg-primary text-white p-4 flex items-center justify-between border-b border-slate-800 sticky top-0 z-50">
        <a href="/admin/index.php" class="flex items-center gap-2">
            <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-8 w-auto bg-white/10 p-1 rounded">
            <span class="font-serif font-bold text-base text-white">IRKGP Admin</span>
        </a>
        <button id="sidebar-toggle-btn" class="text-slate-300 hover:text-white p-2 focus:outline-none">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Backdrop Overlay -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 hidden md:hidden"></div>

    <!-- Fixed Sidebar Navigation -->
    <aside id="sidebar-menu" class="hidden md:flex flex-col w-64 bg-primary text-white border-r border-slate-800 h-screen fixed top-0 left-0 z-40 transition-all duration-300 shadow-xl">
        <!-- Sidebar Brand Header -->
        <div class="p-6 border-b border-slate-800/80 flex items-center justify-between">
            <a href="/admin/index.php" class="flex items-center gap-3 group">
                <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-10 w-auto object-contain bg-white/10 p-1.5 rounded-xl border border-white/10 group-hover:scale-105 transition">
                <div>
                    <span class="font-serif font-bold text-base text-white block leading-tight">IRKGP Admin</span>
                    <span class="text-[10px] text-secondary font-semibold uppercase tracking-wider block">Job Management</span>
                </div>
            </a>
        </div>

        <!-- Navigation Links Group -->
        <div class="flex-grow p-4 space-y-6 overflow-y-auto">
            <!-- Group: Jobs Management -->
            <div class="space-y-1">
                <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Job Openings</p>
                
                <!-- All Jobs / Dashboard -->
                <a href="/admin/index.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo ($adminActivePage === 'jobs' || $adminActivePage === 'dashboard') ? 'bg-secondary text-primary font-bold shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-briefcase text-sm"></i>
                        <span>Manage Jobs</span>
                    </div>
                    <?php if ($navJobsCount > 0): ?>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold <?php echo ($adminActivePage === 'jobs' || $adminActivePage === 'dashboard') ? 'bg-primary text-secondary' : 'bg-slate-800 text-secondary border border-secondary/30'; ?>"><?php echo $navJobsCount; ?> Active</span>
                    <?php endif; ?>
                </a>

                <!-- Add New Job -->
                <a href="/admin/job_create.php" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo $adminActivePage === 'job_create' ? 'bg-secondary text-primary font-bold shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
                    <i class="fa-solid fa-plus-circle text-sm text-secondary"></i>
                    <span>Add New Job</span>
                </a>
            </div>

            <!-- Group: Candidate Submissions -->
            <div class="space-y-1">
                <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Candidate Submissions</p>
                
                <a href="/admin/applications.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo $adminActivePage === 'applications' ? 'bg-secondary text-primary font-bold shadow-md' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-users-viewfinder text-sm"></i>
                        <span>Job Applications</span>
                    </div>
                    <?php if (isset($navAppsCount) && $navAppsCount > 0): ?>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-blue-500 text-white animate-pulse"><?php echo $navAppsCount; ?> New</span>
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Footer Admin Info -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-900/60 space-y-3 shrink-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="h-8 w-8 rounded-full bg-secondary text-primary font-bold text-xs flex items-center justify-center shrink-0">
                        <?php echo strtoupper(substr($_SESSION['admin_name'] ?? 'A', 0, 1)); ?>
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-bold text-white truncate"><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin'); ?></p>
                        <p class="text-[10px] text-slate-400 truncate"><?php echo htmlspecialchars($_SESSION['admin_email'] ?? 'admin@irkgpservices.com'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-2 pt-1">
                <a href="/career.php" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-[11px] font-medium text-center transition border border-slate-700 flex items-center justify-center gap-1">
                    <i class="fa-solid fa-globe text-secondary text-[10px]"></i> Career Page
                </a>
                <a href="/admin/logout.php" class="px-2.5 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-[11px] font-bold text-center transition border border-rose-500/30 flex items-center justify-center gap-1">
                    <i class="fa-solid fa-power-off text-[10px]"></i> Logout
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper (offsetted by md:pl-64 for fixed sidebar) -->
    <div class="flex-grow flex flex-col min-w-0 min-h-screen md:pl-64">
        
        <!-- Top Header Bar for Desktop -->
        <header class="bg-white border-b border-slate-200/80 px-6 py-4 hidden md:flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">IRKGP Admin</span>
                <span class="text-slate-300">/</span>
                <h1 class="text-base font-serif font-bold text-primary"><?php echo isset($adminTitle) ? htmlspecialchars($adminTitle) : "Job Management System"; ?></h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-xs text-slate-400 font-medium"><i class="fa-regular fa-clock text-secondary mr-1"></i> <?php echo date('D, d M Y'); ?></span>
                <a href="/career.php" target="_blank" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-secondary hover:text-primary text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    <span>View Public Career Page</span>
                </a>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-grow p-4 sm:p-6 lg:p-8">