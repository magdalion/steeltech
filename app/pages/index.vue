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
          <span class="text-appear inline-block font-subtitle text-brand-primary text-lg md:text-xl mb-4 tracking-wide">
            STEELTECH ŽEPČE
          </span>
          <h1 class="text-appear text-appear-delay-1 font-title text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold uppercase tracking-wider mb-6 leading-tight">
            Pouzdana<br />
            <span class="text-brand-primary">Snaga Čelika</span>
          </h1>
          <p class="text-appear text-appear-delay-2 text-lg md:text-xl text-brand-light/70 mb-8 max-w-2xl leading-relaxed">
            Specijalizirani za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja. Rješenja koja zadovoljavaju najviše industrijske standarde.
          </p>
          <div class="text-appear text-appear-delay-3 flex flex-col sm:flex-row gap-4">
            <NuxtLink
              to="/proizvodnja"
              class="inline-flex items-center justify-center px-8 py-4 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
            >
              Naša Proizvodnja
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </NuxtLink>
            <NuxtLink
              to="/kontakt"
              class="inline-flex items-center justify-center px-8 py-4 bg-transparent border border-brand-light/30 text-brand-light font-title uppercase tracking-wide text-sm rounded hover:bg-white/5 hover:border-brand-light/50 transition-all duration-300"
            >
              Kontaktirajte Nas
            </NuxtLink>
          </div>
        </div>
      </div>

      <!-- Scroll Indicator -->
      <button
        @click="scrollToHighlights"
        class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer hover:text-brand-primary transition-colors"
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
            <div class="text-brand-light/60 text-sm font-subtitle uppercase tracking-wide">Tehnologija Zavarivanja</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">ISO</div>
            <div class="text-brand-light/60 text-sm font-subtitle uppercase tracking-wide">Certificirani Standardi</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">6kW</div>
            <div class="text-brand-light/60 text-sm font-subtitle uppercase tracking-wide">Fiber Laser</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">100%</div>
            <div class="text-brand-light/60 text-sm font-subtitle uppercase tracking-wide">Predanost Kvaliteti</div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Preview Section -->
    <section class="py-20 md:py-28">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-4">O Nama</span>
            <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide mb-6">
              Mlada Porodična <span class="text-brand-primary">Firma</span>
            </h2>
            <p class="text-brand-light/70 leading-relaxed mb-6">
              Steeltech Žepče spaja znanje, modernu tehnologiju i strast prema metalu. Kontinuirano ulažemo u savremenu opremu i stručan kadar, jer vjerujemo da kvalitet počinje od ljudi.
            </p>
            <p class="text-brand-light/70 leading-relaxed mb-8">
              Naš rad je u potpunosti usklađen sa ISO standardima, što garantuje sigurnost, preciznost i dugotrajnost svakog projekta.
            </p>
            <NuxtLink
              to="/o-nama"
              class="inline-flex items-center text-brand-primary font-title uppercase tracking-wide text-sm hover:underline"
            >
              Saznaj Više
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </NuxtLink>
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

    <!-- Services Preview Section -->
    <section class="py-20 md:py-28 bg-[#1a1a1a]">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-4">Naše Usluge</span>
          <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide">
            Što <span class="text-brand-primary">Radimo</span>
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
          <!-- Service 1 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_1_3.JPG"
                alt="Čelične konstrukcije"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                Čelične Konstrukcije
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                Čelične hale, skladišta, balkoni, ograde i stubišta.
              </p>
            </div>
          </div>

          <!-- Service 2 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_2_1.JPG"
                alt="Zavarivanje"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                Zavarivanje
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                MIG, MAG, TIG, REL i lasersko zavarivanje.
              </p>
            </div>
          </div>

          <!-- Service 3 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_3_1.JPG"
                alt="Lasersko rezanje"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                Lasersko Rezanje
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                6kW fiber laser, apkant preša, bušenje.
              </p>
            </div>
          </div>

          <!-- Service 4 -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-40 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_section_4_1.JPG"
                alt="Antikorozivna zaštita"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-5">
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light group-hover:text-brand-primary transition-colors">
                Antikorozivna Zaštita
              </h3>
              <p class="text-brand-light/60 text-sm line-clamp-2">
                Vruće cinčanje, farbanje, plastifikacija.
              </p>
            </div>
          </div>
        </div>

        <div class="text-center">
          <NuxtLink
            to="/proizvodnja"
            class="inline-flex items-center justify-center px-8 py-4 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded hover:bg-brand-secondary transition-colors duration-300"
          >
            Pogledaj Sve Usluge
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </NuxtLink>
        </div>
      </div>
    </section>

    <!-- Gallery Preview Section -->
    <section class="py-20 md:py-28">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <span class="inline-block font-subtitle text-brand-primary text-sm uppercase tracking-wider mb-4">Galerija</span>
          <h2 class="font-title text-3xl md:text-4xl uppercase tracking-wide">
            Naši <span class="text-brand-primary">Projekti</span>
          </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10">
          <div
            v-for="(image, index) in galleryPreview"
            :key="index"
            class="group relative aspect-square overflow-hidden rounded-lg cursor-pointer"
          >
            <NuxtLink :to="'/galerija'">
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
            </NuxtLink>
          </div>
        </div>

        <div class="text-center">
          <NuxtLink
            to="/galerija"
            class="inline-flex items-center text-brand-primary font-title uppercase tracking-wide text-sm hover:underline"
          >
            Pogledaj Cijelu Galeriju
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </NuxtLink>
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
          Imate Projekat?
        </h2>
        <p class="text-white/80 mb-8 max-w-xl mx-auto text-lg">
          Kontaktirajte nas za besplatnu procjenu i ponudu. Naš tim je spreman pomoći vam u realizaciji vašeg projekta.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <NuxtLink
            to="/kontakt"
            class="inline-flex items-center justify-center px-8 py-4 bg-white text-brand-dark font-title uppercase tracking-wide text-sm rounded hover:bg-brand-light transition-colors duration-300"
          >
            Pošalji Upit
          </NuxtLink>
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
function scrollToHighlights() {
  document.getElementById('highlights')?.scrollIntoView({ behavior: 'smooth', block: 'start' })
}

