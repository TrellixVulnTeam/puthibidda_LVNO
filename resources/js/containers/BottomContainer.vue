<template>
	<ul class="bottomcontainer">
	<subscribe-panel  v-if="panels['subscribe-panel']==1" :cards="cards" :uxmenu="uxmenu"></subscribe-panel>
	<footer-panel  v-if="panels['footer-panel']==1" :cards="cards" :uxmenu="uxmenu"></footer-panel>
	</ul>
</template>

<style scoped>
.bottomcontainer {
	padding: 0;
	margin: 0;
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
      import SubscribePanel from '../panels/SubscribePanel.vue'
			import FooterPanel from '../panels/FooterPanel.vue'
      export default {
          name: 'BottomContainer',
					props:['panels','cards', 'uxmenu'],
          components:{
              'subscribe-panel': SubscribePanel,
							'footer-panel': FooterPanel
        },
  }
</script>
