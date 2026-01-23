# CLAUDE.md

> **Note:** Do not commit or push this file to the repository.

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

SteelTech company website built with Nuxt 4 and Tailwind CSS.

**Domain:** steeltech.ba

## Commands

```bash
npm run dev       # Development server
npm run build     # Build for production
npm run preview   # Preview production build
npm run generate  # Generate static site (outputs to .output/public/)
npm run deploy    # Generate and deploy to server via SSH
```

## Deployment

**One-command deployment:**
```bash
npm run deploy
```

This runs `nuxt generate` and uploads to `webpage:/home/steeltech/public_html/` via SCP.

**SSH alias:** `webpage` (configured in `~/.ssh/config`)

## Architecture

```
app/
├── app.vue                 # Main app with NuxtLayout/NuxtPage
├── assets/
│   ├── css/main.css        # Tailwind directives + custom styles + animations
│   └── icons/
│       ├── logo.svg        # SteelTech logo
│       ├── facebook.svg    # Facebook icon
│       └── instagram.svg   # Instagram icon
├── layouts/
│   └── default.vue         # Dark theme layout with nav, footer & back-to-top
└── pages/
    ├── index.vue           # Naslovna (Home) - hero, services preview, gallery preview
    ├── o-nama.vue          # O nama (About) - company info, values, partners
    ├── proizvodnja.vue     # Proizvodnja (Production) - 5 service categories
    ├── galerija.vue        # Galerija (Gallery) - filterable grid with lightbox
    ├── lokacija.vue        # Lokacija (Location) - Google Maps embed
    └── kontakt.vue         # Kontakt (Contact) - contact form

public/
├── .htaccess               # Apache config (HTTPS, caching, security headers)
├── robots.txt              # Search engine directives
├── favicon.ico             # Site favicon (needs replacement with SteelTech logo)
├── images/                 # Project images organized by section
│   ├── Steeltech_Section_1_*.JPG   # Čelične konstrukcije (17 images)
│   ├── Steeltech_Section_2_*.JPG   # Zavarivanje (9 images)
│   ├── Steeltech_Section_3_*.JPG   # Lasersko rezanje (2 images)
│   └── Steeltech_section_4*.JPG    # Antikorozivna zaštita (3 images)
└── api/                    # PHP backend for contact form
    ├── contact.php         # Main form handler (POST)
    ├── csrf-token.php      # CSRF token generator (GET)
    ├── cleanup.php         # Cron job for expired files
    ├── config/
    │   └── mail.config.php # SMTP credentials
    ├── includes/
    │   ├── RateLimiter.php     # 5 requests/hour per IP
    │   ├── CsrfToken.php       # Token generation/validation
    │   └── InputValidator.php  # Input sanitization
    ├── templates/
    │   ├── email-hr.html   # Croatian email template
    │   └── email-en.html   # English email template
    ├── storage/
    │   ├── rate_limits/    # Rate limit tracking (auto-created)
    │   └── csrf_tokens/    # CSRF token storage (auto-created)
    └── vendor/
        └── autoload.php    # PHPMailer autoloader
```

## Installed Modules

| Module | Purpose |
|--------|---------|
| `@nuxtjs/tailwindcss` | CSS framework |
| `@nuxtjs/google-fonts` | Audiowide & Rajdhani fonts (self-hosted, preloaded) |
| `@nuxtjs/sitemap` | Auto-generates sitemap.xml |
| `@nuxt/image` | Image optimization (NuxtImg component) |
| `@nuxtjs/i18n` | Internationalization (Croatian/English) |

## Design System

### Brand Colors (defined in tailwind.config.js)
```js
brand: {
  primary: '#0087C2',    // Bright blue - CTAs, links, accents, hover states
  secondary: '#165A8F',  // Dark blue - secondary buttons, gradients
  dark: '#231F20',       // Near-black - main background
  gray: '#606164',       // Gray - muted text
  light: '#F5F5F5'       // Light gray - text on dark backgrounds
}
```

### Color Usage Guidelines
- **Background**: `bg-brand-dark` for main, `bg-[#1a1a1a]` for header/footer/sections
- **Cards/Surfaces**: `bg-[#2d2d2d]` with `border-white/10`
- **Primary accent**: `text-brand-primary` for links, highlights, icons
- **Text**: `text-brand-light` (main), `text-brand-light/70` (muted), `text-brand-light/40` (subtle)
- **Hover states**: `hover:text-brand-primary`, `hover:border-brand-primary/50`

