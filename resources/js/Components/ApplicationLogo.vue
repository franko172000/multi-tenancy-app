<template>
    <div>
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" v-if="!logo">
        <img :src="`/images/${logo}`" class="h-24 w-auto" v-if="logo" />
    </div>
</template>
<script>
export default {
    props:{
        logo: null
    }
}
</script>
