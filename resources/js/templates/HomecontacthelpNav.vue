<template>
	<ul class="homecontacthelpnav">
			<!-- <a href="#0" class="cd-add-to-cart js-cd-add-to-cart" data-price="22.99">Add To Cart</a> -->
			<li>
				<a href="/"><img src="storage/icons/home.png" alt="" style="height: 24px;"/></a>
			</li>
			<li>
				<img src="storage/icons/contactus.png" alt="" style="height: 20px;"> <span class="textMenus" style="margin-left:2px; color:white">Contact Us</span>
			</li>
			<li>
				<a v-on:click="showHelps" style="cursor:pointer"><img src="storage/icons/help.png" alt="" style="height: 24px;"> <span class="textMenus" style="margin-left:2px; color:white">Help</span></a>
			</li>
		</ul>
</template>
<style scoped>
.homecontacthelpnav{
  display: flex;
  justify-content: flex-start;
}
.homecontacthelpnav li {
padding-right: 1rem;
margin-left: 1rem;
border-right: 2px solid #555555;
list-style: none;
}

.homecontacthelpnav img:last-child {
border-right: none;
}
/* .homecontacthelpnav li:first-child {
margin-left: 5rem;
} */
@media only screen and (max-width: 800px) {
	.textMenus{
		display: none;
		visibility: hidden;
	}
}
@media screen and (min-width: 800px) {
	.homecontacthelpnav li:first-child {
	margin-left: 5rem;
	}

}
</style>
<script>
export default {
	name: 'HomecontacthelpNav',
	props:['title','message'],
	methods:{
		showHelps:function(){
				this.$emit('helppage','3');
		}
	}
}
</script>
