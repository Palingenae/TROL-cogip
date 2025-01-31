<script setup lang="ts">
import Navigation from "@/components/Employee/Navigation.vue";
import Footer from "@/components/Employee/Footer.vue";
</script>

<template>
  <Navigation/>
  <main class="main">
    <slot></slot>
  </main>
  <Footer/>
</template>

<style lang="scss">
@use "../assets/styles/modules/breakpoints";

.main {
  padding: var(--spacing-400) var(--spacing-800);

  @include breakpoints.xxl {
    padding: var(--spacing-400) var(--spacing-1600);
  }

  @include breakpoints.lg {
    padding: var(--spacing-400);
  }

  @include breakpoints.md {
    padding: var(--spacing-200);
  }

}
</style>
