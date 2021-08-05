<template>
<div>
	<h3> View Status of Your Order </h3>
	<span> Order number </span>
	<input type="text" />
		<span> You can find this in the order confirmation email we sent when you placed the order </span>
<span> Email used on order </span>
	<input type="text" />
	<span> The email you used for the order.</span>
</div>
</template>

<style scoped>
.adscard {
	background-repeat: ;
	background-size: cover;
	-webkit-transition: background-image 0.2s ease-in-out;
	transition: background-image 0.2s ease-in-out;
}

	</style>
	<script>
	export default {
		name: 'OrderStatusCard',
		props:['title','message'],
		mounted(){

		}
	}
	</script>
