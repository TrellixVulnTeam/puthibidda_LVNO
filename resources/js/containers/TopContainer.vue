<template>
	<li class="topcontainer">
	<searchbar-panel  v-if="panels['searchbar-panel']==1" :cards="cards" v-on:searchbooks="findBooks" v-on:homepage="homePage"></searchbar-panel>
</li>
</template>

<style scoped>
.topcontainer {
	padding: 0;
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
</style>
<script>
      import SearchBarPanel from '../panels/SearchBarPanel.vue'
      export default {
          name: 'TopContainer',
					props:['panels','cards'],
					methods:{
							findBooks: function(){
								this.$emit('findbooks');
								// alert('find books');
							},
							homePage: function(){
								this.$emit('homepage');
							}
					},
          components:{
							'searchbar-panel': SearchBarPanel
        }
  }
</script>
