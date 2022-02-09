<template>
    <article>
        <div class="title">
            <a href="#" >{{ post.id }}) {{ post.title }}</a>
        </div>
        <div class="date">{{ formatDate }}</div>
        <div class="text">{{ truncateText }}</div>
    </article>
</template>

<script>
export default {
    name: "Postitem",

    props: {
        post: Object,
    },
    computed:{
       truncateText(){
          return this.post.description.substr(0, 80) + '...'
       },
       formatDate(){
          const d = new Date(this.post.created_at);
          let day = d.getDate();
          let month = d.getMonth() + 1;
          let yaer = d.getFullYear();
          if(day<10){
             day = '0' + day
          };
          if(month<10){
             month = '0' + month
          };

          return `${day}/${month}/${yaer}`;
       }
    }
};
</script>

<style lang="scss" scoped>
article {
    margin: 30px 0;
    .title {
        font-weight: bold;
        font-size: 20px;
        a{
           text-decoration: none;
           color: brown;
        }
    }
    .date {
        font-size: 12px;
        font-style: italic;
        margin: 5px 0;
    }
}
</style>
