// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  modules: ['@nuxtjs/tailwindcss', '@nuxtjs/google-fonts', '@nuxtjs/sitemap', '@nuxt/image', '@nuxtjs/i18n'],
  css: ['~/assets/css/main.css'],
  site: {
    url: 'https://steeltech.ba'
  },
  app: {
    head: {
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'author', content: 'SteelTech d.o.o.' },
        { name: 'robots', content: 'index, follow' },
        { name: 'theme-color', content: '#0087C2' },
        // Default OG tags
        { property: 'og:site_name', content: 'SteelTech' },
        { property: 'og:type', content: 'website' },
        { property: 'og:image', content: 'https://steeltech.ba/images/og-image.jpg' },
        { property: 'og:image:width', content: '1200' },
        { property: 'og:image:height', content: '630' },
        // Twitter Card
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:image', content: 'https://steeltech.ba/images/og-image.jpg' }
      ],
      link: [
        { rel: 'icon', type: 'image/png', sizes: '96x96', href: '/favicon-96x96.png' },
        { rel: 'icon', type: 'image/svg+xml', href: '/favicon.svg' },
        { rel: 'shortcut icon', href: '/favicon.ico' },
        { rel: 'apple-touch-icon', sizes: '180x180', href: '/apple-touch-icon.png' },
        { rel: 'manifest', href: '/site.webmanifest' },
        { rel: 'preload', as: 'style', href: '/css/nuxt-google-fonts.css' },
        { rel: 'stylesheet', href: '/css/nuxt-google-fonts.css' },
        { rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Audiowide-normal-400-latin.woff2', crossorigin: 'anonymous' },
        { rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Rajdhani-normal-400-latin.woff2', crossorigin: 'anonymous' }
      ]
    }
  },
  i18n: {
    locales: [
      {
        code: 'hr',
        iso: 'hr-HR',
        name: 'Hrvatski',
        file: 'hr.json'
      },
      {
        code: 'en',
        iso: 'en-US',
        name: 'English',
        file: 'en.json'
      }
    ],
    defaultLocale: 'hr',
    strategy: 'prefix_except_default',
    lazy: true,
    langDir: 'locales',
    baseUrl: 'https://steeltech.ba',
    customRoutes: 'config',
    pages: {
      'o-nama': {
        en: '/about'
      },
      'proizvodnja': {
        en: '/production'
      },
      'galerija': {
        en: '/gallery'
      },
      'lokacija': {
        en: '/location'
      },
      'kontakt': {
        en: '/contact'
      },
      'politika-privatnosti': {
        en: '/privacy-policy'
      },
      'politika-kolacica': {
        en: '/cookies-policy'
      }
    },
    detectBrowserLanguage: false
  },
  sitemap: {
    xslColumns: [
      { label: 'URL', width: '65%' },
      { label: 'Priority', select: 'sitemap:priority', width: '12.5%' },
      { label: 'Last Modified', select: 'sitemap:lastmod', width: '22.5%' }
    ]
  },
  googleFonts: {
    families: {
      Audiowide: [400],
      Rajdhani: [400, 500, 600, 700]
    },
    display: 'swap',
    subsets: ['latin', 'latin-ext'],
    download: true,
    inject: true
  }
})
