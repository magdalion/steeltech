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
          <span class="text-brand-primary">Galerija</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          Pogledajte naše projekte i radove
        </p>
      </div>
    </section>

    <!-- Filter Tabs -->
    <section class="py-8 bg-[#1a1a1a] border-b border-white/10 sticky top-[72px] z-40">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-2 md:gap-4">
          <button
            v-for="category in categories"
            :key="category.id"
            @click="setActiveCategory(category.id)"
            class="px-4 py-2 font-title text-xs md:text-sm uppercase tracking-wide rounded transition-all duration-200"
            :class="activeCategory === category.id
              ? 'bg-brand-primary text-white'
              : 'bg-white/5 text-brand-light/70 hover:bg-white/10 hover:text-brand-light'"
          >
            {{ category.label }}
          </button>
        </div>
      </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12 md:py-16">
      <div class="container mx-auto px-4">
        <div v-if="filteredImages.length > 0" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div
            v-for="(image, index) in filteredImages"
            :key="image.src"
            @click="openLightbox(index)"
            class="group relative aspect-square overflow-hidden rounded-lg cursor-pointer bg-[#2d2d2d]"
          >
            <NuxtImg
              :src="image.src"
              :alt="image.alt"
              loading="lazy"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
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
            <div class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black/60 to-transparent">
              <span class="text-white/80 text-xs font-medium">{{ image.category }}</span>
            </div>
          </div>
        </div>

        <div v-else class="text-center py-16">
          <p class="text-brand-light/60">Nema slika u ovoj kategoriji.</p>
        </div>
      </div>
    </section>

    <!-- Lightbox -->
    <Teleport to="body">
      <Transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition duration-150 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div
          v-if="lightboxOpen"
          class="fixed inset-0 z-[100] bg-black/95 flex items-center justify-center"
          @click.self="closeLightbox"
          @keydown.escape="closeLightbox"
          @keydown.left="prevImage"
          @keydown.right="nextImage"
          tabindex="0"
          ref="lightboxRef"
        >
          <!-- Close Button -->
          <button
            @click="closeLightbox"
            class="absolute top-4 right-4 p-3 text-white/70 hover:text-white transition-colors z-10"
            aria-label="Close lightbox"
          >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

          <!-- Previous Button -->
          <button
            @click="prevImage"
            class="absolute left-4 top-1/2 -translate-y-1/2 p-3 text-white/70 hover:text-white transition-colors"
            aria-label="Previous image"
          >
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Next Button -->
          <button
            @click="nextImage"
            class="absolute right-4 top-1/2 -translate-y-1/2 p-3 text-white/70 hover:text-white transition-colors"
            aria-label="Next image"
          >
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <!-- Image -->
          <div class="max-w-[90vw] max-h-[85vh] flex items-center justify-center">
            <NuxtImg
              :src="filteredImages[currentImageIndex]?.src"
              :alt="filteredImages[currentImageIndex]?.alt"
              class="max-w-full max-h-[85vh] object-contain"
            />
          </div>

          <!-- Image Counter -->
          <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/70 text-sm font-title">
            {{ currentImageIndex + 1 }} / {{ filteredImages.length }}
          </div>
        </div>
      </Transition>
    </Teleport>
  </div>
</template>

<script setup lang="ts">
const route = useRoute()
const router = useRouter()
const lightboxRef = ref<HTMLElement | null>(null)

const categories = [
  { id: 'sve', label: 'Sve' },
  { id: 'celicne-konstrukcije', label: 'Čelične Konstrukcije' },
  { id: 'zavarivanje', label: 'Zavarivanje' },
  { id: 'lasersko-rezanje', label: 'Lasersko Rezanje' },
  { id: 'antikorozivna-zastita', label: 'Antikorozivna Zaštita' }
]

interface GalleryImage {
  src: string
  alt: string
  categoryId: string
  category: string
}

