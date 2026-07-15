<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$activePage = 'home';
if ($currentPage === 'about.php') {
    $activePage = 'about';
} elseif ($currentPage === 'services.php') {
    $activePage = 'services';
} elseif ($currentPage === 'contact.php') {
    $activePage = 'contact';
}
?>
<!-- Navigation Bar (Static White with Shadow) -->
<header id="navbar" class="sticky top-0 left-0 w-full z-50 bg-white border-b border-slate-200/80 shadow-sm transition-all duration-300">
    <!-- Top Info Row -->
    <div id="top-bar" class="bg-primary text-gold-100 text-xs py-2 px-6 border-b border-gold-800/10">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span><i class="fa-solid fa-location-dot text-secondary mr-1.5"></i> Registered in Bihar</span>
                <span class="hidden md:inline text-slate-600">|</span>
                <span class="hidden md:inline"><i class="fa-solid fa-briefcase text-secondary mr-1.5"></i> Manpower Recruitment Solutions</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="tel:+919876543210" class="hover:text-secondary transition"><i class="fa-solid fa-phone text-secondary mr-1.5"></i> +91 98765 43210</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Content -->
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <!-- Logo -->
        <a href="index.php" class="flex items-center gap-3 group">
            <div class="h-10 w-10 rounded-full bg-secondary p-0.5 shadow-sm flex items-center justify-center text-primary text-lg font-bold group-hover:scale-105 transition-transform duration-200">
                IR
            </div>
            <div class="flex flex-col">
                <span id="brand-name" class="text-lg font-extrabold tracking-tight text-primary leading-none group-hover:text-secondary transition-colors">
                    IRKGP <span class="text-secondary font-semibold text-base">Services</span>
                </span>
                <span id="brand-sub" class="text-[9px] font-bold text-slate-500 tracking-wider uppercase mt-1">Pvt. Ltd.</span>
            </div>
        </a>

        <!-- Desktop Menu Links -->
        <nav class="hidden md:flex items-center gap-8 nav-links">
            <a href="index.php" class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'home' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Home</a>
            <a href="about.php" class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'about' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">About</a>
            <a href="services.php" class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'services' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Services</a>
            <a href="contact.php" class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'contact' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Contact</a>
            
            <a href="contact.php" class="px-5 py-2.5 bg-secondary hover:bg-primary text-primary hover:text-white font-bold rounded-lg text-xs shadow-sm hover:shadow transition-all duration-300 uppercase tracking-wider">Get in Touch</a>
        </nav>

        <!-- Mobile Hamburg Button -->
        <button id="mobile-menu-btn" class="md:hidden text-slate-800 hover:text-secondary focus:outline-none" aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Drawer Links -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 px-6 py-4 space-y-3 shadow-lg">
        <a href="index.php" class="block text-sm font-semibold py-2 <?php echo $activePage === 'home' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Home</a>
        <a href="about.php" class="block text-sm font-semibold py-2 <?php echo $activePage === 'about' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">About</a>
        <a href="services.php" class="block text-sm font-semibold py-2 <?php echo $activePage === 'services' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Services</a>
        <a href="contact.php" class="block text-sm font-semibold py-2 <?php echo $activePage === 'contact' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Contact</a>
    </div>
</header>
