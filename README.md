# IRKGP Services Pvt. Ltd. - Corporate Website Profile

A premium, fully responsive, light-themed corporate profile website for **IRKGP SERVICES PRIVATE LIMITED** (Registered in Bihar, India), specializing in Manpower Recruitment & Management Solutions.

This website is designed with a pure light-mode aesthetic, utilizing solid color systems, standard grid alignments, and a modular PHP architecture.

---

## 📂 Project Structure

```text
IRKGP/
├── index.php                 # Home Page (Hero section, corporate summary, stats counters, features)
├── about.php                 # About Us (Overview, official corporate credentials, mission/vision, team)
├── services.php              # Services Page (Staffing, recruitment, consulting, and workforce management)
├── contact.php               # Contact Us (Physical office details & interactive Google Map coordinate)
│
├── includes/                 # Modular template sections
│   ├── head.php              # Document config, SEO meta, styling CDNs, opening body tag
│   ├── navbar.php            # Responsive sticky white navigation header with mobile drawer menu
│   └── footer.php            # Quick links, social handles, corporate address, copyrights
│
├── assets/                   # Static directory assets
│   ├── css/
│   │   └── custom.css        # custom stylesheet overrides (fonts, animations, hover transition rules)
│   ├── js/
│   │   └── main.js           # intersection observers for stats count-up & mobile menu button toggles
│   └── images/               # Localized image folder for offline execution
│       ├── logo.png          # Cropped gold corporate brand logo emblem
│       ├── hero-bg.jpg       # Home screen backdrop
│       ├── about-preview.jpg # Corporate meeting background
│       ├── about-banner.jpg  # About page top cover
│       ├── services-banner.jpg # Services page top cover
│       ├── contact-banner.jpg # Contact page top cover
│       ├── director1.jpg     # Director Indradeo Mehta profile picture
│       └── director2.jpg     # Director Rajiv Kumar profile picture
│
└── README.md                 # Project documentation guide
```

---

## ⚙️ Corporate & Business Specifications

* **Company Name**: IRKGP SERVICES PRIVATE LIMITED
* **CIN**: `U78100BR2026PTC086015`
* **Registered Address**: Manjhli Chowk, Madhubani, Purnia, Bihar, India - 854301
* **Primary Scope**: Activities of employment placement/manpower recruitment solutions
* **Directors**: 
  - Indradeo Mehta (Director, Appointed 29th June, 2026)
  - Rajiv Kumar (Director, Appointed 29th June, 2026)

---

## 🚀 Getting Started & Usage

### 1. Pre-requisites
- **PHP** >= 8.0 (Tested on PHP 8.5)
- Any standard web browser (Chrome, Firefox, Safari, Edge)

### 2. Local Setup and Deployment
1. Clone or download this project directory onto your machine.
2. Navigate into the directory and launch the PHP built-in web server:
   ```bash
   php -S localhost:8080
   ```
3. Open your browser and navigate to:
   ```text
   http://localhost:8080
   ```

---

## 💡 Custom Features & Responsive Highlights

* **Static Sticky Navbar**: Stays fixed at the top of the viewport when scrolling, ensuring easy navigation without layout overlapping.
* **Responsive Layouts**: Grids automatically adapt from single-column on mobile screens to multi-column rows on desktops.
* **Mobile Hamburg Toggle**: Micro-animated hamburger icon that transforms dynamically into a cross-mark (`fa-xmark`) when clicked to toggle the mobile menu drawer.
* **Stats Counters**: Uses JavaScript `IntersectionObserver` to trigger count-up animations for key metrics when they scroll into the viewport.
* **No External Media Dependecy**: All image assets are stored locally inside `assets/images/` to support offline previewing.
* **Clean Light Aesthetics**: Solid slate-white background tokens, avoiding dark background segments or complex gradient masks.