const allImages: GalleryImage[] = [
  // Section 1 - Čelične konstrukcije (17 images)
  { src: '/images/Steeltech_Section_1_1.JPG', alt: 'Čelična konstrukcija 1', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_2.JPG', alt: 'Čelična konstrukcija 2', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_3.JPG', alt: 'Čelična konstrukcija 3', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_4.JPG', alt: 'Čelična konstrukcija 4', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_5.JPG', alt: 'Čelična konstrukcija 5', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_6.JPG', alt: 'Čelična konstrukcija 6', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_7.JPG', alt: 'Čelična konstrukcija 7', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_8.JPG', alt: 'Čelična konstrukcija 8', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_9.JPG', alt: 'Čelična konstrukcija 9', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_11.JPG', alt: 'Čelična konstrukcija 11', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_12.JPG', alt: 'Čelična konstrukcija 12', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_13.JPG', alt: 'Čelična konstrukcija 13', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_14.JPG', alt: 'Čelična konstrukcija 14', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_15.JPG', alt: 'Čelična konstrukcija 15', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_16.JPG', alt: 'Čelična konstrukcija 16', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  { src: '/images/Steeltech_Section_1_17.JPG', alt: 'Čelična konstrukcija 17', categoryId: 'celicne-konstrukcije', category: 'Čelične Konstrukcije' },
  // Section 2 - Zavarivanje (9 images)
  { src: '/images/Steeltech_Section_2_1.JPG', alt: 'Zavarivanje 1', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_2.JPG', alt: 'Zavarivanje 2', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_3.JPG', alt: 'Zavarivanje 3', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_4.JPG', alt: 'Zavarivanje 4', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_5.JPG', alt: 'Zavarivanje 5', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_6.JPG', alt: 'Zavarivanje 6', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_7.JPG', alt: 'Zavarivanje 7', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_8.JPG', alt: 'Zavarivanje 8', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  { src: '/images/Steeltech_Section_2_9.JPG', alt: 'Zavarivanje 9', categoryId: 'zavarivanje', category: 'Zavarivanje' },
  // Section 3 - Lasersko rezanje (2 images)
  { src: '/images/Steeltech_Section_3_1.JPG', alt: 'Lasersko rezanje 1', categoryId: 'lasersko-rezanje', category: 'Lasersko Rezanje' },
  { src: '/images/Steeltech_Section_3_2.JPG', alt: 'Lasersko rezanje 2', categoryId: 'lasersko-rezanje', category: 'Lasersko Rezanje' },
  // Section 4 - Antikorozivna zaštita (3 images)
  { src: '/images/Steeltech_section_4.JPG', alt: 'Antikorozivna zaštita', categoryId: 'antikorozivna-zastita', category: 'Antikorozivna Zaštita' },
  { src: '/images/Steeltech_section_4_1.JPG', alt: 'Antikorozivna zaštita 1', categoryId: 'antikorozivna-zastita', category: 'Antikorozivna Zaštita' },
  { src: '/images/Steeltech_section_4_2.JPG', alt: 'Antikorozivna zaštita 2', categoryId: 'antikorozivna-zastita', category: 'Antikorozivna Zaštita' }
]

const activeCategory = ref('sve')
const lightboxOpen = ref(false)
const currentImageIndex = ref(0)

// Set category from URL query on mount
onMounted(() => {
  const queryCategory = route.query.kategorija as string
  if (queryCategory && categories.some(c => c.id === queryCategory)) {
    activeCategory.value = queryCategory
  }
})

// Watch for route changes
watch(() => route.query.kategorija, (newCategory) => {
  if (newCategory && categories.some(c => c.id === newCategory)) {
    activeCategory.value = newCategory as string
  }
})

const filteredImages = computed(() => {
  if (activeCategory.value === 'sve') {
    return allImages
  }
  return allImages.filter(img => img.categoryId === activeCategory.value)
})

function setActiveCategory(categoryId: string) {
  activeCategory.value = categoryId
  router.replace({
    query: categoryId === 'sve' ? {} : { kategorija: categoryId }
  })
}

function openLightbox(index: number) {
  currentImageIndex.value = index
  lightboxOpen.value = true
  document.body.style.overflow = 'hidden'
  nextTick(() => {
    lightboxRef.value?.focus()
  })
}

function closeLightbox() {
  lightboxOpen.value = false
  document.body.style.overflow = ''
}

function nextImage() {
  currentImageIndex.value = (currentImageIndex.value + 1) % filteredImages.value.length
}

function prevImage() {
  currentImageIndex.value = (currentImageIndex.value - 1 + filteredImages.value.length) % filteredImages.value.length
}

// Cleanup on unmount
onUnmounted(() => {
  document.body.style.overflow = ''
})

useHead({
  title: 'Galerija - SteelTech | Projekti Čeličnih Konstrukcija',
  meta: [
    { name: 'description', content: 'SteelTech galerija projekata - pogledajte naše radove: čelične konstrukcije, zavarivanje, lasersko rezanje i antikorozivna zaštita.' },
    { name: 'keywords', content: 'galerija, projekti, čelične konstrukcije, zavarivanje, lasersko rezanje, antikorozivna zaštita, portfolio' },
    { property: 'og:title', content: 'Galerija - SteelTech' },
    { property: 'og:description', content: 'Pogledajte naše projekte: čelične konstrukcije, zavarivanje, lasersko rezanje i antikorozivna zaštita.' },
    { property: 'og:url', content: 'https://steeltech.ba/galerija' },
    { name: 'twitter:title', content: 'Galerija - SteelTech' },
    { name: 'twitter:description', content: 'Pogledajte naše projekte čeličnih konstrukcija i zavarivanja.' }
  ],
  link: [
    { rel: 'canonical', href: 'https://steeltech.ba/galerija' }
  ]
})
</script>
