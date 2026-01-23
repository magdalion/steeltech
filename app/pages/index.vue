<template>
  <div>
    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-brand-secondary/30 via-brand-dark to-brand-dark"></div>
      <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,0.02) 35px, rgba(255,255,255,0.02) 70px)"></div>
      </div>
      <!-- Decorative Elements -->
      <div class="absolute top-20 right-10 w-64 h-64 bg-brand-primary/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 left-10 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl"></div>

      <div class="container mx-auto px-4 relative z-10 py-20">
        <div class="max-w-4xl">
          <span class="text-appear inline-block font-subtitle text-brand-primary text-2xl md:text-3xl mb-4 tracking-wide">
            {{ $t('home.hero.subtitle') }}
          </span>
          <h1 class="text-appear text-appear-delay-1 font-title text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold uppercase tracking-wider mb-6 leading-tight">
            {{ $t('home.hero.title1') }}<br />
            <span class="text-brand-primary">{{ $t('home.hero.title2') }}</span>
          </h1>
          <p class="text-appear text-appear-delay-2 text-lg md:text-xl text-brand-light/70 mb-8 max-w-2xl leading-relaxed">
            {{ $t('home.hero.description') }}
          </p>
          <div class="text-appear text-appear-delay-3 flex flex-col sm:flex-row gap-4">
            <NuxtLinkLocale
              to="/proizvodnja"
              class="inline-flex items-center justify-center px-8 py-4 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
            >
              {{ $t('home.hero.cta1') }}
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </NuxtLinkLocale>
            <NuxtLinkLocale
              to="/kontakt"
              class="inline-flex items-center justify-center px-8 py-4 bg-transparent border border-brand-light/30 text-brand-light font-title uppercase tracking-wide text-sm rounded hover:bg-white/5 hover:border-brand-light/50 transition-all duration-300"
            >
              {{ $t('home.hero.cta2') }}
            </NuxtLinkLocale>
          </div>
        </div>
      </div>

      <!-- Scroll Indicator -->
      <button
        @click="scrollToHighlights"
        class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce cursor-pointer hover:text-brand-primary transition-colors"
        aria-label="Scroll to content"
      >
        <svg class="w-6 h-6 text-brand-light/40 hover:text-brand-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
      </button>
    </section>

    <!-- Highlights Section -->
    <section id="highlights" class="py-16 bg-[#1a1a1a] border-y border-white/5 scroll-mt-[72px]">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">5</div>
            <div class="text-brand-light/60 text-lg font-subtitle uppercase tracking-wide">{{ $t('home.highlights.weldingTech') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">ISO</div>
            <div class="text-brand-light/60 text-lg font-subtitle uppercase tracking-wide">{{ $t('home.highlights.certifiedStandards') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">6kW</div>
            <div class="text-brand-light/60 text-lg font-subtitle uppercase tracking-wide">{{ $t('home.highlights.fiberLaser') }}</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">100%</div>
            <div class="text-brand-light/60 text-lg font-subtitle uppercase tracking-wide">{{ $t('home.highlights.qualityCommitment') }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Preview Section -->
    <section class="py-20 md:py-28">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <span class="inline-block font-subtitle text-brand-primary text-base uppercase tracking-wider mb-4">{{ $t('home.about.sectionTitle') }}</span>
            <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide mb-6">
              {{ $t('home.about.title1') }} <span class="text-brand-primary">{{ $t('home.about.title2') }}</span>
            </h2>
            <p class="text-brand-light/70 leading-relaxed mb-6">
              {{ $t('home.about.p1') }}
            </p>
            <p class="text-brand-light/70 leading-relaxed mb-8">
              {{ $t('home.about.p2') }}
            </p>
            <NuxtLinkLocale
              to="/o-nama"
              class="inline-flex items-center text-brand-primary font-title uppercase tracking-wide text-sm hover:underline"
            >
              {{ $t('common.learnMore') }}
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </NuxtLinkLocale>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div class="space-y-4">
              <NuxtImg
                src="/images/Steeltech_Section_1_3.JPG"
                alt="SteelTech rad"
                class="w-full h-48 object-cover rounded-lg"
                loading="lazy"
              />
              <NuxtImg
                src="/images/Steeltech_Section_2_1.JPG"
                alt="SteelTech zavarivanje"
                class="w-full h-32 object-cover rounded-lg"
                loading="lazy"
              />
            </div>
            <div class="space-y-4 pt-8">
              <NuxtImg
                src="/images/Steeltech_Section_1_12.JPG"
                alt="SteelTech konstrukcija"
                class="w-full h-32 object-cover rounded-lg"
                loading="lazy"
              />
              <NuxtImg
                src="/images/Steeltech_Section_2_4.JPG"
                alt="SteelTech oprema"
                class="w-full h-48 object-cover rounded-lg"
                loading="lazy"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Certificates Section -->
    <section class="pt-8 pb-20 md:pt-12 md:pb-28">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <span class="inline-block font-subtitle text-brand-primary text-base uppercase tracking-wider mb-4">{{ $t('home.certificates.sectionTitle') }}</span>
          <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide">
            {{ $t('home.certificates.title1') }} <span class="text-brand-primary">{{ $t('home.certificates.title2') }}</span>
          </h2>
          <p class="text-brand-light/60 mt-4 max-w-2xl mx-auto">
            {{ $t('home.certificates.description') }}
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          <!-- Certificate 1: ISO 9001 -->
          <div class="flex flex-col bg-[#2d2d2d] border border-white/10 rounded-lg p-6 md:p-8 text-center hover:border-brand-primary/50 transition-all duration-300">
            <img
              src="/images/q-cert-logo.png"
              alt="Q-CERT logo"
              class="h-16 mx-auto mb-6"
            />
            <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-2">
              EN ISO 9001:2015
            </span>
            <h3 class="font-title text-lg uppercase tracking-wide text-brand-light mb-6">
              {{ $t('home.certificates.iso9001') }}
            </h3>
            <a
              href="/certificates/steeltech-iso-9001.pdf"
              target="_blank"
              rel="noopener"
              class="mt-auto inline-flex items-center justify-center gap-3 text-brand-primary hover:text-brand-light transition-colors duration-300 font-subtitle text-lg"
            >
              <svg class="w-7 h-7" viewBox="0 0 48 48" fill="currentColor"><path d="M20.071,30.645c0,0.878-0.259,1.556-0.776,2.033c-0.518,0.479-1.252,0.717-2.205,0.717h-0.596V36h-2.122v-7.853h2.718c0.992,0,1.737,0.217,2.234,0.649C19.822,29.23,20.071,29.847,20.071,30.645z M16.494,31.666h0.387c0.319,0,0.572-0.09,0.76-0.27c0.188-0.179,0.282-0.426,0.282-0.74c0-0.53-0.293-0.795-0.881-0.795h-0.548V31.666z"/><path d="M27.988,31.907c0,1.311-0.361,2.32-1.083,3.029C26.184,35.646,25.17,36,23.863,36h-2.541v-7.853h2.718c1.26,0,2.233,0.322,2.919,0.967C27.645,29.759,27.988,30.689,27.988,31.907z M25.786,31.982c0-0.72-0.142-1.253-0.427-1.601c-0.284-0.348-0.717-0.521-1.297-0.521h-0.618v4.398h0.473c0.645,0,1.117-0.188,1.418-0.562S25.786,32.752,25.786,31.982z"/><path d="M31.484,36h-2.089v-7.853h4.641v1.702h-2.551v1.499h2.353v1.702h-2.353V36z"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="29,2 29,14 41,14"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="41,23 41,14 29,2 7,2 7,23"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="7,41 7,46 41,46 41,41"/><rect x="2" y="23" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="44" height="18"/></svg>
              {{ $t('common.downloadPdf') }}
            </a>
          </div>

          <!-- Certificate 2: EN 1090 -->
          <div class="flex flex-col bg-[#2d2d2d] border border-white/10 rounded-lg p-6 md:p-8 text-center hover:border-brand-primary/50 transition-all duration-300">
            <img
              src="/images/q-cert-logo.png"
              alt="Q-CERT logo"
              class="h-16 mx-auto mb-6"
            />
            <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-2">
              EN 1090 - FPC Sistema 2+
            </span>
            <h3 class="font-title text-lg uppercase tracking-wide text-brand-light mb-6">
              {{ $t('home.certificates.en1090') }}
            </h3>
            <a
              href="/certificates/steeltech-en-1090-fpc.pdf"
              target="_blank"
              rel="noopener"
              class="mt-auto inline-flex items-center justify-center gap-3 text-brand-primary hover:text-brand-light transition-colors duration-300 font-subtitle text-lg"
            >
              <svg class="w-7 h-7" viewBox="0 0 48 48" fill="currentColor"><path d="M20.071,30.645c0,0.878-0.259,1.556-0.776,2.033c-0.518,0.479-1.252,0.717-2.205,0.717h-0.596V36h-2.122v-7.853h2.718c0.992,0,1.737,0.217,2.234,0.649C19.822,29.23,20.071,29.847,20.071,30.645z M16.494,31.666h0.387c0.319,0,0.572-0.09,0.76-0.27c0.188-0.179,0.282-0.426,0.282-0.74c0-0.53-0.293-0.795-0.881-0.795h-0.548V31.666z"/><path d="M27.988,31.907c0,1.311-0.361,2.32-1.083,3.029C26.184,35.646,25.17,36,23.863,36h-2.541v-7.853h2.718c1.26,0,2.233,0.322,2.919,0.967C27.645,29.759,27.988,30.689,27.988,31.907z M25.786,31.982c0-0.72-0.142-1.253-0.427-1.601c-0.284-0.348-0.717-0.521-1.297-0.521h-0.618v4.398h0.473c0.645,0,1.117-0.188,1.418-0.562S25.786,32.752,25.786,31.982z"/><path d="M31.484,36h-2.089v-7.853h4.641v1.702h-2.551v1.499h2.353v1.702h-2.353V36z"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="29,2 29,14 41,14"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="41,23 41,14 29,2 7,2 7,23"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="7,41 7,46 41,46 41,41"/><rect x="2" y="23" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="44" height="18"/></svg>
              {{ $t('common.downloadPdf') }}
            </a>
          </div>

          <!-- Certificate 3: EN ISO 3834 -->
          <div class="flex flex-col bg-[#2d2d2d] border border-white/10 rounded-lg p-6 md:p-8 text-center hover:border-brand-primary/50 transition-all duration-300">
            <img
              src="/images/q-cert-logo.png"
              alt="Q-CERT logo"
              class="h-16 mx-auto mb-6"
            />
            <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-2">
              EN ISO 3834-2
            </span>
            <h3 class="font-title text-lg uppercase tracking-wide text-brand-light mb-6">
              {{ $t('home.certificates.en3834') }}
            </h3>
            <a
              href="/certificates/steeltech-en-3834-welding.pdf"
              target="_blank"
              rel="noopener"
              class="mt-auto inline-flex items-center justify-center gap-3 text-brand-primary hover:text-brand-light transition-colors duration-300 font-subtitle text-lg"
            >
              <svg class="w-7 h-7" viewBox="0 0 48 48" fill="currentColor"><path d="M20.071,30.645c0,0.878-0.259,1.556-0.776,2.033c-0.518,0.479-1.252,0.717-2.205,0.717h-0.596V36h-2.122v-7.853h2.718c0.992,0,1.737,0.217,2.234,0.649C19.822,29.23,20.071,29.847,20.071,30.645z M16.494,31.666h0.387c0.319,0,0.572-0.09,0.76-0.27c0.188-0.179,0.282-0.426,0.282-0.74c0-0.53-0.293-0.795-0.881-0.795h-0.548V31.666z"/><path d="M27.988,31.907c0,1.311-0.361,2.32-1.083,3.029C26.184,35.646,25.17,36,23.863,36h-2.541v-7.853h2.718c1.26,0,2.233,0.322,2.919,0.967C27.645,29.759,27.988,30.689,27.988,31.907z M25.786,31.982c0-0.72-0.142-1.253-0.427-1.601c-0.284-0.348-0.717-0.521-1.297-0.521h-0.618v4.398h0.473c0.645,0,1.117-0.188,1.418-0.562S25.786,32.752,25.786,31.982z"/><path d="M31.484,36h-2.089v-7.853h4.641v1.702h-2.551v1.499h2.353v1.702h-2.353V36z"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="29,2 29,14 41,14"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="41,23 41,14 29,2 7,2 7,23"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" points="7,41 7,46 41,46 41,41"/><rect x="2" y="23" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="44" height="18"/></svg>
              {{ $t('common.downloadPdf') }}
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Preview Section -->
    <section class="py-20 md:py-28 bg-[#1a1a1a]">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <span class="inline-block font-subtitle text-brand-primary text-base uppercase tracking-wider mb-4">{{ $t('home.services.sectionTitle') }}</span>
          <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide">
            {{ $t('home.services.title1') }} <span class="text-brand-primary">{{ $t('home.services.title2') }}</span>
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
          <!-- Service 1 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_1_3.JPG"
                :alt="$t('home.services.steelConstructions.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('home.services.steelConstructions.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                {{ $t('home.services.steelConstructions.description') }}
              </p>
            </div>
          </div>

          <!-- Service 2 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_2_1.JPG"
                :alt="$t('home.services.welding.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('home.services.welding.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                {{ $t('home.services.welding.description') }}
              </p>
            </div>
          </div>

          <!-- Service 3 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_3_1.JPG"
                :alt="$t('home.services.laserCutting.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('home.services.laserCutting.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                {{ $t('home.services.laserCutting.description') }}
              </p>
            </div>
          </div>

          <!-- Service 4 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_section_4_1.JPG"
                :alt="$t('home.services.antiCorrosion.title')"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                {{ $t('home.services.antiCorrosion.title') }}
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                {{ $t('home.services.antiCorrosion.description') }}
              </p>
            </div>
          </div>
        </div>

        <div class="text-center">
          <NuxtLinkLocale
            to="/proizvodnja"
            class="inline-flex items-center justify-center px-8 py-4 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
          >
            {{ $t('common.viewAllServices') }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </NuxtLinkLocale>
        </div>
      </div>
    </section>

    <!-- Gallery Preview Section -->
    <section class="py-20 md:py-28">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <span class="inline-block font-subtitle text-brand-primary text-base uppercase tracking-wider mb-4">{{ $t('home.gallery.sectionTitle') }}</span>
          <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide">
            {{ $t('home.gallery.title1') }} <span class="text-brand-primary">{{ $t('home.gallery.title2') }}</span>
          </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10">
          <div
            v-for="(image, index) in galleryPreview"
            :key="index"
            class="group relative aspect-square overflow-hidden rounded-lg cursor-pointer"
          >
            <NuxtLinkLocale :to="'/galerija'">
              <NuxtImg
                :src="image.src"
                :alt="image.alt"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                <svg
                  class="w-10 h-10 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                </svg>
              </div>
            </NuxtLinkLocale>
          </div>
        </div>

        <div class="text-center">
          <NuxtLinkLocale
            to="/galerija"
            class="inline-flex items-center text-brand-primary font-title uppercase tracking-wide text-sm hover:underline"
          >
            {{ $t('common.viewFullGallery') }}
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </NuxtLinkLocale>
        </div>
      </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="py-20 md:py-28 bg-gradient-to-r from-brand-secondary to-brand-primary relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(255,255,255,0.05) 35px, rgba(255,255,255,0.05) 70px)"></div>
      </div>
      <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide mb-4 text-white">
          {{ $t('home.cta.title') }}
        </h2>
        <p class="text-white/80 mb-8 max-w-xl mx-auto text-lg">
          {{ $t('home.cta.description') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <NuxtLinkLocale
            to="/kontakt"
            class="inline-flex items-center justify-center px-8 py-4 bg-white text-brand-dark font-title uppercase tracking-wide text-sm rounded hover:bg-brand-light transition-colors duration-300"
          >
            {{ $t('common.sendInquiry') }}
          </NuxtLinkLocale>
          <a
            href="tel:+38764404198"
            class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-title uppercase tracking-wide text-sm rounded hover:bg-white/10 transition-colors duration-300"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            +387 64 404 1908
          </a>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
const { t } = useI18n()
const localePath = useLocalePath()

function scrollToHighlights() {
  document.getElementById('highlights')?.scrollIntoView({ behavior: 'smooth', block: 'start' })
}

const galleryPreview = [
  { src: '/images/Steeltech_Section_1_3.JPG', alt: 'Steel structure' },
  { src: '/images/Steeltech_Section_1_12.JPG', alt: 'Steel hall' },
  { src: '/images/Steeltech_Section_2_1.JPG', alt: 'Welding & Assembly' },
  { src: '/images/Steeltech_Section_2_4.JPG', alt: 'Welding & Assembly work' },
  { src: '/images/Steeltech_Section_1_14.JPG', alt: 'Construction' },
  { src: '/images/Steeltech_Section_3_1.JPG', alt: 'Laser cutting' },
  { src: '/images/Steeltech_Section_1_7.JPG', alt: 'Project' },
  { src: '/images/Steeltech_section_4_1.JPG', alt: 'Anti-corrosion protection' }
]

useHead({
  title: t('seo.home.title'),
  meta: [
    { name: 'description', content: t('seo.home.description') },
    { name: 'keywords', content: t('seo.home.keywords') },
    { property: 'og:title', content: t('seo.home.title') },
    { property: 'og:description', content: t('seo.home.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/')}` },
    { name: 'twitter:title', content: t('seo.home.title') },
    { name: 'twitter:description', content: t('seo.home.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/')}` }
  ]
})
</script>
