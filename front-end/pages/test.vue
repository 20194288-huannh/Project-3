<template>
    <b-container fluid>
        <b-row>
            <b-col cols="3"></b-col>
            <b-col cols="9" class="d-flex flex-column">
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
                <HorizontalBook/>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import ItemBook from '../components/VerticalBook.vue'
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
    grid-template-columns: auto auto ;
}

</style>