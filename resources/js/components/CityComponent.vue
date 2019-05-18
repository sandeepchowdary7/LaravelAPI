<template>
  <div class="container">
    <section class="hero is-info is-medium is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    {{ results.city.name }}
                </h1>
                <h2 class="subtitle">
                    {{ results.weather.description }} <br>
                    <img src="http://openweathermap.org/img/w/01d.png">
                </h2>
            </div>
        </div>
    </section>
    <div class="box cta">
        <p class="has-text-centered">
            <span class="tag is-primary">Note</span> Thanks For Visiting us.
        </p>
    </div>
    <section class="container">
        <div class="columns features">
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <i class="fa fa-paw"></i>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>City Info & Culuture</h4>
                            <p>blah blah blah </p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <i class="fa fa-empire"></i>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>City Food</h4>
                            <p>Food Food Food Food.</p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <i class="fa fa-apple"></i>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4> Recommended </h4>
                            <p>This is what we recommand.</p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro column is-8 is-offset-2">
            <h2 class="title">Perfect Plannig For Visitors and Travellers!</h2><br>
            <p class="subtitle">Know more about city, deals and specials.</p>
        </div>
        <div class="sandbox">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Tourist Info</p>
                        <p class="subtitle">What is up?</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Tech Headquarters</p>
                        <p class="subtitle">Bar</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Schools</p>
                        <p class="subtitle">With schools content</p>
                        <div class="content">
                            <p>Lorem ipsum.</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification is-white">
                                <p class="title">Transportation</p>
                                <p class="subtitle">Top box</p>
                            </article>
                            <article class="tile is-child notification is-white">
                                <p class="title">Shopping Places</p>
                                <p class="subtitle">Bottom box</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-white">
                                <p class="title">City View</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://picsum.photos/640/480/?random" alt="Description">
                                </figure>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent is-shady">
                        <article class="tile is-child notification is-white">
                            <p class="title">Safe Neighbourhood</p>
                            <p class="subtitle">Aligned with the right column</p>
                            <div class="content">
                                <p>Lorem ipsum dolor.</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <div class="content">
                            <p class="title">City History</p>
                            <p class="subtitle">With even more content</p>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula
                                eleifend, nunc dui porta orci, quis semper odio felis ut quam.</p>
                                <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet
                                felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Useful Information</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent is-8 is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Credits</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum.</p>
                        </div>
                    </article>
                </div>
            </div>
            <!-- <div class="tile is-ancestor">
                <div class="tile is-parent is-8 is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Murphy's law</p>
                        <p class="subtitle">Anything that can go wrong will go wrong</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Main column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
            </div> -->
        </div>
    </section>
  </div>
</template>

<script>
import store from '../store.js'

  export default {
    data() {
      return {
        results: {},
        city: {}
        }
    },
    methods: {
      submit() {
       this.results = this.$store.state.users[0];
       this.city = this.results.city;
     },
    },
    created() {
      this.submit();
    }
  }
</script>

<style scoped src="../../../public/css/hero.css"></style>