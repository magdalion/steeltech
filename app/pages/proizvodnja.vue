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
          <span class="text-brand-primary">{{ $t('production.hero.title') }}</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          {{ $t('production.hero.subtitle') }}
        </p>
      </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Service Card 1: Steel Structures -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300 flex flex-col">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_1_3.JPG"
                :alt="$t('production.services.steelConstructions.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('production.services.steelConstructions.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                {{ $t('production.services.steelConstructions.description') }}
              </p>
              <NuxtLinkLocale
                to="/galerija?kategorija=celicne-konstrukcije"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline mt-auto"
              >
                {{ $t('common.viewGallery') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLinkLocale>
            </div>
          </div>

          <!-- Service Card 2: Welding Technology -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300 flex flex-col">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_2_1.JPG"
                :alt="$t('production.services.welding.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('production.services.welding.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                {{ $t('production.services.welding.description') }}
              </p>
              <NuxtLinkLocale
                to="/galerija?kategorija=zavarivanje"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline mt-auto"
              >
                {{ $t('common.viewGallery') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLinkLocale>
            </div>
          </div>

          <!-- Service Card 3: Laser Cutting -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300 flex flex-col">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_3_1.JPG"
                :alt="$t('production.services.laserCutting.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('production.services.laserCutting.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                {{ $t('production.services.laserCutting.description') }}
              </p>
              <NuxtLinkLocale
                to="/galerija?kategorija=lasersko-rezanje"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline mt-auto"
              >
                {{ $t('common.viewGallery') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLinkLocale>
            </div>
          </div>

          <!-- Service Card 4: Anti-Corrosion -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300 flex flex-col">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_section_4_1.JPG"
                :alt="$t('production.services.antiCorrosion.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('production.services.antiCorrosion.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                {{ $t('production.services.antiCorrosion.description') }}
              </p>
              <NuxtLinkLocale
                to="/galerija?kategorija=antikorozivna-zastita"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline mt-auto"
              >
                {{ $t('common.viewGallery') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLinkLocale>
            </div>
          </div>

          <!-- Service Card 5: Transport -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300 flex flex-col">
            <div class="relative h-56 overflow-hidden bg-brand-dark flex items-center justify-center">
              <svg class="w-24 h-24 text-brand-primary/30 group-hover:text-brand-primary/50 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
              </svg>
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('production.services.transport.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                {{ $t('production.services.transport.description') }}
              </p>
              <NuxtLinkLocale
                to="/kontakt"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline mt-auto"
              >
                {{ $t('common.contactUs') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLinkLocale>
            </div>
          </div>

          <!-- CTA Card -->
          <div class="bg-gradient-to-br from-brand-secondary to-brand-primary rounded-lg p-6 flex flex-col justify-center">
            <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-white">
              {{ $t('production.cta.title') }}
            </h3>
            <p class="text-white/80 text-sm leading-relaxed mb-4">
              {{ $t('production.cta.description') }}
            </p>
            <NuxtLinkLocale
              to="/kontakt"
              class="inline-flex items-center justify-center px-6 py-3 bg-white text-brand-dark font-title uppercase tracking-wide text-sm rounded hover:bg-brand-light transition-colors duration-300"
            >
              {{ $t('common.sendInquiry') }}
            </NuxtLinkLocale>
          </div>
        </div>
      </div>
    </section>

    <!-- Equipment Section -->
    <section class="py-16 bg-[#1a1a1a]">
      <div class="container mx-auto px-4">
        <h2 class="font-title text-2xl md:text-3xl uppercase tracking-wide mb-12 text-center">
          {{ $t('production.equipment.title1') }} <span class="text-brand-primary">{{ $t('production.equipment.title2') }}</span>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">6kW</div>
            <div class="text-brand-light/60 text-sm">{{ $t('production.equipment.fiberLaser') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">3m</div>
            <div class="text-brand-light/60 text-sm">{{ $t('production.equipment.pressBreak') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">100mm</div>
            <div class="text-brand-light/60 text-sm">{{ $t('production.equipment.maxDrill') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">5</div>
            <div class="text-brand-light/60 text-sm">{{ $t('production.equipment.weldingTech') }}</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()
const localePath = useLocalePath()

useHead({
  title: t('seo.production.title'),
  meta: [
    { name: 'description', content: t('seo.production.description') },
    { name: 'keywords', content: t('seo.production.keywords') },
    { property: 'og:title', content: t('seo.production.title') },
    { property: 'og:description', content: t('seo.production.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/proizvodnja')}` },
    { name: 'twitter:title', content: t('seo.production.title') },
    { name: 'twitter:description', content: t('seo.production.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/proizvodnja')}` }
  ]
})
</script>
