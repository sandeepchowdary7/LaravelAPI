<template>
  <div class="container">
    <section class="hero is-12 is-light is-fullheight">
        <div class="hero-body is-12">
            <div class="container is-12 has-text-centered">
                <div class="column is-8 is-offset-2">
                    <h3 class="title has-text-white">Welcome</h3>
                    <p class="subtitle has-text-white">Please Enter the details to proceed.</p>
                    <div class="box" style="background-image: repeating-linear-gradient(90deg, hsl(138,66%,68%, 0.52) 0px, hsl(138,66%,68%, 0.52) 124px,hsl(183,66%,68%, 0.52) 124px, hsl(183,66%,68%, 0.52) 248px,hsl(228,66%,68%, 0.52) 248px, hsl(228,66%,68%, 0.52) 372px,hsl(273,66%,68%, 0.52) 372px, hsl(273,66%,68%, 0.52) 496px,hsl(318,66%,68%, 0.52) 496px, hsl(318,66%,68%, 0.52) 620px,hsl(3,66%,68%, 0.52) 620px, hsl(3,66%,68%, 0.52) 744px,hsl(48,66%,68%, 0.52) 744px, hsl(48,66%,68%, 0.52) 868px,hsl(93,66%,68%, 0.52) 868px, hsl(93,66%,68%, 0.52) 992px),repeating-linear-gradient(45deg, hsl(98,76%,58%, 0.37) 0px, hsl(98,76%,58%, 0.37) 56px,hsl(143,76%,58%, 0.37) 56px, hsl(143,76%,58%, 0.37) 112px,hsl(188,76%,58%, 0.37) 112px, hsl(188,76%,58%, 0.37) 168px,hsl(233,76%,58%, 0.37) 168px, hsl(233,76%,58%, 0.37) 224px,hsl(278,76%,58%, 0.37) 224px, hsl(278,76%,58%, 0.37) 280px,hsl(323,76%,58%, 0.37) 280px, hsl(323,76%,58%, 0.37) 336px,hsl(8,76%,58%, 0.37) 336px, hsl(8,76%,58%, 0.37) 392px,hsl(53,76%,58%, 0.37) 392px, hsl(53,76%,58%, 0.37) 448px),repeating-linear-gradient(135deg, #b461e7,#c679ff,#c7e3ab,#c3b8e1 3px);">
                        <figure class="avatar">
                            <!-- <img src="../../../public/images/php-pool.png" style="width:100px;height:80px;"> -->
                        </figure>
                        <form @submit.prevent="submit" v-if="show">
                            <div class="field">
                                <div class="control">
                                    <input class="input required is-large" type="text" placeholder="City Name" v-model="form.city" value="" autofocus="">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" placeholder="Your Name" v-model="form.name">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="email" placeholder="Your Email" v-model="form.email" value="">
                                </div>
                            </div>
                            <!-- <div class="field">
                                <label class="checkbox">
                                  <input type="checkbox">
                                  Remember me
                                </label>
                            </div> -->
                             <div class="field is-grouped">
                              <input type="submit" @click.stop.prevent="submit()" class="button is-block is-info is-large is-fullwidth" value="Submit">
                              <input type="button" class="button is-block is-large is-fullwidth is-danger" @click="resetForm()" value="Cancel">
                             </div>
                        </form>
                    </div>
                    <p class="has-text-white">
                        <a href="#">Need Help?</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
  </div>
</template>

<script>
import store from '../store.js'

  export default {
    data() {
      return {
        students: {},
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
       var self = this;
       axios.post('/input', this.form).then(response => {
            this.students = response.data.data;
          if(response.status === 200) {
            self.$store.state.users.push(self.students)
            self.$router.push({ path : '/city' });
            }
      }).
      catch(error => {
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