const galleryPreview = [
  { src: '/images/Steeltech_Section_1_3.JPG', alt: 'Čelična konstrukcija' },
  { src: '/images/Steeltech_Section_1_12.JPG', alt: 'Čelična hala' },
  { src: '/images/Steeltech_Section_2_1.JPG', alt: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_4.JPG', alt: 'Zavarivački rad' },
  { src: '/images/Steeltech_Section_1_14.JPG', alt: 'Konstrukcija' },
  { src: '/images/Steeltech_Section_3_1.JPG', alt: 'Lasersko rezanje' },
  { src: '/images/Steeltech_Section_1_7.JPG', alt: 'Projekt' },
  { src: '/images/Steeltech_section_4_1.JPG', alt: 'Antikorozivna zaštita' }
]

useHead({
  title: 'SteelTech - Pouzdana Snaga Čelika | Čelične Konstrukcije Žepče',
  meta: [
    { name: 'description', content: 'SteelTech Žepče - specijalizirani za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja. ISO certificirani standardi, moderna oprema, 6kW fiber laser.' },
    { name: 'keywords', content: 'čelične konstrukcije, zavarivanje, lasersko rezanje, Žepče, BiH, ISO certifikat, MIG, MAG, TIG, antikorozivna zaštita' },
    { property: 'og:title', content: 'SteelTech - Pouzdana Snaga Čelika' },
    { property: 'og:description', content: 'Specijalizirani za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja. ISO certificirani standardi.' },
    { property: 'og:url', content: 'https://steeltech.ba/' },
    { name: 'twitter:title', content: 'SteelTech - Pouzdana Snaga Čelika' },
    { name: 'twitter:description', content: 'Specijalizirani za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja.' }
  ],
  link: [
    { rel: 'canonical', href: 'https://steeltech.ba/' }
  ]
})
</script>
