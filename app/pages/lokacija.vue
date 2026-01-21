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
          <span class="text-brand-primary">Lokacija</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          Pronađite nas u Žepču
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
              Kako <span class="text-brand-primary">do nas</span>
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
                  <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">Adresa</h3>
                  <p class="text-brand-light/70 leading-relaxed">
                    Brankovići bb<br />
                    Žepče 72230<br />
                    Bosna i Hercegovina
                  </p>
                </div>
              </div>
            </div>

            <!-- Contact Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
              <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="text-brand-light/60 text-sm mb-1">Telefon</h4>
                    <a href="tel:+38764404198" class="text-brand-light hover:text-brand-primary transition-colors">
                      +387 64 404 1908
                    </a>
                  </div>
                </div>
              </div>

              <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="text-brand-light/60 text-sm mb-1">Email</h4>
                    <a href="mailto:dominik.jukic@steeltech.ba" class="text-brand-light hover:text-brand-primary transition-colors text-sm">
                      dominik.jukic@steeltech.ba
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Directions -->
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
              <h3 class="font-title text-lg uppercase tracking-wide mb-4 text-brand-light">Upute za Dolazak</h3>
              <ul class="space-y-3 text-brand-light/70">
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>Nalazimo se u mjestu Brankovići, općina Žepče</span>
                </li>
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>Lako dostupno sa glavne magistrale M17</span>
                </li>
                <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-brand-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span>Mogućnost pristupa za teretna vozila</span>
                </li>
              </ul>
            </div>

          </div>

          <!-- Map -->
          <div>
            <div class="bg-[#2d2d2d] border border-white/10 rounded-lg overflow-hidden h-[400px] lg:h-[500px]">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2861.0!2d18.0394!3d44.4267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475f3a8b8c8c8c8b%3A0x8c8c8c8c8c8c8c8c!2sBrankovi%C4%87i%2C%20%C5%BDep%C4%8De%2072230%2C%20Bosnia%20and%20Herzegovina!5e0!3m2!1sen!2s!4v1234567890"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="SteelTech lokacija na mapi"
              ></iframe>
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
                Otvori u Google Maps
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
useHead({
  title: 'Lokacija - SteelTech',
  meta: [
    { name: 'description', content: 'SteelTech lokacija - Brankovići bb, Žepče 72230, Bosna i Hercegovina. Pronađite nas na mapi.' }
  ]
})
</script>
