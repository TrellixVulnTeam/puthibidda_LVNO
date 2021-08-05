<template>
<div class="image-text-container">
<div id="image-text-card" v-bind:style="{'background-image':'url('+path+id+'-min.jpg)'}" class="asyncImage" :data-src="path+id+'.jpg'">
</div>
<div style="color:#444">{{title}}</div>
</div>
</template>

<style scoped>
.image-text-container{
	display:flex;
	flex-direction:column;
	padding: 5px;
		margin: 10px 0;
	background: var(--cd-color-bg-previewcard);
	background-color: var(--cd-color-bg-previewcard);
	box-shadow: var(--cd-shadow-common);
	-webkit-box-shadow: var(--cd-shadow-common);
	-moz-box-shadow: var(--cd-shadow-common);
}
#image-text-card {
	background-repeat: none;
	background-size:cover;
	-webkit-transition: background-image 0.2s ease-in-out;
	transition: background-image 0.2s ease-in-out;
	height: 180px;

}
</style>
<script>
export default {
	name: 'ImageTextCard',
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
