<template>
  <div class="card">
    <div class="match-title">
      {{post.id}}) {{post.title}}
    </div>
    <div class="date">
      Data del match: {{formatData}}
    </div>
    <div class="description">
      <strong>Cronaca della partita:</strong><br/>
      {{stringShrinkage}}
    </div>

  </div>
</template>

<script>
export default {
   name: 'PostItem',

   props:{
     post: Object
   },
   computed:{
     stringShrinkage(){
        return this.post.description.substring(0, 140) + '...'
     },
     formatData(){
       const d = new Date(this.post.created_at);
       let day = d.getDate();
       let month = d.getMonth();
       let year = d.getFullYear();
       if(day < 10)  day = '0' + day;
       if(month < 10) month = '0' + month;
       return `${day}/${month}/${year}`
     }
   },

   methods:{

   }
}
</script>

<style lang="scss" scoped>
.card{
  margin: 40px 0;
  padding: 15px;
  border-radius: 5px;
  border: 2px solid rgba(0,46,113,0);
  &:hover{
    color: rgba(1,46,113,255);
    border: 2px solid rgba(1,46,113,255);
    cursor: pointer;
  }
  .match-title{
    text-transform: uppercase;
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 5px;
  }
  .date{
    font-size: 12px;
    font-style: italic;
  }
  .description{
    padding-top: 10px;
  }

}

</style>