### Typography
- **Base font**: Modern sans-serif (Inter/system-ui) - `font-sans`
- **Titles**: Google Audiowide - `font-title` (navigation menu, page titles, section headers)
- **Subtitles**: Google Rajdhani - `font-subtitle` (subheadings, card titles, secondary text)

Both fonts include `latin-ext` subset for Croatian special characters (č, ć, š, ž, đ).

Fonts are **self-hosted** (downloaded locally) with preload for performance.

### Font Loading & Configuration

**Important:** The `@nuxtjs/google-fonts` module downloads fonts but does NOT automatically inject the CSS `<link>` tag during static site generation (`npm run generate`). The stylesheet and font preloads are manually configured in `nuxt.config.ts`:

```js
// In app.head.link array:
{ rel: 'preload', as: 'style', href: '/css/nuxt-google-fonts.css' },
{ rel: 'stylesheet', href: '/css/nuxt-google-fonts.css' },
{ rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Audiowide-normal-400-latin.woff2', crossorigin: 'anonymous' },
{ rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Rajdhani-normal-400-latin.woff2', crossorigin: 'anonymous' }
```

**Generated font files (in `.output/public/`):**
- `/css/nuxt-google-fonts.css` - Font-face declarations
- `/fonts/*.woff2` - Self-hosted font files (Audiowide + Rajdhani weights)

**To prevent FOUT (Flash of Unstyled Text):**
- Font files are preloaded with high priority
- `font-display: swap` allows text to render with fallback fonts while loading
- Size-adjusted fallback fonts in `main.css` minimize layout shift
- **Text appear animation** - hero text fades in with staggered delays (masks font swap)

Animation classes in `main.css`:
- `.text-appear` - base fade-in (0.2s delay)
- `.text-appear-delay-1` - 0.45s delay
- `.text-appear-delay-2` - 0.7s delay
- `.text-appear-delay-3` - 0.95s delay

**Troubleshooting fonts not loading:**
1. Clear cache: `rm -rf .nuxt .output node_modules/.cache`
2. Rebuild: `npm run generate`
3. Ensure `/css/` and `/fonts/` directories are uploaded to server

### Font Usage Guidelines
- Use `font-title` for: main navigation, h1 headings, hero text, section titles
- Use `font-subtitle` for: h2-h3 headings, card titles, feature labels
- Use `font-sans` for: body text, paragraphs, form labels, footer text

### Icons
- Logo stored in `app/assets/icons/logo.svg`
- Social icons: `facebook.svg`, `instagram.svg`
- UI icons use inline SVGs with `currentColor` for fill/stroke
- No icon libraries (no Heroicons, FontAwesome, etc.)
- Icons should inherit text color via `currentColor`

### Responsive Design
Website must be fully optimized for all device sizes:

**Breakpoints (Tailwind defaults):**
- `sm`: 640px+ (large phones landscape)
- `md`: 768px+ (tablets)
- `lg`: 1024px+ (laptops)
- `xl`: 1280px+ (desktops)
- `2xl`: 1536px+ (large desktops)

**Mobile-First Approach:**
- Write base styles for mobile, then add breakpoint modifiers for larger screens
- Example: `text-base md:text-lg lg:text-xl`

**Required Responsive Elements:**
- Navigation: Hamburger menu on mobile, horizontal nav on desktop
- Images: Responsive sizing, proper aspect ratios
- Grid layouts: Single column mobile, multi-column desktop
- Typography: Scaled appropriately for each device
- Touch targets: Minimum 44x44px on mobile for buttons/links
- Spacing: Adjusted padding/margins for screen size

## SEO Configuration

### Global SEO (nuxt.config.ts)
- `lang="hr"` - Croatian language
- `theme-color: #0087C2` - Brand blue
- Default OG image: `/images/og-image.jpg` (1200x630px) - **NEEDS TO BE CREATED**
- Twitter card: summary_large_image
- Robots: index, follow

### Per-Page SEO
Each page has `useHead()` with:
- Optimized `title` with keywords
- `description` meta tag
- `keywords` meta tag
- `og:title`, `og:description`, `og:url`
- `twitter:title`, `twitter:description`
- `canonical` link

## Production Features

### .htaccess Configuration
Located in `public/.htaccess`:
- Force HTTPS redirect
- Remove www (redirect to non-www)
- Security headers (X-Frame-Options, CSP, HSTS, etc.)
- Gzip compression
- Browser caching (1 year for static assets)
- SPA routing fallback to index.html (excludes /api/)
- Block sensitive files (.env, config files)

