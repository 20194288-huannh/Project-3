<template>
    <div>
        <carousel :autoplay="true" :nav="false" :items="7" :loop="true" :center="true" :mouseDrag="true" :dots="false">
            <template slot="prev"><span class="prev">prev</span></template>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <VerticalBook/>
            <template slot="next"><span class="next">next</span></template>
        </carousel>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scope>
.owl-nav{
    position: absolute;
    top: 100px;
    width: 100%;
    left: 0
}
.prev, .next{
    background: 0 0;
    color: inherit;
    border: none;
    padding: 0 !important;
    font: inherit;
}
.prev{
    position: absolute;
    left: -28px;
    font-size: 60px !important;
    color: #000;
    top: -43px;
    outline: 0;
}
.right{
    position: absolute;
    right: -28px;
    font-size: 60px !important;
    color: #000;
    top: -43px;
    outline: 0;
}
</style>
