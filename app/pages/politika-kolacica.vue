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
          <span class="text-brand-primary">{{ $t('cookies.hero.title') }}</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          {{ $t('cookies.hero.subtitle') }}
        </p>
      </div>
    </section>

    <!-- Content -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
          <p class="text-brand-light/60 text-sm mb-8">
            {{ $t('cookies.lastUpdated') }}: {{ $t('cookies.updateDate') }}
          </p>

          <!-- What are Cookies -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.what.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('cookies.sections.what.content') }}
            </p>
          </div>

          <!-- Types of Cookies -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.types.title') }}
            </h2>
            <p class="text-brand-light/80 mb-6">{{ $t('cookies.sections.types.intro') }}</p>

            <!-- Necessary Cookies -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 mb-4">
              <h3 class="font-subtitle text-lg font-semibold text-brand-light mb-2">
                {{ $t('cookies.sections.types.necessary.title') }}
              </h3>
              <p class="text-brand-light/70 text-sm mb-3">{{ $t('cookies.sections.types.necessary.description') }}</p>
              <div class="overflow-x-auto">
                <table class="w-full text-sm">
                  <thead>
                    <tr class="text-left text-brand-light/60 border-b border-white/10">
                      <th class="pb-2 pr-4">{{ $t('cookies.table.name') }}</th>
                      <th class="pb-2 pr-4">{{ $t('cookies.table.purpose') }}</th>
                      <th class="pb-2">{{ $t('cookies.table.duration') }}</th>
                    </tr>
                  </thead>
                  <tbody class="text-brand-light/80">
                    <tr class="border-b border-white/5">
                      <td class="py-2 pr-4">cookieConsent</td>
                      <td class="py-2 pr-4">{{ $t('cookies.sections.types.necessary.items.consent') }}</td>
                      <td class="py-2">30 {{ $t('cookies.days') }}</td>
                    </tr>
                    <tr>
                      <td class="py-2 pr-4">CSRF Token</td>
                      <td class="py-2 pr-4">{{ $t('cookies.sections.types.necessary.items.csrf') }}</td>
                      <td class="py-2">{{ $t('cookies.session') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Functional Cookies -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 mb-4">
              <h3 class="font-subtitle text-lg font-semibold text-brand-light mb-2">
                {{ $t('cookies.sections.types.functional.title') }}
              </h3>
              <p class="text-brand-light/70 text-sm mb-3">{{ $t('cookies.sections.types.functional.description') }}</p>
              <div class="overflow-x-auto">
                <table class="w-full text-sm">
                  <thead>
                    <tr class="text-left text-brand-light/60 border-b border-white/10">
                      <th class="pb-2 pr-4">{{ $t('cookies.table.name') }}</th>
                      <th class="pb-2 pr-4">{{ $t('cookies.table.purpose') }}</th>
                      <th class="pb-2">{{ $t('cookies.table.duration') }}</th>
                    </tr>
                  </thead>
                  <tbody class="text-brand-light/80">
                    <tr>
                      <td class="py-2 pr-4">i18n_redirected</td>
                      <td class="py-2 pr-4">{{ $t('cookies.sections.types.functional.items.language') }}</td>
                      <td class="py-2">1 {{ $t('cookies.year') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Third-Party Cookies -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
              <h3 class="font-subtitle text-lg font-semibold text-brand-light mb-2">
                {{ $t('cookies.sections.types.thirdParty.title') }}
              </h3>
              <p class="text-brand-light/70 text-sm mb-3">{{ $t('cookies.sections.types.thirdParty.description') }}</p>
              <div class="overflow-x-auto">
                <table class="w-full text-sm">
                  <thead>
                    <tr class="text-left text-brand-light/60 border-b border-white/10">
                      <th class="pb-2 pr-4">{{ $t('cookies.table.provider') }}</th>
                      <th class="pb-2 pr-4">{{ $t('cookies.table.purpose') }}</th>
                      <th class="pb-2">{{ $t('cookies.table.moreInfo') }}</th>
                    </tr>
                  </thead>
                  <tbody class="text-brand-light/80">
                    <tr>
                      <td class="py-2 pr-4">Google Maps</td>
                      <td class="py-2 pr-4">{{ $t('cookies.sections.types.thirdParty.items.maps') }}</td>
                      <td class="py-2">
                        <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer" class="text-brand-primary hover:underline">
                          {{ $t('cookies.sections.types.thirdParty.googlePolicy') }}
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Managing Cookies -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.manage.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed mb-4">
              {{ $t('cookies.sections.manage.content') }}
            </p>
            <button
              @click="openCookieSettings"
              class="inline-flex items-center gap-2 px-6 py-3 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              {{ $t('cookies.sections.manage.button') }}
            </button>
            <p class="text-brand-light/70 text-sm mt-4">
              {{ $t('cookies.sections.manage.browserNote') }}
            </p>
          </div>

          <!-- Google Maps -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.googleMaps.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('cookies.sections.googleMaps.content') }}
            </p>
          </div>

          <!-- Policy Changes -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.changes.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('cookies.sections.changes.content') }}
            </p>
          </div>

          <!-- Contact -->
          <div class="prose-section">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('cookies.sections.contact.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('cookies.sections.contact.content') }}
              <a href="mailto:dominik.jukic@steeltech.ba" class="text-brand-primary hover:underline">dominik.jukic@steeltech.ba</a>
            </p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()
const localePath = useLocalePath()
const { openSettings } = useCookieConsent()

const openCookieSettings = () => {
  openSettings()
}

useHead({
  title: t('seo.cookies.title'),
  meta: [
    { name: 'description', content: t('seo.cookies.description') },
    { name: 'keywords', content: t('seo.cookies.keywords') },
    { property: 'og:title', content: t('seo.cookies.title') },
    { property: 'og:description', content: t('seo.cookies.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/politika-kolacica')}` },
    { name: 'twitter:title', content: t('seo.cookies.title') },
    { name: 'twitter:description', content: t('seo.cookies.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/politika-kolacica')}` }
  ]
})
</script>
