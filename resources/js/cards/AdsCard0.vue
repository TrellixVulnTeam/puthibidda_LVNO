<template>
	<ul class="adscard">
		<li>
			<div id="adscarousel"  class="carousel" data-ride="carousel">
				<!-- <ol class="carousel-indicators" >
				<li style="box-shadow:0 0 0" data-target="#adscarousel" data-slide-to="0" class="active"></li>
				<li style="box-shadow:0 0 0" data-target="#adscarousel" data-slide-to="1"></li>
				<li style="box-shadow:0 0 0" data-target="#adscarousel" data-slide-to="2"></li>
			</ol> -->
			<div class="carousel-inner" >
				<div class="carousel-item active">
					<img src="/storage/images/megaads.jpg" class="d-block w-100" alt="Book1" >
					<!-- <div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div> -->
			</div>
		</div>
		<!-- Left and right controls -->
		<!-- <a class="carousel-control-prev" href="#adscarousel" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#adscarousel" data-slide="next">
	<span class="carousel-control-next-icon"></span>
</a> -->
</div>
</li>
<!-- <li id="googleMapLoc" style="margin-left:5px;">
	<iframe  width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=Cyberborg%20Bodyart%2C%20Bangka%2C%20Jakarta%2C%20Indonesia&key=AIzaSyCGz8WzqxQw1OwHWey3LCTjqKFG9feCxP4"></iframe>
</li> -->
</ul>
</template>

<style scoped>
.adscard {
	display: flex;
	margin-bottom: 5px;
	list-style: none;
	flex-direction: row;
	justify-content: space-around;
}
li{
	box-shadow: 1px  1px 3px 0px #000;
	margin-bottom:5px}
	.carousel-inner > .item > img, .carousel-inner > .item > a > img {
		display: flex;
		/* align-self: stretch; */
		align-items: stretch;
	}
	/* Mega Banner */
	.carousel{
		width: 100%;
		height: auto;
	}
	.carousel-inner {
		width: 100%;
		height: 100%;

		box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.35);
		-webkit-box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.35);
		-moz-box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.35);
	}
	@media only screen and (max-width: 1200px) {
		#googleMapLoc{
			display: none;
			visibility: hidden;
		}
	}
	</style>
	<script>
	export default {
		name: 'AdsCard',
		props:['title','message']
	}
	</script>
