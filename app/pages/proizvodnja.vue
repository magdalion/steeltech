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
          <span class="text-brand-primary">Proizvodnja</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          Vrhunska kvaliteta u svakom projektu
        </p>
      </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Service Card 1: Čelične konstrukcije -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_1_3.JPG"
                alt="Čelične konstrukcije"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                Čelične Konstrukcije
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                Specijalizirani smo za izradu čeličnih hala po sistemu ključ u ruke, međuetažnih skladišta, montažnih balkona i ograda, metalnih stubišta, specijalnih vozila za prijevoz tereta te ostale proizvode od metala po želji kupca.
              </p>
              <NuxtLink
                to="/galerija?kategorija=celicne-konstrukcije"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline"
              >
                Pogledaj galeriju
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLink>
            </div>
          </div>

          <!-- Service Card 2: Tehnologija zavarivanja -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_2_1.JPG"
                alt="Tehnologija zavarivanja"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                Tehnologija Zavarivanja
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                Tehnologije za koje posjedujemo opremu i znanje su MIG, MAG, TIG, REL i LASERSKO ZAVARIVANJE. Radimo na izradi opreme za trafostanice, radne mašine i industrijska postrojenja.
              </p>
              <NuxtLink
                to="/galerija?kategorija=zavarivanje"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline"
              >
                Pogledaj galeriju
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLink>
            </div>
          </div>

          <!-- Service Card 3: Lasersko rezanje -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_Section_3_1.JPG"
                alt="Lasersko rezanje"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                Lasersko Rezanje
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                Usluge laserskog rezanja i obrade metala bušenjem i savijanjem. Posjedujemo 6kW fiber laser, apkant prešu do 3m, i mogućnost bušenja do fi 100mm.
              </p>
              <NuxtLink
                to="/galerija?kategorija=lasersko-rezanje"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline"
              >
                Pogledaj galeriju
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLink>
            </div>
          </div>

          <!-- Service Card 4: Antikorozivna zaštita -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-56 overflow-hidden">
              <NuxtImg
                src="/images/Steeltech_section_4_1.JPG"
                alt="Antikorozivna zaštita"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                Antikorozivna Zaštita
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                U mogućnosti smo ponuditi preko naših partnera usluge vrućeg cinčanja, mokrog farbanja nitro i poliuretanskim bojama te elektrostatičke zaštite prahom (plastifikacija).
              </p>
              <NuxtLink
                to="/galerija?kategorija=antikorozivna-zastita"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline"
              >
                Pogledaj galeriju
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLink>
            </div>
          </div>

          <!-- Service Card 5: Usluge transporta -->
          <div class="group bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden hover:border-brand-primary/50 transition-all duration-300">
            <div class="relative h-56 overflow-hidden bg-brand-dark flex items-center justify-center">
              <svg class="w-24 h-24 text-brand-primary/30 group-hover:text-brand-primary/50 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
              </svg>
              <div class="absolute inset-0 bg-gradient-to-t from-[#2d2d2d] to-transparent"></div>
            </div>
            <div class="p-6">
              <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-brand-light group-hover:text-brand-primary transition-colors">
                Usluge Transporta
              </h3>
              <p class="text-brand-light/60 text-sm leading-relaxed mb-4">
                Za sve naše proizvode osiguravamo transport na odredište te usluge dizalice. Kompletna logistička podrška za vaše projekte.
              </p>
              <NuxtLink
                to="/kontakt"
                class="inline-flex items-center text-brand-primary text-sm font-medium hover:underline"
              >
                Kontaktirajte nas
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </NuxtLink>
            </div>
          </div>

          <!-- CTA Card -->
          <div class="bg-gradient-to-br from-brand-secondary to-brand-primary rounded-lg p-6 flex flex-col justify-center">
            <h3 class="font-title text-xl uppercase tracking-wide mb-3 text-white">
              Trebate Ponudu?
            </h3>
            <p class="text-white/80 text-sm leading-relaxed mb-4">
              Kontaktirajte nas za besplatnu procjenu i ponudu za vaš projekt.
            </p>
            <NuxtLink
              to="/kontakt"
              class="inline-flex items-center justify-center px-6 py-3 bg-white text-brand-dark font-title uppercase tracking-wide text-sm rounded hover:bg-brand-light transition-colors duration-300"
            >
              Pošalji Upit
            </NuxtLink>
          </div>
        </div>
      </div>
    </section>

    <!-- Equipment Section -->
    <section class="py-16 bg-[#1a1a1a]">
      <div class="container mx-auto px-4">
        <h2 class="font-title text-2xl md:text-3xl uppercase tracking-wide mb-12 text-center">
          Naša <span class="text-brand-primary">Oprema</span>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">6kW</div>
            <div class="text-brand-light/60 text-sm">Fiber Laser</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">3m</div>
            <div class="text-brand-light/60 text-sm">Apkant Preša</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">100mm</div>
            <div class="text-brand-light/60 text-sm">Max. Provrt</div>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-brand-primary mb-2">5</div>
            <div class="text-brand-light/60 text-sm">Tehnologija Zavarivanja</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
useHead({
  title: 'Proizvodnja - SteelTech | Čelične Konstrukcije, Zavarivanje, Lasersko Rezanje',
  meta: [
    { name: 'description', content: 'SteelTech proizvodnja - čelične konstrukcije, MIG/MAG/TIG/REL zavarivanje, 6kW fiber lasersko rezanje, antikorozivna zaštita i usluge transporta.' },
    { name: 'keywords', content: 'proizvodnja, čelične konstrukcije, zavarivanje, MIG, MAG, TIG, REL, lasersko rezanje, fiber laser, antikorozivna zaštita, cinčanje' },
    { property: 'og:title', content: 'Proizvodnja - SteelTech' },
    { property: 'og:description', content: 'Čelične konstrukcije, tehnologija zavarivanja, lasersko rezanje, antikorozivna zaštita i usluge transporta.' },
    { property: 'og:url', content: 'https://steeltech.ba/proizvodnja' },
    { name: 'twitter:title', content: 'Proizvodnja - SteelTech' },
    { name: 'twitter:description', content: 'Čelične konstrukcije, zavarivanje, lasersko rezanje, antikorozivna zaštita.' }
  ],
  link: [
    { rel: 'canonical', href: 'https://steeltech.ba/proizvodnja' }
  ]
})
</script>
