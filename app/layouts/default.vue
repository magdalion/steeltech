<template>
  <div class="min-h-screen flex flex-col font-sans bg-brand-dark text-brand-light">
    <header class="bg-[#1a1a1a] border-b border-white/10 sticky top-0 z-50">
      <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
          <NuxtLinkLocale to="/" class="flex items-center">
            <img
              src="~/assets/icons/logo.svg"
              alt="SteelTech"
              class="h-8 md:h-10 w-auto"
            />
          </NuxtLinkLocale>

          <!-- Desktop Navigation -->
          <div class="text-appear hidden md:flex items-center space-x-6 font-title text-sm tracking-wide uppercase">
            <NuxtLinkLocale
              v-for="link in navLinks"
              :key="link.to"
              :to="link.to"
              class="relative py-2 text-brand-light/80 hover:text-brand-primary transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-brand-primary after:transition-all after:duration-300 hover:after:w-full"
              active-class="text-brand-primary after:w-full"
            >
              {{ $t(link.labelKey) }}
            </NuxtLinkLocale>
            <LanguageSwitcher variant="desktop" />
          </div>

          <!-- Mobile Menu Button -->
          <button
            class="md:hidden p-2 -mr-2 min-w-[44px] min-h-[44px] flex items-center justify-center text-brand-light hover:text-brand-primary transition-colors"
            @click="mobileMenuOpen = !mobileMenuOpen"
            :aria-label="$t('aria.toggleMenu')"
          >
            <svg
              v-if="!mobileMenuOpen"
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg
              v-else
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Mobile Navigation -->
        <Transition
          enter-active-class="transition duration-200 ease-out"
          enter-from-class="opacity-0 -translate-y-2"
          enter-to-class="opacity-100 translate-y-0"
          leave-active-class="transition duration-150 ease-in"
          leave-from-class="opacity-100 translate-y-0"
          leave-to-class="opacity-0 -translate-y-2"
        >
          <div v-if="mobileMenuOpen" class="md:hidden mt-4 pb-2 border-t border-white/10 pt-4">
            <div class="flex flex-col space-y-1 font-title text-sm tracking-wide uppercase">
              <NuxtLinkLocale
                v-for="link in navLinks"
                :key="link.to"
                :to="link.to"
                class="py-3 px-4 text-brand-light/80 hover:text-brand-primary hover:bg-white/5 rounded transition-colors"
                active-class="text-brand-primary bg-white/5"
                @click="mobileMenuOpen = false"
              >
                {{ $t(link.labelKey) }}
              </NuxtLinkLocale>
            </div>
            <div class="mt-4 border-t border-white/10 pt-4">
              <LanguageSwitcher variant="mobile" @close="mobileMenuOpen = false" />
            </div>
          </div>
        </Transition>
      </nav>
    </header>

    <main class="flex-grow">
      <slot />
    </main>

    <footer class="bg-[#1a1a1a] border-t border-white/10">
      <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
          <!-- Logo & Description -->
          <div>
            <img
              src="~/assets/icons/logo.svg"
              alt="SteelTech"
              class="h-8 w-auto mb-4"
            />
            <p class="text-brand-light/60 text-sm leading-relaxed">
              {{ $t('footer.description') }}
            </p>
          </div>

          <!-- Quick Links -->
          <div>
            <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-primary">{{ $t('footer.quickLinks') }}</h3>
            <ul class="space-y-2">
              <li v-for="link in navLinks" :key="link.to">
                <NuxtLinkLocale
                  :to="link.to"
                  class="text-brand-light/60 hover:text-brand-primary transition-colors text-sm"
                >
                  {{ $t(link.labelKey) }}
                </NuxtLinkLocale>
              </li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div>
            <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-primary">{{ $t('footer.contactTitle') }}</h3>
            <ul class="space-y-3 text-sm text-brand-light/60">
              <li class="flex items-start gap-3">
                <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $t('footer.address') }}<br />{{ $t('footer.country') }}</span>
              </li>
              <li class="flex items-center gap-3">
                <svg class="w-5 h-5 text-brand-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <a href="mailto:dominik.jukic@steeltech.ba" class="hover:text-brand-primary transition-colors">
                  dominik.jukic@steeltech.ba
                </a>
              </li>
              <li class="flex items-center gap-3">
                <svg class="w-5 h-5 text-brand-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <a href="tel:+38764404198" class="hover:text-brand-primary transition-colors">
                  +387 64 404 1908
                </a>
              </li>
            </ul>
          </div>

          <!-- Social Media -->
          <div>
            <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-primary">{{ $t('footer.followUs') }}</h3>
            <div class="flex gap-6">
              <a href="https://www.facebook.com/share/1L1i7FQtuL/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="flex flex-col items-center gap-2 text-brand-primary hover:text-brand-primary/70 transition-colors" aria-label="Facebook">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 64 64"><path d="M62,32.18A30,30,0,1,0,27.312,61.816V40.851H19.7V32.18h7.616V25.57c0-7.519,4.48-11.672,11.331-11.672a46.208,46.208,0,0,1,6.716.585v7.384H41.576a4.339,4.339,0,0,0-4.889,4.688V32.18h8.322l-1.331,8.671H36.687V61.816A30,30,0,0,0,62,32.18Z"/></svg>
                <span class="text-sm text-brand-light/60">{{ $t('footer.onFacebook') }}</span>
              </a>
              <a href="#" class="flex flex-col items-center gap-2 text-brand-primary hover:text-brand-primary/70 transition-colors" aria-label="Instagram">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 64 64"><path d="M32,9.045c7.476,0,8.362.029,11.314.163a15.525,15.525,0,0,1,5.2.964,9.28,9.28,0,0,1,5.314,5.314,15.525,15.525,0,0,1,.964,5.2c.134,2.952.163,3.838.163,11.314s-.029,8.362-.163,11.314a15.525,15.525,0,0,1-.964,5.2,9.28,9.28,0,0,1-5.314,5.314,15.525,15.525,0,0,1-5.2.964c-2.952.134-3.837.163-11.314.163s-8.362-.029-11.314-.163a15.525,15.525,0,0,1-5.2-.964,9.28,9.28,0,0,1-5.314-5.314,15.525,15.525,0,0,1-.964-5.2C9.074,40.362,9.045,39.476,9.045,32s.029-8.362.163-11.314a15.525,15.525,0,0,1,.964-5.2,9.28,9.28,0,0,1,5.314-5.314,15.525,15.525,0,0,1,5.2-.964c2.952-.134,3.838-.163,11.314-.163M32,4c-7.6,0-8.558.032-11.544.168a20.553,20.553,0,0,0-6.8,1.3A14.324,14.324,0,0,0,5.47,13.659a20.553,20.553,0,0,0-1.3,6.8C4.032,23.442,4,24.4,4,32s.032,8.558.168,11.544a20.553,20.553,0,0,0,1.3,6.8,14.324,14.324,0,0,0,8.189,8.189,20.553,20.553,0,0,0,6.8,1.3C23.442,59.968,24.4,60,32,60s8.558-.032,11.544-.168a20.553,20.553,0,0,0,6.8-1.3,14.324,14.324,0,0,0,8.189-8.189,20.553,20.553,0,0,0,1.3-6.8C59.968,40.558,60,39.6,60,32s-.032-8.558-.168-11.544a20.553,20.553,0,0,0-1.3-6.8A14.324,14.324,0,0,0,50.341,5.47a20.553,20.553,0,0,0-6.8-1.3C40.558,4.032,39.6,4,32,4Z"/><path d="M32,17.622A14.378,14.378,0,1,0,46.378,32,14.378,14.378,0,0,0,32,17.622Zm0,23.711A9.333,9.333,0,1,1,41.333,32,9.332,9.332,0,0,1,32,41.333Z"/><circle cx="46.946" cy="17.054" r="3.36"/></svg>
                <span class="text-sm text-brand-light/60">{{ $t('footer.onInstagram') }}</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 pt-8 text-center">
          <p class="text-sm text-brand-light/40">
            &copy; {{ new Date().getFullYear() }} {{ $t('footer.copyright') }}
          </p>
        </div>
      </div>
    </footer>

    <!-- Back to Top Button -->
    <Transition
      enter-active-class="transition duration-300 ease-out"
      enter-from-class="opacity-0 translate-y-4"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition duration-200 ease-in"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 translate-y-4"
    >
      <button
        v-if="showBackToTop"
        @click="scrollToTop"
        class="fixed bottom-6 right-6 z-50 p-3 bg-brand-primary text-white rounded-full shadow-lg hover:bg-brand-secondary transition-colors duration-300"
        :aria-label="$t('aria.backToTop')"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
      </button>
    </Transition>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()

const mobileMenuOpen = ref(false)
const showBackToTop = ref(false)

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

function handleScroll() {
  showBackToTop.value = window.scrollY > 300
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})

const navLinks = [
  { to: '/', labelKey: 'nav.home' },
  { to: '/o-nama', labelKey: 'nav.about' },
  { to: '/proizvodnja', labelKey: 'nav.production' },
  { to: '/galerija', labelKey: 'nav.gallery' },
  { to: '/lokacija', labelKey: 'nav.location' },
  { to: '/kontakt', labelKey: 'nav.contact' }
]

// Set up locale head for hreflang tags
const head = useLocaleHead({
  addDirAttribute: true,
  addSeoAttributes: true
})

useHead({
  htmlAttrs: {
    lang: head.value.htmlAttrs?.lang
  },
  link: [...(head.value.link || [])],
  meta: [...(head.value.meta || [])]
})
</script>
