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
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($adminTitle) ? htmlspecialchars($adminTitle) . " | IRKGP Enterprise" : "IRKGP Admin Portal"; ?></title>
    <link rel="icon" type="image/png" href="/assets/images/newlogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
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
                        brand: {
                            50: '#fffbf0',
                            100: '#fef3d6',
                            500: '#c8a04a',
                            600: '#b08736',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 min-h-screen relative">

    <!-- Mobile Top Header Bar -->
    <div class="md:hidden bg-slate-900 text-white px-4 py-3 flex items-center justify-between border-b border-slate-800 sticky top-0 z-50">
        <a href="/admin/index.php" class="flex items-center gap-2.5">
            <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-7 w-auto object-contain">
            <span class="font-bold text-sm text-white tracking-tight">IRKGP Portal</span>
        </a>
        <button id="sidebar-toggle-btn" class="text-slate-300 hover:text-white p-1.5 focus:outline-none">
            <i class="fa-solid fa-bars text-lg"></i>
        </button>
    </div>

    <!-- Mobile Backdrop Overlay -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 hidden md:hidden"></div>

    <!-- Fixed Sidebar Navigation -->
    <aside id="sidebar-menu" class="hidden md:flex flex-col w-64 bg-slate-900 text-white border-r border-slate-800 h-screen fixed top-0 left-0 z-40 transition-all duration-300 shadow-2xl">
        
        <!-- Sidebar Brand Header -->
        <div class="px-6 py-5 border-b border-slate-800/80 flex items-center justify-between">
            <a href="/admin/index.php" class="flex items-center gap-3 group">
                <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-9 w-auto object-contain transition group-hover:scale-105">
                <div>
                    <span class="font-bold text-sm text-white block tracking-tight leading-tight">IRKGP Portal</span>
                    <span class="text-[10px] text-amber-400 font-semibold uppercase tracking-wider block">Recruitment Control</span>
                </div>
            </a>
        </div>

        <!-- Navigation Links Group -->
        <div class="flex-grow p-4 space-y-6 overflow-y-auto">
            
            <!-- Group: Jobs Management -->
            <div class="space-y-1">
                <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Job Openings</p>
                
                <!-- Manage Jobs / Dashboard -->
                <a href="/admin/index.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo ($adminActivePage === 'jobs' || $adminActivePage === 'dashboard') ? 'bg-amber-500/15 text-amber-300 font-bold border border-amber-500/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-briefcase text-sm"></i>
                        <span>Manage Jobs</span>
                    </div>
                    <?php if ($navJobsCount > 0): ?>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold <?php echo ($adminActivePage === 'jobs' || $adminActivePage === 'dashboard') ? 'bg-amber-400 text-slate-950' : 'bg-slate-800 text-amber-300 border border-amber-400/20'; ?>"><?php echo $navJobsCount; ?></span>
                    <?php endif; ?>
                </a>

                <!-- Add New Job -->
                <a href="/admin/job_create.php" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo $adminActivePage === 'job_create' ? 'bg-amber-500/15 text-amber-300 font-bold border border-amber-500/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
                    <i class="fa-solid fa-plus-circle text-sm text-amber-400"></i>
                    <span>Add New Job</span>
                </a>
            </div>

            <!-- Group: Candidate Submissions -->
            <div class="space-y-1">
                <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Candidate Portal</p>
                
                <a href="/admin/applications.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 <?php echo $adminActivePage === 'applications' ? 'bg-amber-500/15 text-amber-300 font-bold border border-amber-500/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white'; ?>">
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
        <div class="p-4 border-t border-slate-800/80 bg-slate-950/60 space-y-3 shrink-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="h-8 w-8 rounded-full bg-amber-500/20 text-amber-400 font-bold text-xs flex items-center justify-center shrink-0 border border-amber-500/30">
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
                    <i class="fa-solid fa-globe text-amber-400 text-[10px]"></i> Career Page
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
        <header class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 px-6 py-3.5 hidden md:flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div class="flex items-center gap-2.5 text-xs">
                <span class="font-bold text-slate-400 uppercase tracking-wider">IRKGP Control</span>
                <span class="text-slate-300">/</span>
                <h1 class="font-bold text-slate-900 text-sm"><?php echo isset($adminTitle) ? htmlspecialchars($adminTitle) : "Job Management Dashboard"; ?></h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-xs text-slate-500 font-medium flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-amber-500 text-xs"></i> 
                    <?php echo date('D, d M Y'); ?>
                </span>
                <a href="/career.php" target="_blank" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-amber-400 hover:text-slate-950 text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    <span>Live Career Page</span>
                </a>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 lg:p-8 space-y-6">