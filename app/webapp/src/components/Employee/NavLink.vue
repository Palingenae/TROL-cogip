<script setup lang="ts">
defineProps({
  route: {
    type: String,
    required: true
  }
});
</script>

<template>
  <!-- TODO: With another page, check if this --active class is added when the route has a correspondance -->
  <RouterLink :to="{ route }" class="navLink" activeExactClass="--active"><slot></slot></RouterLink>
</template>

<style scoped lang="scss">
.navLink {
  text-decoration: none;
  color: var(--neutral-800);
  font-weight: 400;
  font-variation-settings: 'wght' 400;
  font-size: var(--font-size-ui);
  padding: 1rem;
  transition: background-color 0.2s ease-in-out;
  border: solid transparent 1px;

  &:hover {
    background-color: var(--neutral-200);
  }

  &.--active {
    border: solid var(--neutral-1000) 1px;
  }
}
</style>
