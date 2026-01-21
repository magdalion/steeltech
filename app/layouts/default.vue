<template>
  <div class="min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4">
      <nav class="container mx-auto flex justify-between items-center">
        <NuxtLink to="/" class="text-xl font-bold">SteelTech</NuxtLink>
        <div class="space-x-4">
          <NuxtLink to="/" class="hover:text-gray-300">Naslovna</NuxtLink>
          <NuxtLink to="/o-nama" class="hover:text-gray-300">O nama</NuxtLink>
          <NuxtLink to="/usluge" class="hover:text-gray-300">Usluge</NuxtLink>
          <NuxtLink to="/galerija" class="hover:text-gray-300">Galerija</NuxtLink>
          <NuxtLink to="/lokacija" class="hover:text-gray-300">Lokacija</NuxtLink>
          <NuxtLink to="/kontakt" class="hover:text-gray-300">Kontakt</NuxtLink>
        </div>
      </nav>
    </header>

    <main class="flex-grow">
      <slot />
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center">
      <p>&copy; {{ new Date().getFullYear() }} SteelTech. Sva prava zadržana.</p>
    </footer>
  </div>
</template>
