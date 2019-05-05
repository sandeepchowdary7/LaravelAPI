<template>
  <div class="container">
    <form @submit.prevent="submit" v-if="show">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" required type="text" placeholder="Enter Name"  v-model="form.name">
        </div>
      </div>

      <div class="field">
        <label class="label">City</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input required content-box" type="text" placeholder="Enter City Name" v-model="form.city" value="">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" required type="email" placeholder="Enter Email" v-model="form.email" value="">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>

      <div class="field is-grouped">
        <div class="control">
          <input type="submit" class="button is-link is-success" value="Submit">
        </div>
        <div class="control">
          <input type="button" class="button is-danger" @click="resetForm()" value="Cancel">
        </div>
      </div>
    </form>
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
       axios.post('/input', this.form).then(response => {
          if(response.status === 200) {
               this.$router.push({ path : '/city' });
            }
      }).catch(error => {
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