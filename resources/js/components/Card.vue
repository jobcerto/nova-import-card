<template>
  <card class=" p-2 h-auto">

   <el-upload class="w-full"
   :headers="headers"
   :show-file-list="false"
   :data="attributes"
   :on-success="success"
   drag
   ref="upload"
   action="/nova-vendor/nova-import-card/import">
   <i class="el-icon-upload"></i>
   <div class="el-upload__text"><h3>{{ card.title }}</h3></div>
   <div class="el-upload__tip">{{ card.body }}</div>
 </el-upload>

</card>
</template>

<script>
  export default {
    props: [ 'card' ],

    mounted() {
      console.log(this.card);
    },

    methods: {
      success() {
       this.$router.go(this.$router.currentRoute)
     }
   },

   computed: {
    headers() {
      return window.axios.defaults.headers.common;
    },

    attributes() {
      return {
        using: this.card.using,
        columns: this.card.columns,
      }
    }
    
  }
}
</script>
<style>
.el-upload-dragger, .el-upload {
  width: 100% !important;
}
</style>
