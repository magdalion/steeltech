<template>
  <!-- Desktop variant -->
  <div v-if="variant === 'desktop'" class="flex items-center gap-1">
    <NuxtLink
      v-for="loc in locales"
      :key="loc.code"
      :to="switchLocalePath(loc.code)"
      class="px-3 py-1.5 font-title text-xs uppercase tracking-wide rounded transition-all duration-200"
      :class="locale === loc.code
        ? 'bg-brand-primary text-white'
        : 'text-brand-light/60 hover:text-brand-primary'"
    >
      {{ loc.code.toUpperCase() }}
    </NuxtLink>
  </div>

  <!-- Mobile variant -->
  <div v-else class="flex gap-2 w-full px-4 py-3">
    <NuxtLink
      v-for="loc in locales"
      :key="loc.code"
      :to="switchLocalePath(loc.code)"
      class="flex-1 py-2.5 font-title text-sm uppercase tracking-wide rounded text-center transition-all duration-200"
      :class="locale === loc.code
        ? 'bg-brand-primary text-white'
        : 'bg-white/5 text-brand-light/70 hover:bg-white/10 hover:text-brand-light'"
      @click="$emit('close')"
    >
      {{ loc.name }}
    </NuxtLink>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  variant: 'desktop' | 'mobile'
}>()

defineEmits<{
  close: []
}>()

const { locale, locales } = useI18n()
const switchLocalePath = useSwitchLocalePath()
</script>
