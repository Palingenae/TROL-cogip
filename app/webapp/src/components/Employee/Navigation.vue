<script setup lang="ts">
import NavLink from "@/components/Employee/NavLink.vue";
import { useRouter } from 'vue-router';
import { Menu } from "lucide-vue-next";

const router = useRouter();

function toggleDrawer() {
  const drawer = document.querySelector(".navigation-mobile__drawer");
  const website = document.querySelector("#app");

  drawer.classList.toggle("--open");
  drawer.classList.toggle("--deactivateScroll")
}
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
  <div class="navigation-mobile">
    <span class="navigation__logo">COGIP</span>
    <button class="navigation-mobile__drawerToggler" @click="toggleDrawer"><Menu/></button>
  </div>
  <nav class="navigation-mobile__drawer">
    <div class="navigation-mobile__drawer__nav">
      <NavLink v-for="(route, index) in router.options.routes" v-bind:key="index" v-bind:route="route.path">{{ route.name }}</NavLink>
    </div>
    <div class="navigation-mobile__userAccess">
      <!--      <a class="navigation-mobile__userAccess__link">Contact</a>-->
      <a class="navigation-mobile__userAccess__link">Sign in</a>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use "../../assets/styles/modules/breakpoints";

.navigation {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: var(--color-main);
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
    position: fixed;
    justify-content: space-between;
    align-items: center;
    background-color: var(--color-main);
    width: 100%;
    padding: var(--spacing-200);
    @include breakpoints.lg {
      display: none;
    }
    @include breakpoints.md {
      display: flex;
    }
    &__logo {
      @extend .navigation__logo;
    }
    &__drawer {
      @include breakpoints.lg {
        display: none;
      }
      @include breakpoints.md {
        display: flex;
      }
      position: fixed;
      top: 122px;
      right: 0;
      height: calc(100lvh - 122px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: flex-end;
      background-color: var(--neutral-100);
      width: 100%;
      padding: var(--spacing-200);
      z-index: 1;
      transform: translateX(100%);
      transition: transform ease-in-out 0.2s;
      &.--open {
        transform: translateX(0%);
      }
      &__nav {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: var(--spacing-100);
        width: 100%;
        & .navLink {
          width: 100%;
          text-align: end;
          font-size: 1.75rem;
          color: var(--neutral-950);
        }
      }
      &Toggler {
        appearance: none;
        background-color: transparent;
        border: 2px solid transparent;
        padding: var(--spacing-50);
        transition: border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
        z-index: 3;
        & svg.lucide-menu-icon {
          height: 2.125rem;
          width: 2.125rem;
          stroke: var(--neutral-950);
          transition: stroke 0.2s ease-in-out;
        }
        &:hover {
          border-color: var(--neutral-950);
        }
        &:active {
          background-color: var(--neutral-1000);
          svg.lucide-menu-icon {
            stroke: var(--color-main);
          }
        }
      }
    }
  }
}
</style>
