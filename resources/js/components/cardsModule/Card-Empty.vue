<template>
    <div>
        <b-card
            bg-variant="light"
            text-variant="dark"
            title=""
            style="width: 16rem; height: 25rem;"
            img-src="https://i.postimg.cc/HxZ869cT/candado.png"
            img-top
            img-alt="Card image"
            img-width="160px"
            img-height="230px"
            class="mb-2"
            body-class="text-center">
            <b-card-text>New functionality coming soon</b-card-text>
            <b-button class="text-dark" href="#" variant="outline-warning"> Bloqueado </b-button>
        </b-card>
    </div>
</template>

<script>
export default {
name: "Card-Empty",
    data() {
        return {
            image_src: '@../public/src/release.png',
        }
    },
    methods:{

    },
    computed:{

    }
}
</script>

<style scoped>

</style>
