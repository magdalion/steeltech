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
          <span class="text-brand-primary">Kontakt</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          Pošaljite nam upit
        </p>
      </div>
    </section>

    <!-- Contact Content -->
    <section class="py-16 md:py-24">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
          <!-- Contact Form -->
          <div>
            <h2 class="font-title text-2xl uppercase tracking-wide mb-6">
              Pošaljite <span class="text-brand-primary">Upit</span>
            </h2>

            <form @submit.prevent="handleSubmit" class="space-y-6">
              <!-- Name -->
              <div>
                <label for="name" class="block text-brand-light/80 text-sm mb-2">
                  Ime i prezime <span class="text-brand-primary">*</span>
                </label>
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  required
                  class="w-full px-4 py-3 bg-[#2d2d2d] border border-white/10 rounded-lg text-brand-light placeholder-brand-light/40 focus:outline-none focus:border-brand-primary transition-colors"
                  placeholder="Vaše ime i prezime"
                />
              </div>

              <!-- Email -->
              <div>
                <label for="email" class="block text-brand-light/80 text-sm mb-2">
                  Email adresa <span class="text-brand-primary">*</span>
                </label>
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 bg-[#2d2d2d] border border-white/10 rounded-lg text-brand-light placeholder-brand-light/40 focus:outline-none focus:border-brand-primary transition-colors"
                  placeholder="vasa@email.com"
                />
              </div>

              <!-- Phone -->
              <div>
                <label for="phone" class="block text-brand-light/80 text-sm mb-2">
                  Telefon
                </label>
                <input
                  id="phone"
                  v-model="form.phone"
                  type="tel"
                  class="w-full px-4 py-3 bg-[#2d2d2d] border border-white/10 rounded-lg text-brand-light placeholder-brand-light/40 focus:outline-none focus:border-brand-primary transition-colors"
                  placeholder="+387 6X XXX XXX"
                />
              </div>

              <!-- Subject -->
              <div>
                <label for="subject" class="block text-brand-light/80 text-sm mb-2">
                  Predmet
                </label>
                <select
                  id="subject"
                  v-model="form.subject"
                  class="w-full px-4 py-3 bg-[#2d2d2d] border border-white/10 rounded-lg text-brand-light focus:outline-none focus:border-brand-primary transition-colors"
                >
                  <option value="">Odaberite predmet</option>
                  <option value="celicne-konstrukcije">Čelične konstrukcije</option>
                  <option value="zavarivanje">Tehnologija zavarivanja</option>
                  <option value="lasersko-rezanje">Lasersko rezanje</option>
                  <option value="antikorozivna-zastita">Antikorozivna zaštita</option>
                  <option value="transport">Usluge transporta</option>
                  <option value="ostalo">Ostalo</option>
                </select>
              </div>

              <!-- Message -->
              <div>
                <label for="message" class="block text-brand-light/80 text-sm mb-2">
                  Poruka <span class="text-brand-primary">*</span>
                </label>
                <textarea
                  id="message"
                  v-model="form.message"
                  required
                  rows="5"
                  class="w-full px-4 py-3 bg-[#2d2d2d] border border-white/10 rounded-lg text-brand-light placeholder-brand-light/40 focus:outline-none focus:border-brand-primary transition-colors resize-none"
                  placeholder="Opišite vaš upit ili projekt..."
                ></textarea>
              </div>

              <!-- Submit Button -->
              <button
                type="submit"
                :disabled="isSubmitting"
                class="w-full px-6 py-4 bg-brand-primary text-white font-title uppercase tracking-wide text-sm rounded-lg hover:bg-brand-secondary transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
              >
                <svg
                  v-if="isSubmitting"
                  class="animate-spin w-5 h-5"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ isSubmitting ? 'Slanje...' : 'Pošalji Upit' }}
              </button>

              <!-- Success Message -->
              <Transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-2"
              >
                <div v-if="submitSuccess" class="p-4 bg-green-500/10 border border-green-500/30 rounded-lg">
                  <p class="text-green-400 text-sm">
                    Hvala vam na upitu! Odgovorit ćemo vam u najkraćem mogućem roku.
                  </p>
                </div>
              </Transition>
            </form>
          </div>

          <!-- Contact Info -->
          <div>
            <h2 class="font-title text-2xl uppercase tracking-wide mb-6">
              Kontakt <span class="text-brand-primary">Informacije</span>
            </h2>

            <div class="space-y-6">
              <!-- Address -->
              <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
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

              <!-- Email -->
              <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <div>
                    <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">Email</h3>
                    <a
                      href="mailto:dominik.jukic@steeltech.ba"
                      class="text-brand-light/70 hover:text-brand-primary transition-colors"
                    >
                      dominik.jukic@steeltech.ba
                    </a>
                  </div>
                </div>
              </div>

              <!-- Phone -->
              <div class="bg-[#2d2d2d] border border-white/10 rounded-lg p-6">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <div>
                    <h3 class="font-title text-lg uppercase tracking-wide mb-2 text-brand-light">Telefon</h3>
                    <a
                      href="tel:+38764404198"
                      class="text-brand-light/70 hover:text-brand-primary transition-colors"
                    >
                      +387 64 404 1908
                    </a>
                  </div>
                </div>
              </div>

              <!-- Map Link -->
              <NuxtLink
                to="/lokacija"
                class="block bg-[#2d2d2d] border border-white/10 rounded-lg p-6 hover:border-brand-primary/50 transition-colors group"
              >
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center shrink-0">
                      <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                      </svg>
                    </div>
                    <div>
                      <h3 class="font-title text-lg uppercase tracking-wide text-brand-light group-hover:text-brand-primary transition-colors">
                        Pogledaj Mapu
                      </h3>
                      <p class="text-brand-light/60 text-sm">Pronađi nas na karti</p>
                    </div>
                  </div>
                  <svg class="w-5 h-5 text-brand-light/40 group-hover:text-brand-primary group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </div>
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
interface ContactForm {
  name: string
  email: string
  phone: string
  subject: string
  message: string
}

