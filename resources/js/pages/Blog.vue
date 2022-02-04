<template>
    <div class="blog_page">
        <h1>Blog</h1>
        <post-list></post-list>
    </div>
</template>

<script>
import PostListComponentVue from "../components/PostListComponent.vue";
export default {
    components: { PostListComponentVue },
    data: function () {
        return {};
    },
};
</script>

<style></style>
