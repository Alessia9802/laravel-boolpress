<template>
    <div class="container">
        <div class="blog" v-for="post in posts" v-bind:key="post" v-bind="key">
            <div class="card">
                <img :src="'/storage/' + post.cover" alt />
                <div class="card-body">
                    <h3>{{ post.title }}</h3>
                    <p>{{ post.category }}</p>
                    <p>{{ post.tag }}</p>
                    <router-link :to="'/posts/' + post.id"
                        >View post</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: {
        posts: null,
        loading: true,
    },
    mounted() {
        Axios.get("/api/posts")
            .then((resp) => {
                console.log(resp);
                this.posts = resp.data.data;
                this.loading = false;
            })
            .catch((e) => {
                console.error("Sorry! " + e);
            });
        console.log("Component mounted.");
    },
};
</script>
