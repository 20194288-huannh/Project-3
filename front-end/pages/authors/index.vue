<template>
    <b-container>
        <h4>Featured Authors</h4>
        <div class="grid-container">
            <ItemAuthor/>
            <ItemAuthor/>
            <ItemAuthor/>
            <ItemAuthor/>
            <ItemAuthor/>
            <ItemAuthor/>
            <ItemAuthor/>
        </div>
    </b-container>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
.grid-container {
    display: grid;
    column-gap: 5px;
    grid-template-columns: auto auto ;
}
</style>