<template>
    <div>
        <nav-menu></nav-menu>
        <router-view></router-view>
        <site-footer></site-footer>
    </div>
</template>

<script>
    Vue.component('NavMenu', require('./Navigation.vue'));
    Vue.component('SiteFooter', require('./Footer.vue'));
</script>