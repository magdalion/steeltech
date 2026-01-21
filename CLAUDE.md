# CLAUDE.md

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
```

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
└── images/                 # Project images organized by section
    ├── Steeltech_Section_1_*.JPG   # Čelične konstrukcije (17 images)
    ├── Steeltech_Section_2_*.JPG   # Zavarivanje (9 images)
    ├── Steeltech_Section_3_*.JPG   # Lasersko rezanje (2 images)
    └── Steeltech_section_4*.JPG    # Antikorozivna zaštita (3 images)
```

## Installed Modules

| Module | Purpose |
|--------|---------|
| `@nuxtjs/tailwindcss` | CSS framework |
| `@nuxtjs/google-fonts` | Audiowide & Rajdhani fonts (self-hosted, preloaded) |
| `@nuxtjs/sitemap` | Auto-generates sitemap.xml |
| `@nuxt/image` | Image optimization (NuxtImg component) |

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

### Font Loading Optimization
To prevent FOUT (Flash of Unstyled Text), the site uses:
- `font-display: swap` with local font hosting
- Size-adjusted fallback fonts in `main.css`
- **Text appear animation** - hero text fades in with staggered delays (masks font swap)

Animation classes in `main.css`:
- `.text-appear` - base fade-in (0.2s delay)
- `.text-appear-delay-1` - 0.45s delay
- `.text-appear-delay-2` - 0.7s delay
- `.text-appear-delay-3` - 0.95s delay

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
- SPA routing fallback to index.html
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

**Implementation Plan:**
1. ~~Complete full Hrvatski version first~~ ✅
2. Add @nuxtjs/i18n module
3. Create English translations
4. Add language switcher to navigation

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

## Deployment

1. Run `npm run generate`
2. Upload contents of `.output/public/` to hosting root
3. Ensure `.htaccess` is uploaded (may be hidden)

---

## TODO - Remaining Tasks

### 1. Favicon
- Create favicon files from SteelTech logo
- Required files:
  - `favicon.ico` (16x16, 32x32)
  - `apple-touch-icon.png` (180x180)
  - `favicon-32x32.png`
  - `favicon-16x16.png`
- Use https://realfavicongenerator.net or https://favicon.io

### 2. English Version
- Install `@nuxtjs/i18n` module
- Create English page translations in `/en/` routes
- Add language switcher to navigation
- Update sitemap for multilingual support

### 3. Contact Form (PHP Mailer)
- Create PHP backend for contact form submission
- Server setup for email sending
- Connect form in `kontakt.vue` to PHP endpoint
- Add form validation and success/error handling

### 4. Certification Images
- Q-CERT SAFE FPC EN 3834 & EN 1090 (Certificate No. 050625-16)
- Q-CERT SAFE FPC (Certificate No. 050625-16)
- Q-CERT SAFE CERTIFIED MS - ISO 9001 (Certificate No. 050625-14)
- CE marking logo
- Contact Q-CERT for official logo files
- Add to appropriate page (o-nama.vue or footer)

### 5. OG Image for Social Sharing
- Create `public/images/og-image.jpg` (1200x630px)
- Should include SteelTech logo and tagline
- Used when sharing links on Facebook, LinkedIn, Twitter

### 6. Instagram URL
- Add real Instagram URL to footer (currently placeholder #)
