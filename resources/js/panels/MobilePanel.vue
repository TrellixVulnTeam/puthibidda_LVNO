<template>
	<li class="mobilepanel">
		<category-card v-if="categorypage>=0 && categorypage<10" :id="categorypage" :prefix="'category'" :title="categoryTitle"  :orientation="'linear'" :titleColor="categoryColor" :logo="categoryLogo" v-on:addtocart="addToCart"></category-card>
		<mobile-card v-if="categorypage==-1" :title="'Favorite Books'" :id="'favorite'" :path="'/storage/images/mobile/cardbk/'" :orientation="'linear'" ></mobile-card>
		<item-card v-if="categorypage==-1" title="হুমায়ূন আহমেদ এর বই" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="humaunbooks" :titleColor="'#112255'" ></item-card>
		<mobile-card v-if="categorypage==-1" :title="'Popular Books'" :id="'popular'" :path="'/storage/images/mobile/cardbk/'" :orientation="'pyramid'" ></mobile-card>
		<item-card v-if="categorypage==-1" title="শরৎ চন্দ্র চট্টোপাধ্যায় সংগৃহীত" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="saratbooks" :titleColor="'#226135'" ></item-card>
	<!-- <div style="display:flex; flex-direction:row;align-items:center;">	 -->
		<item-card v-if="categorypage==-1" title="সত্যজিৎ রায়ের রচনা সমগ্র" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="satajitbooks" :titleColor="'#af52f5'" ></item-card>
		<author-card v-if="categorypage==-1" :profile="'authors'"> </author-card>
	<!-- </div> -->
		<!-- <detail-card v-if="cards['detail-card']==1" :bookdetail="bookdetail" v-on:addtocart="addToCart" v-on:loaddetailfunction="loadDetailFunction"></detail-card> -->
		<!-- <item-card v-if="cards['relatedbook-card']==1" title="Related Books" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="favoritebook" :titleColor="'#1f52f5'" ></item-card> -->
	</li>
</template>

<style scoped>
.mobilepanel {
	padding: 0 5px;
	display: flex;
	/* flex-wrap: wrap; */
	flex-direction: column;
	font-weight: 500;
	color: white;
}
</style>
<script>
import MobileCard from '../cards/MobileCard.vue';
import ItemCard from '../cards/MobilePreviewCard.vue';
import DetailCard from '../cards/BookDetail.vue';
import AuthorCard from '../cards/ItemCard.vue';
import CategoryCard from '../cards/CategoryCard.vue';
export default {
	name: 'MobilePanel',
	props:['cards', 'categorypage','categoryTitle','categoryColor','categoryLogo'],
	data: function(){
		return{
			bookdetail:'',
			// showElement:false
		}
	},
	mounted(){
		// this.$nextTick(function(){
		// 	this.showElement=true;
		// });
	},
	methods:{
		addToCart: function(event){
			this.$emit('addtocart',event);
		},
		showDetail: function(bookdetail){
			this.$emit('showdetail');
			this.bookdetail = bookdetail;
		},
		loadDetailFunction: function(){
			this.$emit('loaddetailfunction');
		}
	},
	components:{
		'item-card':ItemCard,
		'detail-card':DetailCard,
		'mobile-card':MobileCard,
		'author-card': AuthorCard,
		'category-card':CategoryCard,
	},
}
</script>
