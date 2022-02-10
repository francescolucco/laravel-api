<template>
    <main>
        <div class="container">
            <h1>HELLAS VERONA</h1>

            <PostItem v-for="post in posts" :key="post.id" :post="post" />

            <div class="button">
                <button
                    @click="getPosts(pagination.current - 1)"
                    :disabled="pagination.current === 1"
                >
                    Back
                </button>
                <button
                    v-for="i in pagination.last"
                    :key="i"
                    @click="getPosts(i)"
                    :disabled="pagination.current === i"
                    :class="pagination.current === i ? 'active' : ''"
                >
                    {{ i }}
                </button>
                <button
                    @click="getPosts(pagination.current + 1)"
                    :disabled="pagination.current === pagination.last"
                >
                    Back
                </button>
            </div>
        </div>
    </main>
</template>

<script>
import PostItem from "./PostItem.vue";

export default {
    name: "Posts",

    components: {
        PostItem,
    },

    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/posts?page=",
            posts: null,
            pagination: {},
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            console.log("page", page);

            axios.get(this.apiUrl + page).then((res) => {
                this.posts = res.data.data;
                this.pagination = {
                    current: res.data.current_page,
                    last: res.data.last_page,
                };
                console.log(this.pagination);
            });
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    padding: 130px 0 50px 0;
    background-color: yellow;
    h1 {
        text-align: center;
        font-size: 40px;
        color: rgba(1, 46, 113, 255);
    }
    .button {
        display: flex;
        justify-content: space-between;
        button {
            padding: 6px;
            border-radius: 5px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
                sans-serif;
            background-color: rgba(1, 46, 113, 255);
            color: yellow;
            font-weight: bold;
            &.active {
                background-color: yellow;
                color: rgba(1, 46, 113, 255);
            }
        }
    }
}
</style>
