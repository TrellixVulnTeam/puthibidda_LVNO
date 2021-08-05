<template>
	<!-- <div class="mobilecard card">
	<img class="card-img-top asyncImage" :src="path+id+'/bkimage-min.jpg'" :data-src="path+id+'/bkimage-min.jpg'" alt="Background Image">
	<div v-if="orientation=='linear'" class="card-img-overlay">
	<li  class="mrcardtitle card-title">{{title}}</li>
	<ul  class="card-content-img">
	<li v-for="(book, index) in books.slice(0,5)">
	<img class="img_card" :src="'./storage/bookcovers/'+ book.book_id+'.jpg'" alt="Image">
</li>
</ul>
</div>
<div v-if="orientation=='pyramid'" class="card-img-overlay">
<li  class="macardtitle card-title">{{title}}</li>
<ul  class="card-content-img-var">
<li v-for="(book, index) in books.slice(0,3)">
<img :class="'img_card_'+index" :src="'./storage/bookcovers/'+ book.book_id+'.jpg'" alt="Image">
</li>
</ul>
</div>

</div> -->
<div id="mCard" v-bind:style="{'background-image':'url('+path+id+'/bkimage-min.jpg)'}" class="asyncImage" :data-src="path+id+'/bkimage.jpg'">
	<div class="container">
		<div class="mobilecard">
			<li  class="mrcardtitle">{{title}}</li>
			<div v-if="orientation=='linear'">
				<ul  class="card-content-img">
					<li v-for="(book, index) in books.slice(0,5)">
						<img class="img_card" :src="'/storage/bookcovers/'+ book.book_id+'.jpg'" alt="Image">
					</li>
				</ul>
			</div>
			<div v-if="orientation=='pyramid'">
				<ul  class="card-content-img-var">
					<li v-for="(book, index) in books.slice(0,3)">
						<img :class="'img_card_'+index" :src="'/storage/bookcovers/'+ book.book_id+'.jpg'" alt="Image">
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>
</template>

<style scoped>
#mCard {
	background-repeat: ;
	background-size: cover;
	-webkit-transition: background-image 0.2s ease-in-out;
	transition: background-image 0.2s ease-in-out;
}
.card-content-img-var{
	display: flex;
	flex-direction:row;
	list-style: none;
	align-items:flex-end;
	justify-content: space-around;
}
.img_card_0{
	width: 60%;
}
.img_card_1{
	width: 70%;
}
.img_card_2{
	width: 80%;
}
.card-content-img{
	display: flex;
	flex-direction:row;
	list-style: none;
}
.img_card{
	width: 80%;
}
.mobilecard{
	overflow: hidden;
	margin: 10px auto;
}
.mrcardtitle{
	color:lightgray;
	display: flex;
	justify-content: flex-start;
	left: 10px;
}
.macardtitle{
	position: absolute;
	display: flex;
	justify-content: flex-start;
	left: 10px;
	top: 5px;
}
.card-img-overlay{
	display: flex;
	flex-direction: column;
	padding: 5px;
}
</style>
<script>
export default {
	name: 'MobileCard',
	props:['title','id','path','orientation'],
	data: function(){
		return{
			books: [],
			totalBooks:0,
			datalink:''
		}
	},
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
		if(this.id == 'popular')
		this.datalink='/books/popularbooks';
		else if(this.id == 'favorite')
		this.datalink='/books/favoritebooks';
		else
		this.datalink='/books/allbooks';
		this.loadData();
	},
	methods:{
		loadData: function(){
			axios.get(this.datalink).then((response)=>{
				this.books = response.data;
				this.totalBooks = this.books.length;
			});
		}
	}
}
</script>
