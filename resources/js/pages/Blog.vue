<template>
    <div class="blog_page">
        <h1>Blog</h1>
        <post-list></post-list>
        <div class="pagination">
            <span class="btn text-secondary">Prev</span>
            <span class="btn btn-primary">{{ meta.current_page }}</span>
            <span class="btn text-secondary">Next</span>
        </div>
    </div>
</template>

<script>
import PostListComponentVue from "../components/PostListComponent.vue";
export default {
    components: { PostListComponentVue },
    data: function () {
        return {};
    },
    nextPage() {
        console.log("Clicked on next page");
    },
    prevPage() {
        console.log("Clicked on prev page");
    },
};
</script>

<style></style>
