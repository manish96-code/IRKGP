<!DOCTYPE html>
<html lang="en" class="scroll-smooth h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . " | IRKGP SERVICES PVT. LTD." : "IRKGP SERVICES PVT. LTD. | Manpower Recruitment & Management Solutions"; ?></title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="IRKGP Services Pvt. Ltd. provides expert manpower recruitment and HR management solutions. Registered in Bihar, connecting organizations with skilled candidates.">
    <meta name="keywords" content="recruitment, manpower bihar, manpower solutions, HR consultancy, staffing solutions, hiring agency, Bihar recruitment">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,500&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        serif: ['Playfair Display', 'Georgia', 'serif'],
                    },
                    colors: {
                        primary: '#0F172A',
                        secondary: '#C8A04A',
                        slateBg: '#F8F9FA'
                    }
                }
            }
        }
    </script>
    
    <!-- Custom stylesheet overrides -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body class="bg-slateBg text-[#374151] flex flex-col min-h-screen antialiased">
