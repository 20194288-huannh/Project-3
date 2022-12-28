<template>
    <b-container fluid>
        <div class="grid-container">
            <ItemBook/>
            <ItemBook/>
            <ItemBook/>
            <ItemBook/>
            <ItemBook/>
            <ItemBook/>
            <ItemBook/>
        </div>
    </b-container>
</template>

<script>
import ItemBook from '../components/ItemBook.vue'
    export default {
        components: {
            ItemBook,
        },
        name: "Test"
    }
</script>

<style lang="scss" scoped>
.grid-container {
    display: grid;
    column-gap: 5px;
    grid-template-columns: auto auto auto auto auto auto auto ;
}

</style>