<template>
    <h1 
        class="px-8 py-5 flex-grow-1 bg-green color-white"
        :class="bActive === true ? 'bg-green color-white' : ''"
        >
        {{ sKey }}
    </h1>
</template>

<script>
export default {
    props: {
        sKey: {
            type: String,
            required: true
        },
        bActive: {
            type: Boolean,
            default: false
        }
    }
}
</script>
<style scoped>
h1 {
    min-width: 172px;
    max-width: 172px;
    cursor: pointer;
}
</style>
