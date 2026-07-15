document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Navigation Bar Scroll Effect
    const navbar = document.getElementById('navbar');
    
    function checkScroll() {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white', 'shadow-md', 'border-slate-200/80');
            navbar.classList.remove('bg-transparent', 'border-transparent');
        } else {
            // Keep header light/transparent at the top of the page
            navbar.classList.remove('bg-white', 'shadow-md', 'border-slate-200/80');
            navbar.classList.add('bg-transparent', 'border-transparent');
        }
    }

    if (navbar) {
        window.addEventListener('scroll', checkScroll);
        checkScroll();
    }

    // 2. Mobile Nav Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 3. Stats Counter Animation using Intersection Observer
    const counters = document.querySelectorAll('.counter-val');
    
    const countUp = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        
        const speed = target > 100 ? 50 : 25;
        const inc = Math.ceil(target / speed);
        
        if (count < target) {
            counter.innerText = Math.min(count + inc, target);
            setTimeout(() => countUp(counter), 30);
        } else {
            counter.innerText = target;
        }
    };

    const statsObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                countUp(counter);
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.2 });

    counters.forEach(counter => {
        statsObserver.observe(counter);
    });
});
