<template>
	<ul class="mobilecontainer" >
		<li class="searchbarpanel sticky-top">
			<nav id="searchbarNavbar" class="navbar navbar-laravel">
				<li class="homeLogo">
				<a href="#" v-on:click="homePage">
					<img src="/storage/icons/home.png" alt="" style="height: 30px;"/>
				</a>
			</li>
				<li class="searchmodule">
					<div id="book-search-form" >
						<input type="text" placeholder="Search for Books by Title/ Keyword/ Author" id="book_search_input" class="book-search"/>
						<i id="filtersubmit" class="fa fa-search"  v-on:click="exploreBooks"></i>
					</div>
				</li>
		</nav>
	</li>
		<ul v-if="categorypage==-1" class="mCategories">
			<li v-for="(category, index) in categories" :key="index" class="itemDiv">
					<div @click="selectCategory(index, category.name, category.color, category.src)">
						<img style="width:100%; height:100%;border-radius:50%; padding: 0 5px" :src="category.src" alt="All Categories"  compresswidth="80" compressheight="80" compressquality="70">
					</div>
					<!-- <span >{{category.name}}</span> -->
			</li>
		</ul>
		<mobile-panel :cards="cards" v-on:addtocart="addToCart" v-on:showdetail="showDetail" v-on:loaddetailfunction="loadDetailFunction" :categorypage="categorypage" :categoryTitle="selectedCategory" :categoryColor="selectedColor" :categoryLogo="selectedLogo"></mobile-panel>

	</ul>
</template>
<script>
import MobilePanel from '../panels/MobilePanel.vue'
import BottomContainer from './BottomContainer.vue'
export default {
	name: 'MobileContainer',
	props:[
		'cards','uxmenu','category'
	],
	mounted(){
		this.categorypage= this.category;
		console.log(this.categorypage);
	},
	data:function() {
		return {
			cons:[],
			categorypage:0,
			selectedCategory:'',
			selectedColor:'',
			selectedLogo:'',
			categories:[
				{
					name: 'সকল ধরনের',
					src: '/storage/images/mobile/categories/all.png',
					color: '#686262',
				},
				{
					name: 'সাহিত্য',
					src: '/storage/images/mobile/categories/literature.png',
					color: '#44e2d3',

				},
				{
					name: 'ছোট গল্প',
					src: '/storage/images/mobile/categories/shortstory.png',
					color: '#92b4ef',
				},
				{
					name: 'গোয়েন্দা কাহিনী এবং রহস্য',
					src: '/storage/images/mobile/categories/mistry.png',
					color: '#ec85d6',
				},
				{
					name: 'উপন্যাস',
					src: '/storage/images/mobile/categories/novel.png',
					color: '#317024',
				},
				{
					name: 'ভ্রমণ কাহিনী',
					src: '/storage/images/mobile/categories/travel.png',
					color: '#288a4c',
				},
				{
					name: 'ঐতিহাসিক',
					src: '/storage/images/mobile/categories/historical.png',
					color: '#8f642a',
				},
				{
					name: 'কাব্যগ্রন্থ',
					src: '/storage/images/mobile/categories/poembook.png',
					color: '#807d3e',
				},
				{
					name: 'প্রেমের গল্প',
					src: '/storage/images/mobile/categories/lovepoem.png',
					color: '#803f3f',
				},
				{
					name: 'আরও',
					src: '/storage/images/mobile/categories/more.png',
					color: '#808080',
				}
			]

		}
	},
	methods:{
		selectCategory: function(value,name,color,logo){
			this.categorypage = value;
			this.selectedCategory = name;
			this.selectedColor= color;
			this.selectedLogo = logo;
		},
		exploreBooks: function(){
			this.$emit('huntbooks','searchbooks');
		},
		homePage: function(){
			this.categorypage = -1;
			this.$emit('homepage','homepage');
		},
		showDetail: function(){
			this.$emit('showdetail','detailpage');
		},
		changeLang:function(lang){
			this.$emit('updatelang',lang);
		},
		addToCart: function(event){
			this.$emit('addtocart',event);
		},
		loadDetailFunction: function(){
			this.$emit('loaddetailfunction');
		},
	},
	components:{
		'mobile-panel': MobilePanel,
		'bottom-container': BottomContainer,
	},
}
</script>
<style scoped>
.mobilecontainer {
	padding: 0;
	margin-bottom: 2rem;
	list-style: none;
	flex-direction:column;
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	align-content: center;
	-webkit-flex-flow: row wrap;
}
.mCategories{
	display: flex;
	justify-content: space-around;
	justify-content: flex-start;
	align-items: baseline;
	flex-wrap: wrap;
}

.itemDiv{
	margin: 2px auto;
	display: flex;
	align-items: center;
	align-items: center;
	text-align: center;
	/* background: #ff4444; */
	width: 20%;
	/* font-family: Arial, Helvetica, sans-serif;
	color: #fff; */
}

.searchbarpanel{
	display: flex;
	flex-direction: row;
	align-items: center;
	list-style: none;
}
.homeLogo{
 display: flex;
 justify-content: center;
 align-self: center;
 padding-right: 5px;
}
.searchmodule{
	display: flex;
	flex-grow: 1;
	justify-content: center;
}
#searchbarNavbar{
	display: flex;
	justify-content: space-around;
	list-style: none;
	padding: 5px 5px;
	align-items: center;
	flex-direction: row;
	width:100%;
	background: var(--cd-color-bg);
	background-color: var(--cd-color-bg);
}

#book-search-form {
	background: #e1e1e1;
	flex-grow: 2;
	background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
	background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);

	/* Rounded Corners */
	border-radius: 17px;
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;

	/* Shadows */
	box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
}
/*** TEXT BOX ***/
.book-search{
	background: #fafafa; /* Fallback color for non-css3 browsers */

	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
	background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);
	border: 0;
	border-bottom: 2px solid #fff;
	border-right: 1px solid rgba(255,255,255,.8);
	font-size: 14px;
	margin: 2px;
	padding: 3px 10px;
	width: 90%;

	/* Rounded Corners */
	border-radius: 17px;
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;

	/* Shadows */
	box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-webkit-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-moz-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
}

/*** USER IS FOCUSED ON TEXT BOX ***/
.book-search:focus{
	outline: none;
	background: #fff; /* Fallback color for non-css3 browsers */
	border-bottom: 2px solid #85CC46;
	border-right: 1px solid #85CC46;
	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(255,255,255)), color-stop(1, rgb(235,235,235)));
	background: -moz-linear-gradient( center top, rgb(255,255,255) 0%, rgb(235,235,235) 100%);
}
#book-search-form:hover >  #filtersubmit{
	color: red;
}
#filtersubmit {
	position: relative;
	z-index: 1;
	color: #7B7B7B;
	cursor:pointer;
	text-align: center;
	width: 5%;
}
</style>
