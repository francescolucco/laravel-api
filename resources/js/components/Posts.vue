<template>
<main>
   <div class="container">
       <h1>I miei post</h1>

       <PostItem
       v-for="post in posts"
       :key= "post.id"
       :post= "post"
       />

       <div class="navigation">
          <button
          :disabled="pagination.current === 1"
          @click="getPosts(pagination.current - 1)"
          >Back</button>
          <button
          v-for="i in pagination.last"
          :key="i"
          @click="getPosts(i)"
          :disabled="pagination.current === i"
          >{{i}}</button>
          <button
          @click="getPosts(pagination.current + 1)"
          >Next</button>
       </div>
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
         apiUrl: 'http://127.0.0.1:8000/api/posts?page=',
         posts: null,
         pagination:{},
      }
   },

   mounted(){
      this.getPosts();
   },
   methods:{
      getPosts(page = 1){
         axios.get(this.apiUrl + page)
         .then(res => {
            this.posts = res.data.data;
            this.pagination = {
               current: res.data.current_page,
               last: res.data.last_page
            };
            console.log(this.pagination);
         })
      }
   }
}

</script>

<style lang='scss'>
main{
   padding: 150px 0;
   .container{
      h1{
         margin-bottom: 30px;
      }
      .navigation{
         button{
            padding: 10px;
            margin: 3px;
            cursor: pointer;
            border-radius: 10px;
            &:hover{
               background-color: black;
               color: white;
            }
         }
      }
   }

}

</style>