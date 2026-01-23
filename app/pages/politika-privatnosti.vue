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
          <span class="text-brand-primary">{{ $t('privacy.hero.title') }}</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          {{ $t('privacy.hero.subtitle') }}
        </p>
      </div>
    </section>

    <!-- Content -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
          <p class="text-brand-light/60 text-sm mb-8">
            {{ $t('privacy.lastUpdated') }}: {{ $t('privacy.updateDate') }}
          </p>

          <!-- Introduction -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.intro.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.intro.content') }}
            </p>
          </div>

          <!-- Definitions -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.definitions.title') }}
            </h2>
            <ul class="space-y-3 text-brand-light/80">
              <li v-for="(def, index) in definitionKeys" :key="index" class="flex gap-2">
                <span class="text-brand-primary">-</span>
                <span><strong>{{ $t(`privacy.sections.definitions.items.${def}.term`) }}:</strong> {{ $t(`privacy.sections.definitions.items.${def}.definition`) }}</span>
              </li>
            </ul>
          </div>

          <!-- Data Controller -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.controller.title') }}
            </h2>
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
              <p class="text-brand-light/80 mb-2"><strong>{{ $t('privacy.sections.controller.company') }}</strong></p>
              <p class="text-brand-light/70">{{ $t('privacy.sections.controller.address') }}</p>
              <p class="text-brand-light/70">{{ $t('privacy.sections.controller.city') }}</p>
              <p class="text-brand-light/70 mt-2">
                {{ $t('privacy.sections.controller.emailLabel') }}:
                <a href="mailto:dominik.jukic@steeltech.ba" class="text-brand-primary hover:underline">dominik.jukic@steeltech.ba</a>
              </p>
              <p class="text-brand-light/70">
                {{ $t('privacy.sections.controller.website') }}:
                <a href="https://steeltech.ba" class="text-brand-primary hover:underline">steeltech.ba</a>
              </p>
            </div>
          </div>

          <!-- Types of Data -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.dataTypes.title') }}
            </h2>
            <p class="text-brand-light/80 mb-4">{{ $t('privacy.sections.dataTypes.intro') }}</p>
            <ul class="space-y-2 text-brand-light/80">
              <li v-for="(item, index) in dataTypeKeys" :key="index" class="flex gap-2">
                <span class="text-brand-primary">-</span>
                <span>{{ $t(`privacy.sections.dataTypes.items.${item}`) }}</span>
              </li>
            </ul>
          </div>

          <!-- Purpose of Processing -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.purpose.title') }}
            </h2>
            <p class="text-brand-light/80 mb-4">{{ $t('privacy.sections.purpose.intro') }}</p>
            <ul class="space-y-2 text-brand-light/80">
              <li v-for="(item, index) in purposeKeys" :key="index" class="flex gap-2">
                <span class="text-brand-primary">-</span>
                <span>{{ $t(`privacy.sections.purpose.items.${item}`) }}</span>
              </li>
            </ul>
          </div>

          <!-- Data Retention -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.retention.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.retention.content') }}
            </p>
          </div>

          <!-- User Rights -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.rights.title') }}
            </h2>
            <p class="text-brand-light/80 mb-4">{{ $t('privacy.sections.rights.intro') }}</p>
            <ul class="space-y-2 text-brand-light/80">
              <li v-for="(item, index) in rightsKeys" :key="index" class="flex gap-2">
                <span class="text-brand-primary">-</span>
                <span>{{ $t(`privacy.sections.rights.items.${item}`) }}</span>
              </li>
            </ul>
            <p class="text-brand-light/80 mt-4">{{ $t('privacy.sections.rights.contact') }}</p>
          </div>

          <!-- Data Security -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.security.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.security.content') }}
            </p>
          </div>

          <!-- Cookies -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.cookies.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.cookies.content') }}
              <NuxtLinkLocale to="/politika-kolacica" class="text-brand-primary hover:underline">
                {{ $t('privacy.sections.cookies.linkText') }}
              </NuxtLinkLocale>.
            </p>
          </div>

          <!-- Third-Party Links -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.thirdParty.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.thirdParty.content') }}
            </p>
          </div>

          <!-- Policy Changes -->
          <div class="prose-section mb-12">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.changes.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.changes.content') }}
            </p>
          </div>

          <!-- Contact -->
          <div class="prose-section">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-4 text-brand-primary">
              {{ $t('privacy.sections.contact.title') }}
            </h2>
            <p class="text-brand-light/80 leading-relaxed">
              {{ $t('privacy.sections.contact.content') }}
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

// Static keys for v-for loops
const definitionKeys = ['dataSubject', 'personalData', 'processing', 'controller']
const dataTypeKeys = ['name', 'email', 'phone', 'message', 'ip', 'browser']
const purposeKeys = ['respond', 'improve', 'legal']
const rightsKeys = ['access', 'rectification', 'erasure', 'restriction', 'portability', 'objection']

useHead({
  title: t('seo.privacy.title'),
  meta: [
    { name: 'description', content: t('seo.privacy.description') },
    { name: 'keywords', content: t('seo.privacy.keywords') },
    { property: 'og:title', content: t('seo.privacy.title') },
    { property: 'og:description', content: t('seo.privacy.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/politika-privatnosti')}` },
    { name: 'twitter:title', content: t('seo.privacy.title') },
    { name: 'twitter:description', content: t('seo.privacy.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/politika-privatnosti')}` }
  ]
})
</script>
