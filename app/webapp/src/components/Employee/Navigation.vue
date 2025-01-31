<script setup lang="ts">
import NavLink from "@/components/Employee/NavLink.vue";
import { useRouter } from 'vue-router';

const router = useRouter();
</script>

<template>
  <div class="navigation">
    <div class="navigation__routes">
      <div class="navigation__logo">
        <span class="navigation__logo">COGIP</span>
      </div>
      <nav class="navigation__nav">
        <NavLink v-for="(route, index) in router.options.routes" v-bind:key="index" v-bind:route="route.path">{{ route.name }}</NavLink>
      </nav>
    </div>
    <div class="navigation__userAccess">
<!--      <a class="navigation__userAccess__link">Contact</a>-->
      <a class="navigation__userAccess__link">Sign in</a>
    </div>
  </div>
<!--  <div class="navigation-mobile">-->
<!--      <div class="navigation-mobile__logo">-->
<!--        <a href="/app/webapp/public" class="navigation__logo__link">COGIP</a>-->
<!--      </div>-->
<!--      <button class="navigation-mobile__drawerToggle">-->
<!--      </button>-->
<!--  </div>-->
<!--  <nav class="navigation-mobile__drawer">-->
<!--    <div class="navigation-mobile__nav">-->
<!--      <a href="/" class="navigation-mobile__nav__link">Home</a>-->
<!--      <a href="/" class="navigation-mobile__nav__link &#45;&#45;active">Invoices</a>-->
<!--      <a href="/" class="navigation-mobile__nav__link">Companies</a>-->
<!--      <a href="/" class="navigation-mobile__nav__link">Contact</a>-->
<!--    </div>-->
<!--    <div class="navigation-mobile__userAccess">-->
<!--      &lt;!&ndash;      <a class="navigation-mobile__userAccess__link">Contact</a>&ndash;&gt;-->
<!--      <a class="navigation-mobile__userAccess__link">Sign in</a>-->
<!--    </div>-->
<!--  </nav>-->
</template>

<style lang="scss" scoped>
@use "../../assets/styles/modules/breakpoints";

.navigation {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--spacing-800) var(--spacing-800) var(--spacing-200);

  @include breakpoints.xxl {
    padding: var(--spacing-800) var(--spacing-1600) var(--spacing-200);
  }

  @include breakpoints.lg {
    padding: var(--spacing-800) var(--spacing-400) var(--spacing-200);
  }

  @include breakpoints.md {
    display: none;
  }
  &__routes {
    display: flex;
    gap: var(--spacing-400);
    align-items: center;
  }
  &__logo {
    font-size: 3rem;
    font-weight: 900;
    font-variation-settings: 'wght' 900;
    color: inherit;
  }
  &__nav {
    display: flex;
    gap: var(--spacing-100);
    &__link {
      text-decoration: none;
      color: inherit;
      font-weight: 500;
      font-variation-settings: 'wght' 500;
      font-size: var(--font-size-ui);
      padding: 1rem;
      transition: background-color 0.2s ease-in;
      border: solid transparent 1px;
      &:hover {
        background-color: var(--neutral-200);
      }
      &.--active {
        border: solid var(--neutral-1000) 1px;
      }
    }
  }
  &__userAccess {
    &__link {
      @extend .navigation__nav__link;
    }
  }

  &-mobile {

  }
}
</style>
