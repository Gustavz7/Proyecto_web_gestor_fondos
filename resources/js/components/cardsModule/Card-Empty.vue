<template>
    <b-card
        border-variant="primary"
        bg-variant="light"
        text-variant="dark"
        title=""
        style="
            max-width: 16rem;
            max-height: 25rem;
            min-width: 16rem;
            min-height: 25rem;"
        img-src="https://i.postimg.cc/HxZ869cT/candado.png"
        img-top
        img-alt="Card image"
        img-width="160px"
        img-height="230px"
        class="m-2"
        body-class="text-center">
        <b-card-text>New functionality coming soon</b-card-text>
        <b-button class="text-dark" href="#" variant="outline-primary"> Bloqueado</b-button>
    </b-card>
</template>

<script>
export default {
    name: "Card-Empty",
    data() {
        return {
            image_src: '@../public/src/release.png',
        }
    },
    methods: {},
    computed: {}
}
</script>

<style scoped>

</style>
