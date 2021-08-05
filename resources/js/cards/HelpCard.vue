<template>
	<ul class="helpcard">
		<li style="display:flex;margin-right:5px;">
			Hello world
		</li>
	</ul>
</template>

<style scoped>
.helpcard {
	padding: 5px;
	display: flex;
	margin-bottom: 5px;
	list-style: none;
	flex-direction: row;
	text-align: center;
	color:inherit;
}
li{
	width: 100%;
	box-shadow:0 4px 6px #000;
	margin-bottom:5px}
	</style>
	<script>
	export default {
		name: 'helpCard',
		props:['title','message']
	}
	</script>