const form = reactive<ContactForm>({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
})

const isSubmitting = ref(false)
const submitSuccess = ref(false)

async function handleSubmit() {
  isSubmitting.value = true
  submitSuccess.value = false

  // Simulate form submission (replace with actual API call)
  await new Promise(resolve => setTimeout(resolve, 1500))

  // In production, replace this with actual form submission logic
  // For example, sending to a PHP mailer or API endpoint
  console.log('Form submitted:', form)

  // Reset form and show success
  form.name = ''
  form.email = ''
  form.phone = ''
  form.subject = ''
  form.message = ''

  isSubmitting.value = false
  submitSuccess.value = true

  // Hide success message after 5 seconds
  setTimeout(() => {
    submitSuccess.value = false
  }, 5000)
}

useHead({
  title: 'Kontakt - SteelTech | Pošaljite Upit',
  meta: [
    { name: 'description', content: 'Kontaktirajte SteelTech za besplatnu ponudu. Email: dominik.jukic@steeltech.ba, telefon: +387 64 404 1908, adresa: Brankovići bb, Žepče 72230.' },
    { name: 'keywords', content: 'kontakt, email, telefon, upit, ponuda, SteelTech, Žepče' },
    { property: 'og:title', content: 'Kontakt - SteelTech' },
    { property: 'og:description', content: 'Kontaktirajte nas za besplatnu ponudu. Email: dominik.jukic@steeltech.ba, telefon: +387 64 404 1908.' },
    { property: 'og:url', content: 'https://steeltech.ba/kontakt' },
    { name: 'twitter:title', content: 'Kontakt - SteelTech' },
    { name: 'twitter:description', content: 'Kontaktirajte SteelTech za besplatnu ponudu.' }
  ],
  link: [
    { rel: 'canonical', href: 'https://steeltech.ba/kontakt' }
  ]
})
</script>
