<template>
  <div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">
                City Name: {{ data.city }}
            </h1>
            <h2 class="subtitle">
                Hero subtitle
            </h2>
            </div>
        </div>
    </section>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        data:{}
        }
    },
    methods: {
      fetchData() {
       this.errors = {};
       axios.post('/input').then (response => (this.data = response.data)
        //    response => (this.city = console.log(response.data))
      ).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
     }
    }
  }
</script>