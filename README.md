# IRKGP Services Pvt. Ltd. - Company Profile Website

A premium, fully responsive corporate company profile website for **IRKGP SERVICES PVT. LTD.** (Registered in Bihar), specializing in Manpower Recruitment & Management Solutions. 

Built using **Core PHP**, **HTML5**, **Tailwind CSS**, and **JavaScript**.

---

## 📂 Project Structure

```text
├── index.php                 # Home Page (Hero, preview content, stats counters)
├── about.php                 # About Us (Timeline, history, core values, team profiles)
├── services.php              # Services Page (Detailed 6-card vertical matrix list)
├── contact.php               # Contact Us (Interactive validation form & Google Map)
├── includes/                 # Modular layout parts
│   ├── header.php            # SEO metas, Outfit/Poppins fonts, styling imports
│   ├── navbar.php            # Responsive transparent-to-white header menu
│   └── footer.php            # Quick links, social icons, copyrights
├── assets/                   # Static page resources
│   ├── css/
│   │   └── custom.css        # Font overrides, shadows, and hover transitions
│   └── js/
│       └── main.js           # Scroll triggers and stats counting logic
└── README.md                 # Project guide
```

---

## 🚀 Getting Started & Usage

### 1. Requirements
- **PHP** >= 8.0 (Tested on PHP 8.5)
- **Web Browser**

### 2. Run the Development Server
Navigate to the project root directory and start PHP's built-in server:
```bash
php -S localhost:8080
```
Open your browser and navigate to:
👉 **[http://localhost:8080](http://localhost:8080)**

---

## 💎 Key Features & Implementation Specs

- **Aesthetic Theme Palette**: Custom-crafted color scheme featuring deep corporate navy blue (`#0F172A`) paired with polished metallic gold accents (`#C8A04A`).
- **Typography Integration**: Headers configured to render premium Playfair Display serif font, while main body text resolves cleanly in Poppins.
- **Scroll Observer Counters**: Numbers inside the homepage statistics panel animate dynamically from `0` to their final values as you scroll them into view.
- **Transparent Navigation Transition**: The header remains transparent overlaying the hero image, then transitions smoothly into a solid white container with shadow indicators as you scroll down.
- **Dynamic Contact Form Handler**: Built-in PHP request verification validates text fields and alerts users of validation errors or success status.
