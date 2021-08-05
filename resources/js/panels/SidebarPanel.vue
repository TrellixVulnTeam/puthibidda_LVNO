<template>
	<div class="sidepanel">
		<filtermenu-card :title="'Filter Books'" v-if="cards['filtermenu-card']==1"> </filtermenu-card>
		<author-card v-if="cards['author-side-card']==1" :profile="'authors'"> </author-card>
		<pub-img-txt-card v-if="cards['pub-side-card']==1" :title="'অন্য প্রকাশ'" :id="'1604940238'" :path="'/storage/publishers/'" :orientation="'linear'" ></pub-img-txt-card>
		<pub-img-txt-card v-if="cards['pub-side-card']==1" :title="'অন্বেষা প্রকাশনী'" :id="'1604933986'" :path="'/storage/publishers/'" :orientation="'linear'" ></pub-img-txt-card>
		<pub-img-card v-if="cards['pub-side-card']==1" :title="'Favorite Books'" :id="'1604940221'" :path="'/storage/publishers/'" :orientation="'linear'" ></pub-img-card>
		<bestbookmenu-card :uxmenu="uxmenu"  v-if="cards['bestbookmenu-card']==1"> </bestbookmenu-card>
		<popularbookmenu-card :uxmenu="uxmenu" v-if="cards['popularbookmenu-card']==1"> </popularbookmenu-card>

	</div>
</template>

<style scoped>
.sidepanel {
	height: auto;
	margin-top: 10px;
	margin-left: 25px;
	margin-right: 5px;
	display: flex;
	flex-direction: column;
	/* line-height: 150px; */
	color: white;
	text-align: center;
	min-width: 250px;
	max-width: 250px;
}

</style>
<script>
import ImageCard from '../cards/ImageCard.vue';
import ImageTextCard from '../cards/ImageTextCard.vue';
import BestbookmenuCard from '../cards/BestbookmenuCard.vue';
import PopularbookmenuCard from '../cards/PopularbookmenuCard.vue';
import FiltermenuCard from '../cards/FiltermenuCard.vue';
import AuthorCard from '../cards/ItemCard.vue';
export default {
	name: 'SideBarPanel',
	props:['cards','uxmenu'],
	components:{
		'pub-img-card':ImageCard,
		'pub-img-txt-card':ImageTextCard,
		'bestbookmenu-card': BestbookmenuCard,
		'popularbookmenu-card': PopularbookmenuCard,
		'filtermenu-card': FiltermenuCard,
		'author-card': AuthorCard,
	},
	methods: {

	}
}
</script>
