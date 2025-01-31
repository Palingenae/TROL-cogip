<script lang="ts" setup>
import { MapPin, Phone, Printer, Facebook, Twitter, Linkedin, Instagram, Rss } from 'lucide-vue-next';

</script>

<template>
  <footer class="footer">
    <hr class="footer_hr"/>
    <div class="footer_main">
      <h3 class="footer_main_title">COGIP</h3>
      <div class="footer_main_head">
        <p><MapPin /> 345 Faulconer Drive, Suite 4 • Charlottesville, CA, 12345</p>
        <p class="footer_main_head-number">
          <span><Phone />(123) 456-7890</span>
          <span><Printer />(123) 456-7890</span>
        </p>
        <!-- missing icon form google+ and Pinterest will be removed form the footer after Front-team decision -->
        <p class="footer_main_body footer_main_body-social"> Social Media <Facebook /> <Twitter /> <Linkedin />  <Instagram /> <Rss /></p>
      </div>
    </div>
    <hr/>
    <nav class="footer_nav">
      <div class="footer_nav-items">
        <a href="/" class="footer_nav-items-link">home</a>
        <a href="/invoices" class="footer_nav-items-link">invoices</a>
        <a href="/compagnies" class="footer_nav-items-link">compagnies</a>
        <a href="/contacts" class="footer_nav-items-link">contacts</a>
        <a href="/privacy-policy" class="footer_nav-items-link">privacy policy</a>
      </div>
      <h5 class="footer_nav-copyright">Copyright © 2022 • COGIP Inc.</h5>
    </nav>
  </footer>
</template>

<style lang="scss" scoped>

hr {
  margin: 2rem 0;
  border: 1px solid var(--neutral-200);
}

svg.lucide {
  color: var(--color-main);
  width: 1.3rem;
  vertical-align: bottom;
  margin-right: 0.8rem;
}

.footer {
  padding: 0 8rem;

  &_hr {
    margin: 4rem 0;
    border: 1px solid var(--color-main);
  }

  &_main {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;

    &_title {
      font-size: 2rem;
      font-weight: 700;
      border: 4px solid var(--color-main);
      padding: 0 5px;
    }

    &_head {
      font-size: 0.8rem;
      color: var(--neutral-800);
      display: flex;
      flex-direction: column;
      gap: 1rem;

      &-number {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
      }
    }

    &_body {
      color: var(--neutral-400);

      &-social {
        display: inline-flex;
        flex-direction: row;
        align-items: flex-end;
        gap: 1rem;
      }
    }
  }

  &_nav {
    font-size: 0.8rem;

    display: flex;
    flex-direction: row;
    text-transform: uppercase;
    justify-content: space-between;

    &-items {
      display: inline-flex;
      flex-direction: row;
      gap: 1rem;

      &-link {
        text-decoration: none;
        color: var(--neutral-800);
        transition: color 0.2s ease-in-out;

        &:hover {
          color: var(--color-main);
          transition: color 0.2s ease-in-out;

        }
      }
    }

    &-copyright {
      font-size: 0.6rem;
      color: var(--neutral-400);
      float: right;
      text-transform: initial;
    }
  }
}
</style>
