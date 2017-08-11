<template>
    <div>
        <nav-menu></nav-menu>
        <router-view></router-view>
        <site-footer></site-footer>
        <modal v-show="showModal" :data="modalData"></modal>
    </div>
</template>

<script>
    Vue.component('NavMenu', require('./Navigation.vue'));
    Vue.component('SiteFooter', require('./Footer.vue'));
    Vue.component('modal', require('./elements/modal.vue'));

    export default {
        data() {
            return {
                showModal: false,
                modalData: null
            }
        },

        created() {
            Event.$on('close', () => this.showModal = false );

            Event.$on('open', (data) => this.openDialog(data) );
        },

        methods: {
            openDialog: function(data) {
                this.modalData = data;
                this.showModal = true;
            }
        }
    }
</script>