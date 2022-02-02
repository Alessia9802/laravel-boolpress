<template>
    <div class="container">
        <div
            class="card text-left"
            v-for="post in posts"
            v-bind:key="post"
            v-bind="key"
        >
            <img class="card-img-top" src="holder.js/100px180/" alt="" />
            <div class="card-body">
                <h4 class="card-title">@{{ post.title }}</h4>
                <p class="card-text">@{{ post.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: {
        posts: null,
    },
    mounted() {
        Axios.get("/api/posts")
            .then((resp) => {
                console.log(resp);
                this.posts = resp.data.data;
            })
            .catch((e) => {
                console.error("Sorry! " + e);
            });
        console.log("Component mounted.");
    },
};
</script>
