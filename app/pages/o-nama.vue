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
          O <span class="text-brand-primary">Nama</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          Pouzdana snaga čelika
        </p>
      </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
          <!-- Introduction -->
          <div class="mb-16">
            <p class="text-lg md:text-xl leading-relaxed text-brand-light/80 mb-6">
              <span class="text-brand-primary font-semibold">Steeltech Žepče</span> je mlada, porodična firma koja spaja znanje, modernu tehnologiju i strast prema metalu.
            </p>
            <p class="text-lg md:text-xl leading-relaxed text-brand-light/70 mb-6">
              Specijalizirani smo za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja, pružajući rješenja koja zadovoljavaju najviše industrijske standarde.
            </p>
            <p class="text-lg md:text-xl leading-relaxed text-brand-light/70 mb-6">
              Kontinuirano ulažemo u savremenu opremu i stručan kadar, jer vjerujemo da kvalitet počinje od ljudi. Naš rad je u potpunosti usklađen sa ISO standardima, što garantuje sigurnost, preciznost i dugotrajnost svakog projekta.
            </p>
            <p class="text-lg md:text-xl leading-relaxed text-brand-light/70">
              Vođeni jasnom vizijom razvoja, Steeltech se stalno širi i unapređuje svoje kapacitete, s ciljem da postane pouzdan partner u oblasti čeličnih konstrukcija — danas, sutra i u budućnosti.
            </p>
          </div>

          <!-- Values/Features Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 hover:border-brand-primary/50 transition-colors duration-300">
              <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
              </div>
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">ISO Standardi</h3>
              <p class="text-brand-light/60 text-sm leading-relaxed">
                Naš rad je u potpunosti usklađen sa ISO standardima, garantujući sigurnost i preciznost.
              </p>
            </div>

            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 hover:border-brand-primary/50 transition-colors duration-300">
              <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
              </div>
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">Moderna Oprema</h3>
              <p class="text-brand-light/60 text-sm leading-relaxed">
                Kontinuirano ulažemo u savremenu opremu i najnovije tehnologije zavarivanja.
              </p>
            </div>

            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6 hover:border-brand-primary/50 transition-colors duration-300">
              <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">Porodična Firma</h3>
              <p class="text-brand-light/60 text-sm leading-relaxed">
                Mlada porodična firma koja spaja znanje, tehnologiju i strast prema metalu.
              </p>
            </div>
          </div>

          <!-- References Section -->
          <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-8">
            <h2 class="font-title text-2xl uppercase tracking-wide mb-6 text-brand-primary text-center">Reference</h2>
            <p class="text-brand-light/70 text-center mb-6">
              Znanje i kvalitet smo postigli i dokazali radeći poslove zavarivanja i montaže za vodeće kompanije:
            </p>
            <div class="flex flex-wrap justify-center gap-4">
              <span class="px-4 py-2 bg-brand-dark border border-white/10 rounded text-brand-light/60 text-sm">Ferokotao d.o.o. HR</span>
              <span class="px-4 py-2 bg-brand-dark border border-white/10 rounded text-brand-light/60 text-sm">Preis Usora d.o.o. BiH</span>
              <span class="px-4 py-2 bg-brand-dark border border-white/10 rounded text-brand-light/60 text-sm">GS Travnik d.o.o. BiH</span>
              <span class="px-4 py-2 bg-brand-dark border border-white/10 rounded text-brand-light/60 text-sm">Robor Italy</span>
              <span class="px-4 py-2 bg-brand-dark border border-white/10 rounded text-brand-light/60 text-sm">Cemex Hrvatska</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-brand-secondary to-brand-primary">
      <div class="container mx-auto px-4 text-center">
        <h2 class="font-title text-2xl md:text-3xl uppercase tracking-wide mb-4 text-white">
          Spremni za Suradnju?
        </h2>
        <p class="text-white/80 mb-8 max-w-xl mx-auto">
          Kontaktirajte nas za više informacija o našim uslugama i mogućnostima suradnje.
        </p>
        <NuxtLink
          to="/kontakt"
          class="inline-block px-8 py-3 bg-white text-brand-dark font-title uppercase tracking-wide text-sm rounded hover:bg-brand-light transition-colors duration-300"
        >
          Kontaktirajte Nas
        </NuxtLink>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
useHead({
  title: 'O Nama - SteelTech | Porodična Firma za Čelične Konstrukcije',
  meta: [
    { name: 'description', content: 'Steeltech Žepče - mlada, porodična firma specijalizirana za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja. ISO certificirani, moderno opremljeni.' },
    { name: 'keywords', content: 'o nama, SteelTech, Žepče, porodična firma, čelične konstrukcije, ISO certifikat, kvaliteta' },
    { property: 'og:title', content: 'O Nama - SteelTech' },
    { property: 'og:description', content: 'Mlada, porodična firma specijalizirana za izradu čeličnih konstrukcija i vrhunske tehnologije zavarivanja.' },
    { property: 'og:url', content: 'https://steeltech.ba/o-nama' },
    { name: 'twitter:title', content: 'O Nama - SteelTech' },
    { name: 'twitter:description', content: 'Mlada, porodična firma specijalizirana za izradu čeličnih konstrukcija.' }
  ],
  link: [
    { rel: 'canonical', href: 'https://steeltech.ba/o-nama' }
  ]
})
</script>
