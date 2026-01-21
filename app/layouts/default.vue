<template>
  <div class="min-h-screen flex flex-col font-sans bg-brand-dark text-brand-light">
    <header class="bg-[#1a1a1a] border-b border-white/10 sticky top-0 z-50">
      <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
          <NuxtLink to="/" class="flex items-center">
            <img
              src="~/assets/icons/logo.svg"
              alt="SteelTech"
              class="h-8 md:h-10 w-auto"
            />
          </NuxtLink>

          <!-- Desktop Navigation -->
          <div class="hidden md:flex space-x-6 font-title text-sm tracking-wide uppercase">
            <NuxtLink
              v-for="link in navLinks"
              :key="link.to"
              :to="link.to"
              class="relative py-2 text-brand-light/80 hover:text-brand-primary transition-colors duration-200 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-brand-primary after:transition-all after:duration-300 hover:after:w-full"
              active-class="text-brand-primary after:w-full"
            >
              {{ link.label }}
            </NuxtLink>
          </div>

          <!-- Mobile Menu Button -->
          <button
            class="md:hidden p-2 -mr-2 min-w-[44px] min-h-[44px] flex items-center justify-center text-brand-light hover:text-brand-primary transition-colors"
            @click="mobileMenuOpen = !mobileMenuOpen"
            aria-label="Toggle menu"
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
              <NuxtLink
                v-for="link in navLinks"
                :key="link.to"
                :to="link.to"
                class="py-3 px-4 text-brand-light/80 hover:text-brand-primary hover:bg-white/5 rounded transition-colors"
                active-class="text-brand-primary bg-white/5"
                @click="mobileMenuOpen = false"
              >
                {{ link.label }}
              </NuxtLink>
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
          <!-- Logo & Description -->
          <div>
            <img
              src="~/assets/icons/logo.svg"
              alt="SteelTech"
              class="h-8 w-auto mb-4"
            />
            <p class="text-brand-light/60 text-sm leading-relaxed">
              Pouzdana snaga čelika. Specijalizirani za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja.
            </p>
          </div>

          <!-- Quick Links -->
          <div>
            <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-primary">Brze Poveznice</h3>
            <ul class="space-y-2">
              <li v-for="link in navLinks" :key="link.to">
                <NuxtLink
                  :to="link.to"
                  class="text-brand-light/60 hover:text-brand-primary transition-colors text-sm"
                >
                  {{ link.label }}
                </NuxtLink>
              </li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div>
            <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-primary">Kontakt</h3>
            <ul class="space-y-3 text-sm text-brand-light/60">
              <li class="flex items-start gap-3">
                <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Brankovići bb, Žepče 72230<br />Bosna i Hercegovina</span>
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
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 pt-8 text-center">
          <p class="text-sm text-brand-light/40">
            &copy; {{ new Date().getFullYear() }} SteelTech. Sva prava zadržana.
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
const mobileMenuOpen = ref(false)

const navLinks = [
  { to: '/', label: 'Naslovna' },
  { to: '/o-nama', label: 'O nama' },
  { to: '/proizvodnja', label: 'Proizvodnja' },
  { to: '/galerija', label: 'Galerija' },
  { to: '/lokacija', label: 'Lokacija' },
  { to: '/kontakt', label: 'Kontakt' }
]
</script>
