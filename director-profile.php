<?php
$directors = [
    'indradeo' => [
        'name' => 'Indradeo Mehta',
        'din' => '11795605',
        'status' => 'Active',
        'allocation_date' => '29th June, 2026',
        'non_compliant' => 'No',
        'kyc_status' => 'NA',
        'dsc_status' => 'NA',
        'dsc_expiry' => 'NA',
        'image' => 'assets/images/director1.jpg',
        'bio' => 'Indradeo Mehta is a registered Director of IRKGP Services Private Limited. He directs corporate governance compliance, strategic planning, and regional scaling operations in Eastern India.',
        'companies' => [
            [
                'name' => 'IRKGP SERVICES PRIVATE LIMITED',
                'cin' => 'U78100BR2026PTC086015',
                'designation' => 'Director',
                'appointment_date' => '29th June, 2026'
            ]
        ]
    ],
    'rajiv' => [
        'name' => 'Rajiv Kumar',
        'din' => '11795606',
        'status' => 'Active',
        'allocation_date' => '29th June, 2026',
        'non_compliant' => 'No',
        'kyc_status' => 'NA',
        'dsc_status' => 'NA',
        'dsc_expiry' => 'NA',
        'image' => 'assets/images/director2.jpg',
        'bio' => 'Rajiv Kumar is a registered Director of IRKGP Services Private Limited. He oversees workforce recruitment systems, technical screening models, and strategic client onboarding pipelines.',
        'companies' => [
            [
                'name' => 'IRKGP SERVICES PRIVATE LIMITED',
                'cin' => 'U78100BR2026PTC086015',
                'designation' => 'Director',
                'appointment_date' => '29th June, 2026'
            ]
        ]
    ]
];

$id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';

if (!array_key_exists($id, $directors)) {
    header('Location: about.php');
    exit;
}

$director = $directors[$id];
$pageTitle = $director['name'] . " - Profile";
include 'includes/head.php';
include 'includes/navbar.php';
?>


<!-- Profile Details -->
<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8">
            <a href="about.php" class="text-secondary font-bold text-sm hover:text-gold-700 transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Back to About Us
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Side: Profile Photo & Key Info -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-slateBg border border-slate-200 p-4 rounded-2xl shadow-sm">
                    <img src="<?= htmlspecialchars($director['image']) ?>" alt="<?= htmlspecialchars($director['name']) ?>" class="w-full h-80 object-cover rounded-xl shadow-inner border border-slate-300/40">
                </div>
                <div class="bg-slateBg border border-slate-200 p-6 rounded-2xl space-y-3">
                    <h3 class="font-bold text-primary text-lg font-serif">Quick Summary</h3>
                    <p class="text-slate-600 text-sm font-light leading-relaxed"><?= htmlspecialchars($director['bio']) ?></p>
                </div>
            </div>

            <!-- Right Side: Official Director Information Tables -->
            <div class="lg:col-span-8 space-y-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight mb-2"><?= htmlspecialchars($director['name']) ?></h2>
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest mb-4">Official Director Information</h3>
                    <p class="text-slate-500 text-sm font-medium">Verified credentials registered under the Ministry of Corporate Affairs (MCA), Government of India.</p>
                </div>

                <!-- Registration Fields -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <div class="p-6 md:p-8 space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">Director Identification Number (DIN)</span>
                            <span class="text-sm font-mono font-bold text-secondary"><?= htmlspecialchars($director['din']) ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">DIN Status</span>
                            <span class="text-sm font-bold text-emerald-600 flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-emerald-500 inline-block"></span> <?= htmlspecialchars($director['status']) ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">DIN Allocation Date</span>
                            <span class="text-sm font-bold text-primary"><?= htmlspecialchars($director['allocation_date']) ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">Director of Active Non-Compliant Company</span>
                            <span class="text-sm font-bold text-slate-600"><?= htmlspecialchars($director['non_compliant']) ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">DIR 3 KYC Status</span>
                            <span class="text-sm font-bold text-slate-500"><?= htmlspecialchars($director['kyc_status']) ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                            <span class="text-sm font-semibold text-slate-500">DSC Status</span>
                            <span class="text-sm font-bold text-slate-500"><?= htmlspecialchars($director['dsc_status']) ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-semibold text-slate-500">DSC Expiry Date</span>
                            <span class="text-sm font-bold text-slate-500"><?= htmlspecialchars($director['dsc_expiry']) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Current Company Designations -->
                <div>
                    <h2 class="text-xl font-bold text-primary font-serif tracking-tight mb-4">Current Directorship Associations</h2>
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider">
                                    <th class="p-4">Company Name</th>
                                    <th class="p-4">CIN / LLPIN</th>
                                    <th class="p-4">Designation</th>
                                    <th class="p-4">Appointment Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-600 font-medium">
                                <?php foreach ($director['companies'] as $comp): ?>
                                    <tr>
                                        <td class="p-4 text-primary font-bold text-xs md:text-sm font-serif"><?= htmlspecialchars($comp['name']) ?></td>
                                        <td class="p-4 text-xs font-mono text-secondary"><?= htmlspecialchars($comp['cin']) ?></td>
                                        <td class="p-4 text-slate-600"><?= htmlspecialchars($comp['designation']) ?></td>
                                        <td class="p-4 text-slate-500 text-xs"><?= htmlspecialchars($comp['appointment_date']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
