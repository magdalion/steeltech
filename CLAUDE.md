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
npm run generate  # Generate static site
```

## Architecture

```
app/
├── app.vue                 # Main app with NuxtLayout/NuxtPage
├── assets/
│   ├── css/main.css        # Tailwind directives + custom styles
│   └── icons/
│       └── logo.svg        # SteelTech logo
├── layouts/
│   └── default.vue         # Dark theme layout with nav & footer
└── pages/
    ├── index.vue           # Naslovna (Home) - hero, services preview, gallery preview
    ├── o-nama.vue          # O nama (About) - company info, values, partners
    ├── proizvodnja.vue     # Proizvodnja (Production) - 5 service categories
    ├── galerija.vue        # Galerija (Gallery) - filterable grid with lightbox
    ├── lokacija.vue        # Lokacija (Location) - Google Maps embed
    └── kontakt.vue         # Kontakt (Contact) - contact form

public/
└── images/                 # Project images organized by section
    ├── Steeltech_Section_1_*.JPG   # Čelične konstrukcije (17 images)
    ├── Steeltech_Section_2_*.JPG   # Zavarivanje (9 images)
    ├── Steeltech_Section_3_*.JPG   # Lasersko rezanje (2 images)
    └── Steeltech_section_4*.JPG    # Antikorozivna zaštita (3 images)
```

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

### Font Usage Guidelines
- Use `font-title` for: main navigation, h1 headings, hero text, section titles
- Use `font-subtitle` for: h2-h3 headings, card titles, feature labels
- Use `font-sans` for: body text, paragraphs, form labels, footer text

### Icons
- Logo stored in `app/assets/icons/logo.svg`
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
1. Complete full Hrvatski version first
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
