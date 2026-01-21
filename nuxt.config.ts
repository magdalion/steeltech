// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  modules: ['@nuxtjs/tailwindcss', '@nuxtjs/google-fonts', '@nuxtjs/sitemap', '@nuxt/image'],
  css: ['~/assets/css/main.css'],
  site: {
    url: 'https://steeltech.ba'
  },
  app: {
    head: {
      htmlAttrs: {
        lang: 'hr'
      },
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'author', content: 'SteelTech d.o.o.' },
        { name: 'robots', content: 'index, follow' },
        { name: 'theme-color', content: '#0087C2' },
        // Default OG tags
        { property: 'og:site_name', content: 'SteelTech' },
        { property: 'og:locale', content: 'hr_HR' },
        { property: 'og:type', content: 'website' },
        { property: 'og:image', content: 'https://steeltech.ba/images/og-image.jpg' },
        { property: 'og:image:width', content: '1200' },
        { property: 'og:image:height', content: '630' },
        // Twitter Card
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:image', content: 'https://steeltech.ba/images/og-image.jpg' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
        { rel: 'canonical', href: 'https://steeltech.ba' },
        { rel: 'preload', as: 'style', href: '/css/nuxt-google-fonts.css' },
        { rel: 'stylesheet', href: '/css/nuxt-google-fonts.css' },
        { rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Audiowide-normal-400-latin.woff2', crossorigin: 'anonymous' },
        { rel: 'preload', as: 'font', type: 'font/woff2', href: '/fonts/Rajdhani-normal-400-latin.woff2', crossorigin: 'anonymous' }
      ]
    }
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
