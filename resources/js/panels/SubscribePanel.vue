<template>
	<ul class="subscribepanel">
		<h6 v-text="uxmenu['followus']"></h6>
		<div class="social-part">
      <i class="fa fa-facebook" aria-hidden="true"></i>
      <i class="fa fa-twitter" aria-hidden="true"></i>
      <i class="fa fa-instagram" aria-hidden="true"></i>
    </div>
  </ul>
</template>

<style scoped>
.subscribepanel {
	background: var(--cd-color-bg-subscribe);
	padding: 7px;
	width: 100%;
	height: auto;
	display: flex;
	flex-direction: column;
	margin-top: 10px;
	margin-right: 5px;
	flex-grow: 0;
	color: white;
	text-align: center;
}
.social-part .fa{
  padding:0 20px;
}
</style>
<script>
  export default {
    name: 'SubscribePanel',
		props:['cards', 'uxmenu']
  }
</script>
