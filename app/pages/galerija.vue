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
          <span class="text-brand-primary">{{ $t('gallery.hero.title') }}</span>
        </h1>
        <p class="font-subtitle text-xl md:text-2xl text-center text-brand-light/80 max-w-2xl mx-auto">
          {{ $t('gallery.hero.subtitle') }}
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
            {{ $t(category.labelKey) }}
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
              :alt="$t(image.altKey)"
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
              <span class="text-white/80 text-xs font-medium">{{ $t(image.categoryKey) }}</span>
            </div>
          </div>
        </div>

        <div v-else class="text-center py-16">
          <p class="text-brand-light/60">{{ $t('gallery.noImages') }}</p>
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
            :aria-label="$t('aria.closeLightbox')"
          >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

          <!-- Previous Button -->
          <button
            @click="prevImage"
            class="absolute left-4 top-1/2 -translate-y-1/2 p-3 text-white/70 hover:text-white transition-colors"
            :aria-label="$t('aria.previousImage')"
          >
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <!-- Next Button -->
          <button
            @click="nextImage"
            class="absolute right-4 top-1/2 -translate-y-1/2 p-3 text-white/70 hover:text-white transition-colors"
            :aria-label="$t('aria.nextImage')"
          >
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

          <!-- Image -->
          <div class="max-w-[90vw] max-h-[85vh] flex items-center justify-center">
            <NuxtImg
              :src="filteredImages[currentImageIndex]?.src"
              :alt="$t(filteredImages[currentImageIndex]?.altKey || '')"
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
const { t, locale } = useI18n()
const localePath = useLocalePath()
const route = useRoute()
const router = useRouter()
const lightboxRef = ref<HTMLElement | null>(null)

const categories = [
  { id: 'sve', labelKey: 'gallery.categories.all' },
  { id: 'celicne-konstrukcije', labelKey: 'gallery.categories.steelConstructions' },
  { id: 'zavarivanje', labelKey: 'gallery.categories.welding' },
  { id: 'lasersko-rezanje', labelKey: 'gallery.categories.laserCutting' },
  { id: 'antikorozivna-zastita', labelKey: 'gallery.categories.antiCorrosion' }
]

interface GalleryImage {
  src: string
  altKey: string
  categoryId: string
  categoryKey: string
}

const allImages: GalleryImage[] = [
  // Section 1 - Steel structures (24 images)
  { src: '/images/Steeltech_Section_1_1.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_2.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_3.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_4.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_5.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_6.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_7.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_8.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_9.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_11.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_12.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_13.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_14.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_15.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_16.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_17.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_18.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_19.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_20.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_21.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_22.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_23.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_24.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  { src: '/images/Steeltech_Section_1_25.JPG', altKey: 'gallery.imageAlt.steelConstruction', categoryId: 'celicne-konstrukcije', categoryKey: 'gallery.categories.steelConstructions' },
  // Section 2 - Welding (9 images)
  { src: '/images/Steeltech_Section_2_1.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_2.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_3.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_4.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_5.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_6.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_7.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_8.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  { src: '/images/Steeltech_Section_2_9.JPG', altKey: 'gallery.imageAlt.welding', categoryId: 'zavarivanje', categoryKey: 'gallery.categories.welding' },
  // Section 3 - Laser cutting (2 images)
  { src: '/images/Steeltech_Section_3_1.JPG', altKey: 'gallery.imageAlt.laserCutting', categoryId: 'lasersko-rezanje', categoryKey: 'gallery.categories.laserCutting' },
  { src: '/images/Steeltech_Section_3_2.JPG', altKey: 'gallery.imageAlt.laserCutting', categoryId: 'lasersko-rezanje', categoryKey: 'gallery.categories.laserCutting' },
  // Section 4 - Anti-corrosion (3 images)
  { src: '/images/Steeltech_section_4.JPG', altKey: 'gallery.imageAlt.antiCorrosion', categoryId: 'antikorozivna-zastita', categoryKey: 'gallery.categories.antiCorrosion' },
  { src: '/images/Steeltech_section_4_1.JPG', altKey: 'gallery.imageAlt.antiCorrosion', categoryId: 'antikorozivna-zastita', categoryKey: 'gallery.categories.antiCorrosion' },
  { src: '/images/Steeltech_section_4_2.JPG', altKey: 'gallery.imageAlt.antiCorrosion', categoryId: 'antikorozivna-zastita', categoryKey: 'gallery.categories.antiCorrosion' }
]

const activeCategory = ref('sve')
const lightboxOpen = ref(false)
const currentImageIndex = ref(0)

// Get category from URL query - supports both 'kategorija' (HR) and 'category' (EN)
onMounted(() => {
  const queryCategory = (route.query.kategorija || route.query.category) as string
  if (queryCategory && categories.some(c => c.id === queryCategory)) {
    activeCategory.value = queryCategory
  }
})

// Watch for route changes
watch(() => [route.query.kategorija, route.query.category], ([hrCategory, enCategory]) => {
  const queryCategory = (hrCategory || enCategory) as string
  if (queryCategory && categories.some(c => c.id === queryCategory)) {
    activeCategory.value = queryCategory
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
  // Use locale-appropriate query param
  const queryParam = locale.value === 'en' ? 'category' : 'kategorija'
  router.replace({
    query: categoryId === 'sve' ? {} : { [queryParam]: categoryId }
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
  title: t('seo.gallery.title'),
  meta: [
    { name: 'description', content: t('seo.gallery.description') },
    { name: 'keywords', content: t('seo.gallery.keywords') },
    { property: 'og:title', content: t('seo.gallery.title') },
    { property: 'og:description', content: t('seo.gallery.description') },
    { property: 'og:url', content: `https://steeltech.ba${localePath('/galerija')}` },
    { name: 'twitter:title', content: t('seo.gallery.title') },
    { name: 'twitter:description', content: t('seo.gallery.description') }
  ],
  link: [
    { rel: 'canonical', href: `https://steeltech.ba${localePath('/galerija')}` }
  ]
})
</script>
