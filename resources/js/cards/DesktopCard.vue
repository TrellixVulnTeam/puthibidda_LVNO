<template>
<div id="dCard" v-bind:style="{'background-image':'url('+path+id+'/bkimage-min.jpg)'}" class="asyncImage" :data-src="path+id+'/bkimage.jpg'">
</div>
</template>

<style scoped>
#dCard {
	background-repeat: ;
	background-size: cover;
	-webkit-transition: background-image 0.2s ease-in-out;
	transition: background-image 0.2s ease-in-out;
	height: 200px;
}
</style>
<script>
export default {
	name: 'DesktopCard',
	props:['title','id','path','orientation'],
	mounted(){
		this.$nextTick(function () {
			(() => {
				'use strict';
				// Page is loaded
				const objects = document.getElementsByClassName('asyncImage');
				Array.from(objects).map((item) => {
					// Start loading image
					const img = new Image();
					img.src = item.dataset.src;
					// Once image is loaded replace the src of the HTML element
					img.onload = () => {
						item.classList.remove('asyncImage');
						return item.nodeName === 'IMG' ?
						item.src = item.dataset.src :
						item.style.backgroundImage = `url(${item.dataset.src})`;
					};
				});
			})();
		});
	}
}
</script>
