<template>
	<li class="newbookscard" >
		<div v-for="(newbook, index) in newbooks"
		:key="newbook.id"
		:ref="'newbook_'+index"
		@mouseover="hoverNewBook(index)"
		@mouseout="hoverNewBook(-1)"
		@mouseleave="leaveNewBook(index)"
		class="newbook">

		<img class="newbook-image"
		:key="newbook.book_cover"
		:class="{'selected': isSelected(index)}"
		:src="'./storage/bookcovers/'+ newbook.book_cover">
		<div class="newbook-footer">
			<h3 class="newbook-title" v-text="newbook.book_title"></h3>
			<button  class="btn btn-primary" @click="itemClicked(newbook)">Detail</button>
			<button class="add-cart-large">Add To Cart</button>
		</div>

	</div>
	<div>
		<div @click="newArrivalPrev" class="bookScroller scroller-prev"><img :src="'./storage/images/prevCategory.png'" style="width:48px; height:48px"></div>
		<div @click="newArrivalNext" class="bookScroller scroller-next"><img :src="'./storage/images/nextCategory.png'" style="width:48px; height:48px"></div>
	</div>
</li>
</template>

<style scoped>
.newbookscard {
	padding: 5px;
	height: auto;
	margin-bottom: 10px;
	/* flex-grow: 0; */
	line-height: 150px;
	color: white;
	flex-direction: row;
	/* font-weight: bold; */
	/* font-size: 3em; */
	text-align: center;
	display: flex;
	/* justify-content: center; */
	/* align-items: center; */
	min-width: 100%;
	height: 200px;
}
/*
.bookScroller {
	position:absolute;
	text-align:center;
	vertical-align:middle;
	cursor:pointer;
	white-space:nowrap;
}
.scroller-next{
	right:5px;
	top:135px;
}
.scroller-prev {
	left:5px;
	top:135px;
}*/
.newbook {
	position: relative;
	background-color: #FFFFFF;
	height: 188px;
	width: 130px;
	margin: 10px;
	overflow: hidden;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5);
}
.newbook-image {
	position: absolute;
	left: -9999px;
	right: -9999px;
	margin: auto;
	height: 100%;
	min-width: 100%;
}
.newbook-image {
	-webkit-transition-property: height;
	-webkit-transition-duration: 0.3s;
	-webkit-transition-opacity: 0.3s;
	transition-property: height;
	transition-duration: 0.3s;
	transition-opacity: 0.3s;
}
.newbook-image.selected {
	height: 110%;
	opacity: 0.3;
}
.newbook-footer {
	position: absolute;
	bottom: 0;
	display: none;
	height: 20%;
	padding: 10px 15px;
	font-family: 'AdorshoLipi', sans-serif;
}
.newbook-title {
	font-size: 15px;
	font-family:'AdorshoLipi', sans-serif;
}
.newbook {
	transition: height 0.3s, box-shadow 0.3s;
}
.newbook:hover {
	height: 95%;
	box-shadow: 20px 20px 40px 0px rgba(0,0,0,0.5);
}
</style>
<script>
import BookDetail from '../cards/BookDetail.vue'

export default {
	name: 'NewbooksCard',
	props:['appnewbook'],
	data:function() {
		return {
			newbooks:[],
			newarrivalsTotal:0,
			newarrivalsOffset:0,
			booksDisplayConst:155,
			bookdetail:''
		}
	},
	components:{
		'book-detail': BookDetail
	},
	mounted(){
		this.loadData();
	},
	methods:{
		itemClicked: function(bookdetail) {
			this.bookdetail = bookdetail;
			$("#book-detail").modal('show');
		},
		loadData: function () {
			let newarrivalLimit=Math.floor(($(".previewcard").width()*0.8)/this.booksDisplayConst);
			axios.get('/books/totalnewarrivals').then(response=>(this.newarrivalsTotal=response.data));
			axios.get('/books/newarrivals/'+ this.newarrivalsOffset+'/'+newarrivalLimit).then(response=>this.newbooks=response.data);

		},
		hoverNewBook(selectedIndex) {
			this.selectedNewBook = selectedIndex;
			this.animateNewBooks();
			if(selectedIndex!=-1){
				$(".newbook-footer:eq("+selectedIndex+")").css({'position':'relative','display':'block'})
				$(".newbook-image:eq("+selectedIndex+")").css({'height':'110%','opacity':'0.3'})
			}
		},
		leaveNewBook(selectedIndex){
			if(selectedIndex!=-1){
				$(".newbook-footer:eq("+selectedIndex+")").css({'position':'absolute','display':'none'})
				$(".newbook-image:eq("+selectedIndex+")").css({'height':'100%','opacity':'1'})
			}
		},
		animateNewBooks () {
			this.newbooks.forEach((newbook, index) => {
				const direction = this.calculateNewBookDirection(index, this.selectedNewBook)
				TweenMax.to(
					this.$refs[`newbook_${index}`],
					0.5,
					{x: direction * 50}
				)
			})
		},
		calculateNewBookDirection (newbookIndex, selectedIndex) {
			if(selectedIndex === -1) {
				return 0
			}
			const diff = newbookIndex - selectedIndex
			return diff === 0 ? 0 : diff/Math.abs(diff)
		},
		isSelected(newbookIndex) {
			return this.selectedNewBook === newbookIndex
		},
		newArrivalNext: function (){
			let newarrivalLimit=Math.floor(($(".previewcard").width())/this.booksDisplayConst);
			let pos= this.newarrivalsOffset + newarrivalLimit;
			if(pos>=this.newarrivalsTotal)
			pos= pos - newarrivalLimit;
			else
			this.newarrivalsOffset = pos;
			axios.get('/books/newarrivals/'+ pos+'/'+newarrivalLimit).then(response=>this.newbooks=response.data);
		},
		newArrivalPrev: function (){
			let newarrivalLimit=Math.floor(($(".previewcard").width())/this.booksDisplayConst);
			let pos= this.newarrivalsOffset-newarrivalLimit;
			if(pos>=0)
			this.newarrivalsOffset = pos;
			axios.get('/books/newarrivals/'+ pos+'/'+newarrivalLimit).then(response=>this.newbooks=response.data);
		}
	}
}
</script>
