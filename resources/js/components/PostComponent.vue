<template>
    <div class="post">
        <div class="card">
            <img :src="'/storage/' + post.cover" alt="" />
            <div class="card-body">
                <h3>{{ post.title }}</h3>
                <p>{{ post.category }}</p>
                <p>{{ post.tag }}</p>
                <a :href="'/posts/' + post.id" v-if="!isSingle">View Post</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
