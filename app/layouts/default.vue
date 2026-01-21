<template>
  <div class="min-h-screen flex flex-col font-sans">
    <header class="bg-gray-800 text-white">
      <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
          <NuxtLink to="/" class="text-xl md:text-2xl font-title font-bold tracking-wider">
            SteelTech
          </NuxtLink>

          <!-- Desktop Navigation -->
          <div class="hidden md:flex space-x-6 font-title text-sm tracking-wide">
            <NuxtLink
              v-for="link in navLinks"
              :key="link.to"
              :to="link.to"
              class="hover:text-gray-300 transition-colors py-2"
            >
              {{ link.label }}
            </NuxtLink>
          </div>

          <!-- Mobile Menu Button -->
          <button
            class="md:hidden p-2 -mr-2 min-w-[44px] min-h-[44px] flex items-center justify-center"
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
          <div v-if="mobileMenuOpen" class="md:hidden mt-4 pb-2">
            <div class="flex flex-col space-y-1 font-title text-sm tracking-wide">
              <NuxtLink
                v-for="link in navLinks"
                :key="link.to"
                :to="link.to"
                class="py-3 px-2 hover:bg-gray-700 rounded transition-colors"
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

    <footer class="bg-gray-800 text-white py-6 px-4">
      <div class="container mx-auto text-center">
        <p class="text-sm md:text-base">
          &copy; {{ new Date().getFullYear() }} SteelTech. Sva prava zadržana.
        </p>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
const mobileMenuOpen = ref(false)

const navLinks = [
  { to: '/', label: 'Naslovna' },
  { to: '/o-nama', label: 'O nama' },
  { to: '/usluge', label: 'Usluge' },
  { to: '/galerija', label: 'Galerija' },
  { to: '/lokacija', label: 'Lokacija' },
  { to: '/kontakt', label: 'Kontakt' }
]
</script>
