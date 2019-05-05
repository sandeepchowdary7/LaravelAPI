<template>
  <div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">
                Hero title
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
        form: {
          name: '',
          city: '',
          email: ''
        },
        show: true
      }
    },
    methods: {
      submit() {
       this.errors = {};
       axios.post('/input', this.form).then(response => (this.info = response)
      ).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
     },
     resetForm() {
        var self = this; //you need this because *this* will refer to Object.keys below`

        //Iterate through each object field, key is name of the object field`
        Object.keys(this.form).forEach(function(key,index) {
          self.form[key] = '';
        });
      }
    }
  }
</script>