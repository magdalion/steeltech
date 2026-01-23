<template>
  <div>
    <!-- Hero Section -->
    <section class="relative py-12 md:py-16 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-brand-secondary/20 to-brand-dark"></div>
      <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 50px, rgba(255,255,255,0.03) 50px, rgba(255,255,255,0.03) 100px)"></div>
      </div>
      <div class="container mx-auto px-4 relative z-10">
        <h1 class="font-title text-4xl md:text-5xl lg:text-6xl font-bold text-center uppercase tracking-wider mb-6">
          <span class="text-brand-primary">{{ $t('location.hero.title') }}</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          {{ $t('location.hero.subtitle') }}
        </p>
      </div>
    </section>

    <!-- Location Content -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
          <!-- Location Info -->
          <div>
            <h2 class="font-title text-2xl md:text-3xl uppercase tracking-wide mb-8">
              {{ $t('location.howToFind.title1') }} <span class="text-brand-primary">{{ $t('location.howToFind.title2') }}</span>
            </h2>

            <!-- Address Card -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 mb-6">
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                  <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">{{ $t('location.address.title') }}</h3>
                  <p class="text-brand-light/70 leading-relaxed">
                    {{ $t('location.address.street') }}<br />
                    {{ $t('location.address.city') }}<br />
                    {{ $t('location.address.country') }}
                  </p>
                </div>
              </div>
            </div>

            <!-- Directions -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
              <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-light">{{ $t('location.directions.title') }}</h3>
              <ul class="space-y-3 text-brand-light/70">
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>{{ $t('location.directions.point1') }}</span>
                </li>
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>{{ $t('location.directions.point2') }}</span>
                </li>
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>{{ $t('location.directions.point3') }}</span>
                </li>
              </ul>
            </div>

          </div>

          <!-- Map -->
          <div>
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden h-[400px] lg:h-[500px]">
              <!-- Map iframe - only shown when third-party cookies are accepted -->
              <iframe
                v-if="canShowMap"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2861.0!2d18.0394!3d44.4267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475f3a8b8c8c8c8b%3A0x8c8c8c8c8c8c8c8c!2sBrankovi%C4%87i%2C%20%C5%BDep%C4%8De%2072230%2C%20Bosnia%20and%20Herzegovina!5e0!3m2!1sen!2s!4v1234567890"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                :title="$t('location.mapTitle')"
              ></iframe>
              <!-- Cookie consent placeholder - shown when third-party cookies are not accepted -->
              <div
                v-else
                class="h-full flex flex-col items-center justify-center p-8 text-center"
              >
                <div class="w-16 h-16 mb-4 text-brand-primary">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                  </svg>
                </div>
                <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">
                  {{ $t('location.cookieRequired.title') }}
                </h3>
                <p class="text-brand-light/60 text-sm mb-6 max-w-sm">
                  {{ $t('location.cookieRequired.description') }}
                </p>
                <button
                  @click="acceptThirdPartyCookies"
                  class="inline-flex items-center gap-2 px-6 py-3 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  {{ $t('location.cookieRequired.button') }}
                </button>
              </div>
            </div>
            <div class="mt-4">
              <a
                href="https://www.google.com/maps/dir//Brankovi%C4%87i,+%C5%BDep%C4%8De+72230,+Bosnia+and+Herzegovina"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 px-6 py-3 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                {{ $t('common.openInGoogleMaps') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()
const localePath = useLocalePath()
const { preferences, saveCustomPreferences, hasConsented } = useCookieConsent()

// Check if we can show the map (third-party cookies accepted)
const canShowMap = computed(() => {
  return preferences.value.thirdParty
})

// Accept third-party cookies when user clicks the button
const acceptThirdPartyCookies = () => {
  saveCustomPreferences({
    functional: preferences.value.functional,
    thirdParty: true
  })
}

useHead({
  title: t('seo.location.title'),
  meta: [
    { name: 'description', content: t('seo.location.description') },
    { name: 'keywords', content: t('seo.location.keywords') },
    { property: 'og:title', content: t('seo.location.title') },
    { property: 'og:description', content: t('seo.location.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/lokacija')}` },
    { name: 'twitter:title', content: t('seo.location.title') },
    { name: 'twitter:description', content: t('seo.location.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/lokacija')}` }
  ]
})
</script>
