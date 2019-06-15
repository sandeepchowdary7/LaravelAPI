<template>
  <div class="container">
    <section class="hero is-info is-medium is-bold">
        <div class="hero-body" style="padding-bottom: 3px; padding-top: 71px;">
            <div class="columns is-vcentered">
                <div class="column is-10">
                    <GmapMap ref="mapRef"
                        :center="{lat:10, lng:10}"
                        :zoom="7"
                        map-type-id="terrain"
                        style="width: 600px; height: 450px"
                    >
                    <GmapMarker
                        :key="index"
                        v-for="(m, index) in markers"
                        :position="m.position"
                        :clickable="true"
                        :draggable="true"
                        @click="center=m.position"
                    />
                    </GmapMap>
                </div>
                <div class="column">
                    <h1 class="title">
                        {{ results.city.name }}
                    </h1>
                    <h2 class="subtitle">
                        {{ results.weather.description }} <br>
                        <img src="http://openweathermap.org/img/w/01d.png">
                    </h2>
                </div>
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
                            <h2>State & Country</h2>
                            <p>{{ city.name }} - {{ countryName }} </p>
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
                        <ul>   
                            <li v-for="(item, index) in cityTouristPlaces" :key="index"> 
                                <a :href="item.owner_url" target="_blank">
                                    {{ item.caption }}
                                </a>
                            </li>
                        </ul>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">City Food</p>
                        <ul>   
                            <li v-for="(item, index) in cityFoods" :key="index"> 
                                <a :href="item.name" target="_blank" :title="item.intro">
                                    {{ item.name }}
                                </a>
                            </li>
                        </ul>
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
                                <!-- <p class="subtitle">With an image</p> -->
                                <figure class="image is-4by3">
                                    <img v-bind:src="cityView" v-bind:alt="cityView">
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
                            <p class="title">{{city.name}}</p>
                            <p class="subtitle">City Known For</p>
                            <div class="content">
                                <p>{{snippet}}.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Useful Links</p>
                        <!-- <p class="subtitle">With some content</p> -->
                        <div class="content">
                            <ul>   
                                <li v-for="(item, index) in cityLinks" :key="index"> 
                                   <a :href="item.url" target="_blank" style="color:blue;">
                                       {{ item.url }}
                                    </a>
                                </li>
                            </ul>
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
        city: {},
        markers: {},
        cityData: {},
        snippet: '',
        cityView: '',
        cityLinks: [],
        cityTouristPlaces: [],
        cityFoods: [],
        countryName: '',
        }
    },
    mounted () {
        this.$refs.mapRef.$mapPromise.then((map) => {
        map.panTo({lat: this.city.lat, lng: this.city.lon})
        })
    },
    methods: {
      submit() {
       this.results = this.$store.state.users[0];
       this.city = this.results.city;
       this.timezone = this.results.sun.rise.timezone;
       this.getCityDetails();
       this.getCityFood();
     },
     getCityDetails() {
         var self = this;
         var cityName = self.city.name
         axios.get('/cityData?city='+cityName).then(function(response) {
            self.cityData = response.data;
            self.countryName = self.cityData.data.country_id;
            self.snippet = self.cityData.data.snippet;
            self.cityView = self.cityData.data.images[0].sizes.original.url;
            self.cityLinks = self.cityData.data.attribution;
            self.cityTouristPlaces = self.cityData.data.images;
         })
     },
     getCityFood() {
         var self = this;
         var cityName = self.city.name
         axios.get('/cityFood?city='+cityName).then(function(response) {
            self.cityFoods = response.data.data;
         })
     }
    },
    created() {
      this.submit();
    },
  }
</script>

<style scoped src="../../../public/css/hero.css"></style>