<template>
  <ul class="topmenubar sticky-top">
    <nav id = "menubarNavbar" class="navbar navbar-expand-sm navbar-light">
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto">
          <li class="mega-dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-fw fa-university"></i> <span v-text="uxmenu['shopbycategory']"> </span><i class="arrow down"></i></a>
            <ul class="dropdown-menu mega-dropdown-menu">
              <ul id="megamenuID01" class="row">
                <li class="categorylist" >
                  <ul>
                    <li v-text="uxmenu['topcategories']" class="dropdown-header"></li>
                    <li class="divider"></li>
                    <li v-text="uxmenu['artnphotography']" ></li>
                    <li v-text="uxmenu['biography']" ></li>
                    <li v-text="uxmenu['childrenbook']" ></li>
                    <li v-text="uxmenu['craftnhobby']" ></li>
                    <li v-text="uxmenu['crimenthriller']" ></li>
                    <li v-text="uxmenu['fiction']" ></li>
                    <li v-text="uxmenu['foodndrink']" ></li>
                    <li v-text="uxmenu['historynarchaeology']" ></li>
                    <li v-text="uxmenu['mindbodynsprit']" ></li>
                    <li v-text="uxmenu['sciencefictionfantasynhorror']" ></li>
                  </ul>
                </li>
                <li class="categorylist" style="border-left: 1px solid lightgray;">
                  <ul>
                    <li class="dropdown-header" v-text="uxmenu['morecategories']"></li>
                    <li class="divider"></li>
                    <li v-text="uxmenu['audiobooks']" ></li>
                    <li v-text="uxmenu['businessfinancenlaw']" ></li>
                    <li v-text="uxmenu['computing']" ></li>
                    <li v-text="uxmenu['dictionariesnlanguages']" ></li>
                    <li v-text="uxmenu['health']" ></li>
                    <li v-text="uxmenu['homengarden']" ></li>
                    <li v-text="uxmenu['humor']" ></li>
                    <li v-text="uxmenu['romance']" ></li>
                    <li v-text="uxmenu['medical']" ></li>
                    <li v-text="uxmenu['naturalhistory']" ></li>
                    <li v-text="uxmenu['personaldevelopment']" ></li>
                    <li v-text="uxmenu['poetryndrama']" ></li>
                  </ul>
                </li>
                <li class="categorylist" style="margin-top:30px">
                  <ul>
                    <li v-text="uxmenu['reference']" ></li>
                    <li v-text="uxmenu['religion']" ></li>
                    <li v-text="uxmenu['sciencengeography']" ></li>
                    <li v-text="uxmenu['societynsocialscience']" ></li>
                    <li v-text="uxmenu['sport']" ></li>
                    <li v-text="uxmenu['stationery']" ></li>
                    <li v-text="uxmenu['techingresourceneducation']" ></li>
                    <li v-text="uxmenu['technologynengineering']" ></li>
                    <li v-text="uxmenu['teennyoungadult']" ></li>
                    <li v-text="uxmenu['transport']" ></li>
                    <li v-text="uxmenu['travelnholidayguides']" ></li>
                  </ul>
                </li>
                <li class="categorylist"  style="border-left: 1px solid lightgray;">
                  <ul>
                    <li class="dropdown-header" v-text="uxmenu['topauthors']"></li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                  </ul>
                </li>
                <li class="categorylist">
                  <ul>
                    <li class="dropdown-header" v-text="uxmenu['bestsellingseries']"></li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                  </ul>
                  <ul>
                    <li class="dropdown-header" v-text="uxmenu['popularfeature']"></li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                  </ul>
                </li>
              </ul>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" ><i class="fa fa-fw fa-book" aria-hidden="true"></i> <span v-text="uxmenu['commingsoon']"> </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="books/offers"> <i class="fa fa-user" aria-hidden="true"></i> <span v-text="uxmenu['newreleases']"> </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="books/publishers"> <i class="fa fa-user" aria-hidden="true"></i> <span v-text="uxmenu['bargainshop']"> </span></a>
          </li>
        </ul>
        <ul class=" navbar-nav mr-auto">
          <a href="#" class="nav-link" data-toggle="dropdown" data-hover="dropdown"> <span v-text="currentLang">English</span> <i class="arrow down"></i></a>
            <div class="lang-part dropdown-menu">
              <li @click="changeLangToBN"><span style="cursor:pointer;" :style="{'color':bn_lang}" v-text="bangla_lang"> </span></li>
              <li  @click="changeLangToEN"><span style="cursor:pointer;" :style="{'color':en_lang}" v-text="english_lang"> </span></li>
            </div>
        </ul>
      </div>
    </nav>
  </ul>
</template>
<style scoped>
.arrow {
  margin-left:10px;
  margin-top:0;
  border: solid var(--cd-color-gray);
  border-width: 0 2px 2px 0;
  display: inline-block;
  padding: 3px;
}

.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

.up {
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
}

.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}
#megamenuID01{
  display: flex;
  flex-direction: row;
  list-style: none;
  margin-left:0;
}
.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
  margin-left: 10px;
  width: fit-content;
  text-align: center;
  -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  z-index: 2;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.categorylist > ul > li{
  list-style: none;
  width: 180px;
  text-align: left;
  font-size: 13px;
  text-decoration: none;
  cursor: pointer;
  padding-left: 10px;
}
.lang-part>li:hover ,.categorylist > ul > li:not(:first-child):hover {
  color: var(--cd-color-white);
  background: var(--cd-color-lightgray);
  background-color: var(--cd-color-lightgray);
  cursor: pointer;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  padding: 3px 5px;
}

.mega-dropdown-menu .dropdown-header {
  font-size: 15px;
  color: #0f0546;
  text-align: left;
  line-height: 30px;
  width: fit-content;
  padding:0;
  margin-left: 10px;
  border-bottom: 1px solid lightgray;
}
.topmenubar{
  color: var(--cd-color-gray);
  background: var(--cd-color-bg-menu);
  display: flex;
  flex-direction: row;
  box-shadow: 0 10px 10px -10px #333;
  list-style: none;
  justify-content: space-around;
align-items: center;
}
@media only screen and (max-width: 1200px) {
  .topmenubar{
    flex-wrap: wrap;
  }
}
.nav-link {white-space:nowrap;font-size: 13px;min-width: 160px;}

.lang-part{
left: auto;
padding: 2px 0;
}
.lang-part > li{
  padding: 0 5px;
  font-size: 12px;
}
#navbarToggler{
  padding-top: 5px;
  padding-bottom: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}

#menubarNavbar{
  padding-top: 0px;
  padding-bottom: 0px;
  display: flex;
  flex-grow: 1;
  align-items:stretch;
  justify-content: center;
}
</style>

<script>
export default {
  name:'MenuBarPanel',
  props:['cards','uxmenu'],
  data() {
    return {
      en_lang: '#F00',
      bn_lang: '#555',
      english_lang: 'English',
      bangla_lang: 'Bangla',
      currentLang: 'English',
    }
  },
  methods:{
    changeLangToBN:function(){
      this.$emit('changelang','bn_title');
      this.en_lang='#555';
      this.bn_lang='#F00';
      this.english_lang= 'ইংলিশ';
      this.currentLang= this.bangla_lang= 'বাংলা';
    },
    changeLangToEN:function(){
      this.$emit('changelang','en_title');
      this.en_lang='#F00';
      this.bn_lang='#555';
      this.currentLang= this.english_lang= 'English';
      this.bangla_lang= 'Bangla';
    }
  }
}
</script>
