<template>
    <div>
        <nav-menu></nav-menu>
        <router-view></router-view>
    </div>
</template>

<script>
    Vue.component('NavMenu', require('./Navigation.vue'));
</script>