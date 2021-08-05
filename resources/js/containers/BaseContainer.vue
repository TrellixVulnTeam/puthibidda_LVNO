<template>
	<ul class="basecontainer">
						<sidebar-panel v-if="panels['sidebar-panel']==1" :cards="cards" :uxmenu="uxmenu"></sidebar-panel>
						<base-panel  v-if="panels['base-panel']==1" :cards="cards" v-on:addtocart="addToCart" :uxmenu="uxmenu"  v-on:showdetail="showDetail" v-on:loaddetailfunction="loadDetailFunction"></base-panel>
	</ul>
</template>

<style scoped>
.basecontainer {
      padding: 0;
      margin: 0 2px;
      list-style: none;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
				flex-grow: 1;
			/* flex-wrap: wrap; */
      align-content: center;
			flex-direction: row;
      -webkit-flex-flow: row;
      /*justify-content: space-around;*/
}
</style>
<script>
      import SidebarPanel from '../panels/SidebarPanel.vue'
			import BasePanel from '../panels/BasePanel.vue'
      export default {
          name: 'BaseContainer',
					props:['panels','cards','uxmenu'],
					methods:{
						addToCart: function(event){
							this.$emit('addtocart',event);
						},
						showDetail: function(){
							this.$emit('showdetail');
						},
						loadDetailFunction: function(){
							this.$emit('loaddetailfunction');
						}
					},
          components:{
              'sidebar-panel': SidebarPanel,
							'base-panel': BasePanel
        },
  }
</script>
