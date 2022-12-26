<template>
    <b-container fluid>
        <b-row>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
            <b-col>
                <ItemBook/>
            </b-col>
        </b-row>
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

</style>