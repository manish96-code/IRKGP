        </main>

        <!-- Admin Footer -->
        <footer class="bg-white border-t border-slate-200/80 text-slate-500 py-5 text-xs text-center mt-auto">
            <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-center items-center gap-2">
                <p>&copy; <?php echo date('Y'); ?> IRKGP Services Pvt. Ltd. | All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Mobile Sidebar Toggle Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('sidebar-toggle-btn');
        const sidebar = document.getElementById('sidebar-menu');
        const backdrop = document.getElementById('sidebar-backdrop');

        function toggleSidebar() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'fixed', 'inset-y-0', 'left-0', 'z-50', 'w-64');
                if (backdrop) backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex', 'fixed', 'inset-y-0', 'left-0', 'z-50');
                if (backdrop) backdrop.classList.add('hidden');
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', toggleSidebar);
        }
        if (backdrop) {
            backdrop.addEventListener('click', toggleSidebar);
        }
    });
    </script>
</body>
</html>
