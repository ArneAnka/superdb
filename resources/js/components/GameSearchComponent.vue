<template>
  <div class="relative">
      <input type="text"
      class="bg-gray-800 text-small rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1"
      placeholder="Search..."
      name="q"
      autocomplete="off"
      v-model="search"
      id="search">

    <div class="absolute top-0 flex items-center h-full ml-2"><svg class="text-gray-400 w-4" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 14.5l-4-4m-4 2a6 6 0 110-12 6 6 0 010 12z" stroke="currentColor"></path></svg></div>


        <!-- Vue Search List Start-->
        <ul v-cloak v-if="games" v-bind:style="{ width : width + 'px' }" class="widget">
            <li v-for="(game,key) in games" :id="key +1"
            v-bind:class="[(key + 1 == count) ? activeClass : '', menuItem]">
            <a v-bind:href="game.url" >
                <div class="list_item_container" v-bind:title="game.title">
                    <div class="image">
                        <img v-bind:src="game.image" >
                    </div>
                    <div class="label">
                        <h4>{{ game.title  }}</h4>
                        <h5>{{ game.console }}</h5>
                    </div>
                </div>
            </a>
        </li>
    </ul> <!-- Vue Search List End-->
    
</div>
</template>

<script>
import _ from 'lodash';
 export default {
        data: function(){
            return{
                games : '',
                search : '',
                count : 0,
                width: 0,
                menuItem : 'menu-item',
                activeClass : 'active'  
            }
        },
        methods: {
            getGames: _.debounce(function() {
                this.games = "";
                this.count = 0;
                self = this;

                if (this.search.trim() != '') {
                    axios.post(location.protocol + "//" + location.host + "/search",{
                        search : self.search
                    })
                    .then(function (response) {
                      self.games = response.data;
                  })
                    .catch(function (error) {
                        // console.log(error);
                    });  
                }

            }, 500),
            selectGame: function(keyCode) {
                // If down arrow key is pressed
                if (keyCode == 40 && this.count < this.games.length) {
                    this.count++;
                }
                // If up arrow key is pressed
                if (keyCode == 38 && this.count > 1) {
                    this.count--;
                }
                // If enter key is pressed
                if (keyCode == 13) {
                    // Go to selected post
                    document.getElementById(this.count).childNodes[0].click();
                }
            },
            clearData: function(e) {
                if (e.target.id != 'search') {
                    this.games = '',
                    this.count = 0
                }
            }
        },
        mounted:function(){
            self = this;
            // get width of search input for vue search widget on initial load
            this.width = document.getElementById("search").offsetWidth; 
            // get width of search input for vue search widget when page resize
            window.addEventListener('resize', function(event){
                self.width = document.getElementById('search').offsetWidth; 
            });

            // To clear vue search widget when click on body
            document.body.addEventListener('click',function (e) {
             self.clearData(e);
         });

            document.getElementById('search').addEventListener('keydown', function(e) {
                // check whether arrow keys are pressed
                if(_.includes([37, 38, 39, 40, 13], e.keyCode) ) {
                    if (e.keyCode === 38 || e.keyCode === 40) {
                        // To prevent cursor from moving left or right in text input
                        e.preventDefault();
                    }

                    if (e.keyCode === 40 && self.games == "") {
                        // If post list is cleared and search input is not empty 
                        // then call ajax again on down arrow key press 
                        self.getGames();
                        return;
                    }

                    self.selectGame(e.keyCode);

                } else {
                    self.getGames();
                }
            });
        },
    }
</script>
