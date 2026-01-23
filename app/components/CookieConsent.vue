<template>
  <Teleport to="body">
    <Transition
      enter-active-class="transition duration-300 ease-out"
      enter-from-class="opacity-0 translate-y-4"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition duration-200 ease-in"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 translate-y-4"
    >
      <div
        v-if="showBanner"
        class="fixed bottom-0 left-0 right-0 z-[100] p-4 md:p-6"
      >
        <div class="container mx-auto max-w-4xl">
          <div class="bg-[#1a1a1a] border border-white/10 rounded-lg shadow-2xl p-6">
            <!-- Main Banner -->
            <div v-if="!showCustomize">
              <div class="flex flex-col md:flex-row md:items-start gap-4">
                <div class="flex-grow">
                  <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">
                    {{ $t('cookieConsent.title') }}
                  </h3>
                  <p class="text-brand-light/70 text-sm leading-relaxed">
                    {{ $t('cookieConsent.description') }}
                    <NuxtLinkLocale
                      to="/politika-kolacica"
                      class="text-brand-primary hover:underline"
                    >
                      {{ $t('cookieConsent.learnMore') }}
                    </NuxtLinkLocale>
                  </p>
                </div>
              </div>

              <div class="flex flex-col sm:flex-row gap-3 mt-4">
                <button
                  @click="acceptAll"
                  class="px-6 py-2.5 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-200"
                >
                  {{ $t('cookieConsent.acceptAll') }}
                </button>
                <button
                  @click="rejectNonEssential"
                  class="px-6 py-2.5 bg-transparent border border-white/20 text-brand-light font-title uppercase tracking-wide text-sm rounded hover:border-brand-primary/50 hover:text-brand-primary transition-colors duration-200"
                >
                  {{ $t('cookieConsent.rejectNonEssential') }}
                </button>
                <button
                  @click="showCustomize = true"
                  class="px-6 py-2.5 bg-transparent border border-white/20 text-brand-light font-title uppercase tracking-wide text-sm rounded hover:border-brand-primary/50 hover:text-brand-primary transition-colors duration-200"
                >
                  {{ $t('cookieConsent.customize') }}
                </button>
              </div>
            </div>

            <!-- Customize Panel -->
            <div v-else>
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-title text-lg uppercase tracking-wide text-brand-light">
                  {{ $t('cookieConsent.customizeTitle') }}
                </h3>
                <button
                  @click="showCustomize = false"
                  class="p-1 text-brand-light/60 hover:text-brand-light transition-colors"
                  :aria-label="$t('aria.closeLightbox')"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>

              <div class="space-y-4 mb-6">
                <!-- Necessary Cookies -->
                <div class="flex items-center justify-between p-4 bg-[#2d2d2d] rounded-lg">
                  <div class="flex-grow pr-4">
                    <h4 class="font-subtitle text-base font-semibold text-brand-light mb-1">
                      {{ $t('cookieConsent.categories.necessary.title') }}
                    </h4>
                    <p class="text-brand-light/60 text-sm">
                      {{ $t('cookieConsent.categories.necessary.description') }}
                    </p>
                  </div>
                  <div class="shrink-0">
                    <div class="w-12 h-6 bg-brand-primary/30 rounded-full flex items-center justify-end px-1 cursor-not-allowed">
                      <div class="w-4 h-4 bg-brand-primary rounded-full"></div>
                    </div>
                    <span class="text-xs text-brand-light/40 mt-1 block text-center">{{ $t('cookieConsent.alwaysOn') }}</span>
                  </div>
                </div>

                <!-- Functional Cookies -->
                <div class="flex items-center justify-between p-4 bg-[#2d2d2d] rounded-lg">
                  <div class="flex-grow pr-4">
                    <h4 class="font-subtitle text-base font-semibold text-brand-light mb-1">
                      {{ $t('cookieConsent.categories.functional.title') }}
                    </h4>
                    <p class="text-brand-light/60 text-sm">
                      {{ $t('cookieConsent.categories.functional.description') }}
                    </p>
                  </div>
                  <button
                    @click="customPrefs.functional = !customPrefs.functional"
                    :class="[
                      'shrink-0 w-12 h-6 rounded-full flex items-center px-1 transition-colors duration-200',
                      customPrefs.functional ? 'bg-brand-primary justify-end' : 'bg-white/10 justify-start'
                    ]"
                    :aria-checked="customPrefs.functional"
                    role="switch"
                  >
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                  </button>
                </div>

                <!-- Third-Party Cookies -->
                <div class="flex items-center justify-between p-4 bg-[#2d2d2d] rounded-lg">
                  <div class="flex-grow pr-4">
                    <h4 class="font-subtitle text-base font-semibold text-brand-light mb-1">
                      {{ $t('cookieConsent.categories.thirdParty.title') }}
                    </h4>
                    <p class="text-brand-light/60 text-sm">
                      {{ $t('cookieConsent.categories.thirdParty.description') }}
                    </p>
                  </div>
                  <button
                    @click="customPrefs.thirdParty = !customPrefs.thirdParty"
                    :class="[
                      'shrink-0 w-12 h-6 rounded-full flex items-center px-1 transition-colors duration-200',
                      customPrefs.thirdParty ? 'bg-brand-primary justify-end' : 'bg-white/10 justify-start'
                    ]"
                    :aria-checked="customPrefs.thirdParty"
                    role="switch"
                  >
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                  </button>
                </div>
              </div>

              <div class="flex flex-col sm:flex-row gap-3">
                <button
                  @click="saveCustom"
                  class="px-6 py-2.5 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-200"
                >
                  {{ $t('cookieConsent.savePreferences') }}
                </button>
                <button
                  @click="acceptAll"
                  class="px-6 py-2.5 bg-transparent border border-white/20 text-brand-light font-title uppercase tracking-wide text-sm rounded hover:border-brand-primary/50 hover:text-brand-primary transition-colors duration-200"
                >
                  {{ $t('cookieConsent.acceptAll') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup lang="ts">
const { showBanner, showCustomize, acceptAll, rejectNonEssential, saveCustomPreferences, initialize, preferences } = useCookieConsent()

const customPrefs = reactive({
  functional: false,
  thirdParty: false
})

// Sync custom preferences with current state when opening customize
watch(showCustomize, (isOpen) => {
  if (isOpen) {
    customPrefs.functional = preferences.value.functional
    customPrefs.thirdParty = preferences.value.thirdParty
  }
})

const saveCustom = () => {
  saveCustomPreferences({
    functional: customPrefs.functional,
    thirdParty: customPrefs.thirdParty
  })
}

onMounted(() => {
  initialize()
})
</script>
