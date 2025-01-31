<script lang="ts" setup>
import { MapPin, Phone, Printer, Facebook, Twitter, Linkedin, Instagram, Rss } from 'lucide-vue-next';
import NavLink from "@/components/Employee/NavLink.vue";

import { useRouter } from 'vue-router';

const router = useRouter();

router.options.routes.push(    {
  path: '/privacy',
  name: 'Privacy Policy',
});
</script>

<template>
  <footer class="footer">
    <hr class="footer__separator --colored"/>
    <div class="footer__main">
      <h3 class="footer__main_title">COGIP</h3>
      <div class="footer__main_head">
        <div><MapPin /> 345 Faulconer Drive, Suite 4 • Charlottesville, CA, 12345</div>
        <div class="footer__main_head-number">
          <span><Phone />(123) 456-7890</span>
          <span><Printer />(123) 456-7890</span>
        </div>
        <!-- missing icon form google+ and Pinterest will be removed form the footer after Front-team decision -->
        <div class="footer_main_body footer_main_body-social"> Social Media <Facebook /> <Twitter /> <Linkedin />  <Instagram /> <Rss /></div>
      </div>
    </div>
    <hr class="footer__separator"/>
    <div class="footer__bottom">
      <nav class="footer__nav">
        <NavLink v-bind:route="route.path.toString()" v-for="(route, index) in router.options.routes" :key="index">{{ route.name }}</NavLink>
      </nav>
      <h5 class="footer__copyright">Copyright &copy; {{new Date().getFullYear()}} • COGIP Inc.</h5>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
@use "../../assets/styles/modules/breakpoints";

svg.lucide {
  color: var(--color-main);
  width: 1.3rem;
  vertical-align: bottom;
  margin-right: 0.8rem;
}

.footer {
  padding: var(--spacing-800);

  @include breakpoints.xxl {
    padding: var(--spacing-400) var(--spacing-1600);
  }

  @include breakpoints.lg {
    padding: var(--spacing-400);
  }

  @include breakpoints.md {
    padding: var(--spacing-200) var(--spacing-100);
  }

  &__separator {
    border: 1px solid var(--neutral-200);
    &.--colored {
      border-color: var(--color-main);
    }
  }

  &__main {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    padding: var(--spacing-600) var(--spacing-400);

    &_title {
      font-size: 2rem;
      font-weight: 700;
      border: 4px solid var(--color-main);
      padding: 0 5px;
    }

    &_head {
      color: var(--neutral-800);
      display: flex;
      flex-direction: column;
      gap: 1rem;

      &-number {
        display: flex;
        flex-direction: row;
        gap: var(--spacing-200);
      }
    }

    &_body {
      color: var(--neutral-400);

      &-social {
        display: inline-flex;
        flex-direction: row;
        align-items: flex-end;
        gap: var(--spacing-200);
      }
    }
  }

  &__nav {
    font-size: 0.8rem;

    display: flex;
    flex-direction: row;
    text-transform: uppercase;
    align-items: center;

    &__items {
      display: inline-flex;
      flex-direction: row;
      gap: 1rem;
    }


  }

  &__bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--spacing-150) 0;
  }

  &__copyright {
    color: var(--neutral-400);
    float: right;
    text-transform: initial;
  }
}
</style>
