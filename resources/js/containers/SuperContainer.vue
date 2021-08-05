<template>
	<ul class="suppercontainer" >
		<top-container v-if="containers['top-container']==1" :panels="panels" :cards="cards" v-on:findbooks="exploreBooks" v-on:homepage="homePage"></top-container>
		<menubar-panel  v-if="panels['menubar-panel']==1" :uxmenu="uxmenu" :cards="cards" v-on:changelang="changeLang"></menubar-panel>
		<base-container v-if="containers['base-container']==1" :panels="panels" :cards="cards" :uxmenu="uxmenu" v-on:addtocart="addToCart" v-on:showdetail="showDetail" v-on:loaddetailfunction="loadDetailFunction"></base-container>
		<bottom-container v-if="containers['bottom-container']==1" :panels="panels" :cards="cards" :uxmenu="uxmenu"></bottom-container>
	</ul>
</template>

<style scoped>
.suppercontainer {
	padding: 0;
	list-style: none;
	flex-direction:column;
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	flex-grow: 1;
	align-content: center;
	-webkit-flex-flow: row wrap;
}
</style>
<script>
import BaseContainer from './BaseContainer.vue'
import BottomContainer from './BottomContainer.vue'
import TopContainer from './TopContainer.vue'
import MenuBarPanel from '../panels/MenuBarPanel.vue'
export default {
	name: 'SuperContainer',
	props:[
		'containers','panels','cards','uxmenu'
	],
	data:function() {
		return {
			cons:[]
		}
	},
	methods:{
		exploreBooks: function(){
			this.$emit('huntbooks','searchbooks');
		},
		homePage: function(){
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
		}
	},
	components:{
		'base-container': BaseContainer,
		'bottom-container': BottomContainer,
		'menubar-panel': MenuBarPanel,
		'top-container': TopContainer
	},
}
</script>
