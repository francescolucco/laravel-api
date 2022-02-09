<template>
<main>
   <div class="container">
       <h1>I miei post</h1>
       <PostItem
       v-for="post in posts"
       :key= "post.id"
       :post= "post"
       />
   </div>
</main>
</template>

<script>

import PostItem from './PostItem.vue'


export default {

   name: 'Posts',

   components: {
      PostItem
   },

   data(){
      return{
         apiUrl: 'http://127.0.0.1:8000/api/posts',
         posts: null,
      }
   },

   mounted(){
      this.getPost();
   },
   methods:{
      getPost(){
         axios.get(this.apiUrl)
         .then(res => {
            this.posts = res.data;
            console.log(this.posts);
         })
      }
   }
}

</script>

<style lang='scss'>
main{
   padding: 30px 0;
   .container{
      h1{
         margin-bottom: 30px;
      }
   }
}

</style>