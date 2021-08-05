<template>
	<li class="homedeliverycard">
			<img src="storage/icons/homedelivery.png" alt="" style="height: 50px;" />
	</li>
</template>

<style scoped>
.homedeliverycard {
	margin: 5px 10px;
	display: flex;
	list-style: none;
	align-items: stretch;
	background-color: #ff0;
	background-image: -webkit-linear-gradient(-45deg, #f96217 0%,#f2092a 100%);
	background-image: linear-gradient(135deg, rgba(249, 98, 23, 0.75) 0%, rgba(249, 23, 23, 1) 100%);
	background-blend-mode: multiply;
	/* -webkit-box-shadow: -5px -5px 20px rgba(0,0,0,0.6);
	-moz-box-shadow: -5px -5px 20px rgba(0,0,0,0.6);
	box-shadow: -5px -5px 20px rgba(0,0,0,0.6); */
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5);
	justify-content: center;
}
img{
	align-self: center;
}
</style>
<script>
export default {
	name: 'HomedeliveryCard'
}
</script>