### Sitemap
Auto-generated at `https://steeltech.ba/sitemap.xml`
- Includes all pages with images
- XSL stylesheet for human-readable view

### Robots.txt
```
User-Agent: *
Allow: /
Sitemap: https://steeltech.ba/sitemap.xml
Disallow: /_nuxt/
Disallow: /_ipx/
```

### Back to Top Button
- Appears after scrolling 300px
- Fixed bottom-right position
- Smooth fade-in animation
- Scrolls smoothly to top

## Social Media

### Footer Links
- Facebook: https://www.facebook.com/share/1L1i7FQtuL/?mibextid=wwXIfr
- Instagram: # (placeholder - needs URL)

## Internationalization (i18n)

**Languages:**
- Hrvatski (Croatian) - default, root URL
- English - prefixed with `/en`

**URL Structure:**
```
steeltech.ba/              → Hrvatski (default)
steeltech.ba/proizvodnja   → Hrvatski pages
steeltech.ba/en/           → English
steeltech.ba/en/production → English pages
```

**Page Mapping:**
| Hrvatski (default) | English (/en)      |
|--------------------|-------------------|
| `/` (Naslovna)     | `/en` (Home)      |
| `/o-nama`          | `/en/about`       |
| `/proizvodnja`     | `/en/production`  |
| `/galerija`        | `/en/gallery`     |
| `/lokacija`        | `/en/location`    |
| `/kontakt`         | `/en/contact`     |

## Gallery Features

The gallery (`/galerija`) supports category filtering via URL query params:
- `/galerija` - Show all images
- `/galerija?kategorija=celicne-konstrukcije` - Steel constructions
- `/galerija?kategorija=zavarivanje` - Welding
- `/galerija?kategorija=lasersko-rezanje` - Laser cutting
- `/galerija?kategorija=antikorozivna-zastita` - Anti-corrosion

Lightbox supports keyboard navigation: Escape (close), Left/Right arrows (navigate).

## Image Optimization

All project images use `<NuxtImg>` component for:
- Lazy loading
- Automatic WebP conversion
- Responsive srcset generation

Logo SVGs remain as standard `<img>` (SVGs don't need optimization).

---

## Contact Form (PHP API) ✅

**Status:** Fully working (HR & EN)

### Features
- CSRF token protection (single-use, 1-hour expiry)
- Rate limiting (5 requests/hour per IP)
- Honeypot spam protection
- **GDPR consent checkbox** (required before submission)
- Consent confirmation recorded in email for audit trail
- HTML email templates (Croatian & English)
- PHPMailer for SMTP delivery

### API Endpoints
- `GET /api/csrf-token.php` - Get CSRF token
- `POST /api/contact.php` - Submit form

### SMTP Configuration
Located in `public/api/config/mail.config.php`:
```php
define('SMTP_HOST', 'server1.webpage.ba');  // Must match SSL cert CN
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
define('SMTP_USERNAME', 'dominik.jukic@steeltech.ba');
```

**Important:** Do NOT use `localhost` as SMTP_HOST - the SSL certificate requires the actual hostname.

### API .htaccess Note
**Do NOT use `SetHandler application/x-httpd-php`** in `api/.htaccess` - cPanel PHP-FPM handles PHP automatically. Using SetHandler causes 404 errors on PHP-FPM setups.

### Cron Job (Optional)
Clean up expired tokens/rate limits daily. Add in cPanel → Cron Jobs:
```
0 3 * * * /usr/bin/php /home/steeltech/public_html/api/cleanup.php
```

---

## TODO - Remaining Tasks

### ~~1. Website Logo Replacement~~ ✅
- ~~Replace current logo with new SteelTech logo~~
- Done: Logo with gear icon, STEELTECH text, and METALNA PROIZVODNJA tagline

### ~~2. Favicon~~ ✅
- ~~Create favicon files from SteelTech logo~~
- Done: Full favicon set generated via RealFaviconGenerator
- Files: `favicon.ico`, `favicon.svg`, `favicon-96x96.png`, `apple-touch-icon.png`, `site.webmanifest`, PWA icons

### ~~3. OG Image for Social Sharing~~ ✅
- ~~Create `public/images/og-image.jpg` (1200x630px)~~
- Done: OG image with logo on gray background (#231F20)

### 4. Instagram URL
- Add real Instagram URL to footer (currently placeholder #)
- File: `app/layouts/default.vue:157`
