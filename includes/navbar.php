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
<!-- Navigation Bar -->
<header id="navbar"
    class="sticky top-0 left-0 w-full z-50 bg-white border-b border-slate-200/80 shadow-sm transition-all duration-300">
    <!-- Top Info Row -->
    <div id="top-bar" class="hidden sm:block bg-slate-100 text-slate-600 text-xs py-2 px-6 border-b border-slate-200">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span><i class="fa-solid fa-location-dot text-secondary mr-1.5"></i> Registered in Bihar</span>
                <span class="hidden md:inline text-slate-300">|</span>
                <span class="hidden md:inline"><i class="fa-solid fa-briefcase text-secondary mr-1.5"></i> Manpower
                    Recruitment Solutions</span>
            </div>
            <div class="flex items-center gap-2.5">
                <a href="tel:+919661307327" class="hover:text-secondary transition"><i
                        class="fa-solid fa-phone text-secondary mr-1.5"></i> +91 96613 07327</a>
                <span class="text-slate-300">|</span>
                <a href="tel:+919472471486" class="hover:text-secondary transition">+91 94724 71486</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Content -->
    <div class="max-w-7xl mx-auto px-3 h-20 flex items-center justify-between">
        <!-- Logo -->
        <a href="/index.php" class="flex items-center gap-3 group">
            <img src="/assets/images/newlogo.png" alt="IRKGP Logo" class="h-20 md:h-24 w-auto object-contain">
        </a>

        <!-- Desktop Menu Links -->
        <nav class="hidden md:flex items-center gap-8 nav-links">
            <a href="/index.php"
                class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'home' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Home</a>
            <a href="/about.php"
                class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'about' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">About</a>
            <a href="/services.php"
                class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'services' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Services</a>
            <a href="/contact.php"
                class="text-sm font-semibold transition duration-300 <?php echo $activePage === 'contact' ? 'text-secondary border-b-2 border-secondary pb-1 font-bold' : 'text-slate-600 hover:text-secondary'; ?>">Contact</a>

            <a href="/contact.php#office-details"
                class="px-5 py-2.5 bg-secondary hover:bg-amber-500 text-primary font-bold rounded-lg text-xs shadow-sm hover:shadow transition-all duration-300 uppercase tracking-wider">Get
                in Touch</a>
        </nav>

        <!-- Mobile Hamburg Button -->
        <button id="mobile-menu-btn" class="md:hidden text-slate-800 hover:text-secondary focus:outline-none"
            aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Drawer Links -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 px-6 py-4 space-y-3 shadow-lg">
        <a href="/index.php"
            class="block text-sm font-semibold py-2 <?php echo $activePage === 'home' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Home</a>
        <a href="/about.php"
            class="block text-sm font-semibold py-2 <?php echo $activePage === 'about' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">About</a>
        <a href="/services.php"
            class="block text-sm font-semibold py-2 <?php echo $activePage === 'services' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Services</a>
        <a href="/contact.php"
            class="block text-sm font-semibold py-2 <?php echo $activePage === 'contact' ? 'text-secondary font-bold' : 'text-slate-600 hover:text-primary'; ?>">Contact</a>
    </div>
</header>