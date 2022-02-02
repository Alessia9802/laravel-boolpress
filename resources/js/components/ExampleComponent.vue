<template>
    <div class="container">
        <div class="card text-left" v-for="post in posts">
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
    mounted() {
        console.log("Component mounted.");
        Axios.get("/api/posts")
            .then((resp) => {
                console.log(resp);
                this.posts = resp.data.data;
            })
            .catch((e) => {
                console.error("Sorry! " + e);
            });
    },
};
</script>
