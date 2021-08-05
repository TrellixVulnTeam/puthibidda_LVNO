<template>
	<li class="basepanel">
		<!-- <ads-card id="ID_baseAds" :title="'Ads Card'" v-if="cards['ads-card']==1" ></ads-card> -->
		<!-- <ads-card :id="'favorite'" :path="'/storage/images/desktop/cardbk/'" v-if="cards['ads-card']==1" ></ads-card> -->
		<orderstatus-card v-if="cards['orderstatus-card']==1" ></orderstatus-card>
		<desktop-card v-if="cards['ads-card']==1" :title="'Favorite Books'" :id="'favorite'" :path="'/storage/images/desktop/cardbk/'" :orientation="'linear'" ></desktop-card>
		<preview-card v-if="cards['preview-card']==1" :uxmenu="uxmenu" :title="uxmenu['popularbooks']" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="popularbook" :titleColor="'#112255'" ></preview-card>
		<preview-card v-if="cards['preview-card']==1" :uxmenu="uxmenu" :title="uxmenu['favouritebooks']" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="favoritebook" :titleColor="'#1f52f5'" ></preview-card>
				<help-card v-if="cards['help-card']==1"></help-card>
		<detail-card v-if="cards['detail-card']==1" :bookdetail="bookdetail" v-on:addtocart="addToCart" v-on:loaddetailfunction="loadDetailFunction"></detail-card>
		<preview-card v-if="cards['relatedbook-card']==1" :uxmenu="uxmenu"  title="Related Books" v-on:addtocart="addToCart" v-on:bookdetail="showDetail" prefix="favoritebook" :titleColor="'#1f52f5'" ></preview-card>
  </li>
</template>

<style scoped>
.basepanel {
  height: auto;
  margin-top: 10px;
  margin-left: 5px;
	margin-right: 25px;
  flex-grow: 10;
	flex-direction: row;
  color: white;
  text-align: center;
}
#ID_baseAds{
	display: flex;
	margin-bottom: 5px;
	list-style: none;
	flex-direction: row;
	text-align: center;
	align-self: stretch;
}
@media only screen and (max-width: 800px) {
	#ID_baseAds{
		display: none;
		visibility: hidden;
	}
}
</style>
<script>
import DesktopCard from '../cards/DesktopCard.vue';
import AdsCard from '../cards/AdsCard.vue';
import OrderStatusCard from '../cards/OrderStatusCard.vue';
import PreviewCard from '../cards/PreviewCard.vue';
import HelpCard from '../cards/HelpCard.vue';
import NewbooksCard from '../cards/NewbooksCard.vue';
import DetailCard from '../cards/BookDetail.vue';
  export default {
    name: 'BasePanel',
		props:['cards', 'uxmenu'],
		data: function(){
			return{
					bookdetail:'',
			}
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
				'ads-card': AdsCard,
				'orderstatus-card':OrderStatusCard,
				'desktop-card':DesktopCard,
				'preview-card':PreviewCard,
				'help-card':HelpCard,
				'newbooks-card':NewbooksCard,
				'detail-card':DetailCard,
	},
  }
</script>
