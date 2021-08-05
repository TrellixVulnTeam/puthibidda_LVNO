<template>
	<ul class="previewcard" >
		<li class="previewcardTitle" :style="cssVars"> <a> {{title}} </a></li>
		<li @mouseover="visibleControls(prefix)" @mouseleave="hideControls(prefix)" :id="prefix+'carousel'" class="carousel slide" :data-ride="prefix+'carousel'" interval="3000">
			<div class="carousel-inner">
				<div v-for="n in totalPage" :key="n" :class="{'carousel-item active':n == 1, 'carousel-item':n != 1 }" >
					<div class="normalizeElement">
						<div v-for="(book, index) in books.slice((n-1)*booksPerPage, (n)*booksPerPage)"
						:key="prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id"
						:ref="prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id"
						:id="prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id"
						@mouseover="hoverBook(prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id)"
						@mouseout="hoverBook(-1)"
						@mouseleave="leaveBook(prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id)"
						class="book">
						<img class="book-image"
						@click="itemClicked(book)"
						:key="book.book_id"
						:id="prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id+ 'cover'"
						:class="{'selected': isSelected(prefix + '-'+ book.id)}"
						:src="'./storage/bookcovers/'+ book.book_id+'.jpg'">

						<div :id="prefix + '-' +(n-1)*booksPerPage +'-'+index+'-'+ book.id + 'addtocart'" class="book-add-to-cart">
							<button class="btn cd-add-to-cart js-cd-add-to-cart" v-on:click="cartEventListener($event)" :data-price="book.book_price" :data-title="book.book_title" :data-cover="'./storage/bookcovers/'+ book.book_id+'.jpg'" v-text="uxmenu['addtocart']"></button>
						</div>
						<div class="book-brief">
							<span class="book-title" v-text="book.book_title"></span>
							<span class="book-author" v-text="book.authors[0]['author_name']"></span>
							<div class="book-rating">
								<span :class="{'fa fa-star checked':book.book_ranking>=2, 'fa fa-star':book.book_ranking<2}"></span>
								<span :class="{'fa fa-star checked':book.book_ranking>=4, 'fa fa-star':book.book_ranking<4}"></span>
								<span :class="{'fa fa-star checked':book.book_ranking>=6, 'fa fa-star':book.book_ranking<6}"></span>
								<span :class="{'fa fa-star checked':book.book_ranking>=8, 'fa fa-star':book.book_ranking<8}"></span>
								<span :class="{'fa fa-star checked':book.book_ranking>=10, 'fa fa-star':book.book_ranking<10}"></span>
							</div>
							<span class="book-price" v-text="'BDT '+book.book_price"></span>
						</div>
						<span v-if="book.id%2==1" class="special-badge"> NEW </span>
						<!-- <div class="offerdiv">
						<p v-text="book.book_offer_rate +'%'"></p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<a style="visibility:hidden" :id="prefix + 'carousel-control-prev'" class="carousel-control-prev" :href="'#'+prefix+'carousel'" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a style="visibility:hidden" :id="prefix + 'carousel-control-next'" class="carousel-control-next" :href="'#'+prefix+'carousel'" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	</a>
</li>
</ul>
</template>
<script>


export default {
	name: 'PreviewCard',
	props:['title','prefix','titleColor', 'uxmenu'],
	data:function() {
		return {
			datalink:'',
			books:[],
			loadedBooks:[],
			totalBooks:0,
			perBookWidth:160,
			bookShelfWidth:0,
			totalPage: 0,
			booksPerPage:0,
			selectedBook:-1,
			windowWidth: 0,
			windowHeight: 0,
		}
	},
	computed:{
		cssVars(){
			return {
				'--title-color': this.titleColor
			}
		}
	},
	created() {
		window.addEventListener('resize', this.getWindowWidth);
		window.addEventListener('resize', this.getWindowHeight);
	},
	destroyed() {
		window.removeEventListener('resize', this.getWindowWidth);
		window.removeEventListener('resize', this.getWindowHeight);
	},
	mounted(){
		if(this.prefix == 'popularbook')
		this.datalink='/books/popularbooks';
		else if(this.prefix == 'favoritebook')
		this.datalink='/books/favoritebooks';
		else
		this.datalink='/books/allbooks';
		this.loadData();
	},
	methods:{
		visibleControls: function(prefix){
			if(this.totalPage>1){
				$("#"+prefix+'carousel-control-prev').css({'visibility':'visible'})
				$("#"+prefix+'carousel-control-next').css({'visibility':'visible'})
			}
		},
		hideControls: function(prefix){
			$("#"+prefix+'carousel-control-prev').css({'visibility':'hidden'})
			$("#"+prefix+'carousel-control-next').css({'visibility':'hidden'})
		},
		cartEventListener: function(event){
			this.$emit('addtocart',event);
		},
		getWindowWidth(event) {
			this.windowWidth = document.documentElement.clientWidth;
			this.renderData();
		},

		getWindowHeight(event) {
			this.windowHeight = document.documentElement.clientHeight;
		},
		itemClicked: function(bookdetail) {
			this.$emit('bookdetail',bookdetail);
		},
		renderData: function(){
			this.windowWidth = document.documentElement.clientWidth;
			this.bookShelfWidth = this.windowWidth-250;
			this.totalPage = Math.ceil((this.totalBooks * this.perBookWidth) / this.bookShelfWidth);
			this.booksPerPage = Math.floor(this.bookShelfWidth/this.perBookWidth);
			//padding selves
			this.books=[];
			this.books= this.loadedBooks;
			// console.log(this.totalPage*this.booksPerPage-this.totalBooks);
			let padding= this.totalPage*this.booksPerPage-this.totalBooks;
			if(padding > 0 && padding <=this.totalBooks){
				this.books= this.books.concat(this.loadedBooks.slice(0, padding));
			}
		},
		loadData: function () {
			axios.get(this.datalink).then((response)=>{
				this.loadedBooks = response.data;
				this.totalBooks = this.loadedBooks.length;
				this.renderData();
			});
		},
		hoverBook(selectedIndex) {
			this.selectedBook = selectedIndex;
			// this.animateBooks();
			// console.log(this.selectedBook);
			// alert(selectedIndex);
			if(selectedIndex!=-1){
				// $("#"+selectedIndex+'addtocart').css({'bottom':'0','display':'block'})
				$("#"+selectedIndex+'cover').css({'height':'135px','width':'auto','cursor':'pointer'})
			}
		},
		leaveBook(selectedIndex){
			if(selectedIndex!=-1){
				// $("#"+selectedIndex+'addtocart').css({'display':'none'})
				$("#"+selectedIndex+'cover').css({'height':'130px','opacity':'1'})
			}
		},
		// animateBooks () {
		// 	this.books.forEach((book, index) => {
		// 		const direction = this.calculateBookDirection(index, this.selectedBook)
		// 		TweenMax.to(
		// 			this.$refs[`book_${index}`],
		// 			0.5,
		// 			{x: direction * 50}
		// 		)
		//
		// 	})
		// },
		calculateBookDirection (bookIndex, selectedIndex) {
			if(selectedIndex === -1) {
				return 0
			}
			const diff = bookIndex - selectedIndex
			return diff === 0 ? 0 : diff/Math.abs(diff)
		},
		isSelected(bookIndex) {
			return this.selectedBook === bookIndex
		}
	}
}
</script>

<style scoped>
.normalizeElement{
	display: flex;
	align-items: center;
	flex-direction: row;
	margin-top: 5px;
	justify-content: space-around;
	background: var(--cd-color-bg);
}
.previewcard {
	display: flex;
	align-items: stretch;
	flex-direction: column;
	height: auto;
	list-style: none;
	align-self: stretch;
	padding: 0 5px;
	flex-wrap: nowrap;
	margin: 10px 0;
	background: var(--cd-color-bg-previewcard);
	background-color: var(--cd-color-bg-previewcard);
	box-shadow: var(--cd-shadow-common);
	-webkit-box-shadow: var(--cd-shadow-common);
	-moz-box-shadow: var(--cd-shadow-common);
	/* border: 1px solid rgba(0, 0, 0, 0.15); */
	/* background-clip: padding-box; */
	/* border-radius: 0.25rem; */
}
.previewcardTitle{
	display: flex;
	align-self: flex-start;
	align-self: stretch;
	margin: 7px;
	overflow: visible;
	font-size: 18px;
	font-weight: normal;
	border-bottom: 1px solid lightgray;
	color: var(--title-color);
}
.special-badge {
	position: absolute;
	right: 0px;
	top: -5px;
	font-weight: normal;
	align-self: center;
	background: #f2d900;
	text-align: center;
	border-top-right-radius : 10px;
	border-bottom-right-radius : 10px;
	color: #0f35ff;
	padding: 0px 10px;
	font-size: 12px;

}
.offerdiv{
	position: absolute;
	right: -15px;
	top: -15px;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: auto;
	background: #dd4444;
	border-radius: 50%;
	text-align: center;
	/* font-size: 14px; */
	width: 30px;
	height: 30px;
	padding: 15px 0 0 0;
	font-family: Arial, Helvetica, sans-serif;
	color: #fff;
	font-size: 12px;
}

a.carousel-control-prev, a.carousel-control-next{
	background: #aaaaaa;
	margin-top: auto;
	margin-bottom: auto;
	width: 30px;
	height: 90px;
}
.carousel-control-next-icon, .carousel-control-prev-icon {
	background-size: 100% 100%;
	height: 30px !important;
	width: 30px !important;
}
.checked {
	color: orange;
}
.book {
	position: relative;
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
	align-items:flex-start;
	background-color: #FFFFFF;
	height: 280px;
	width: 130px;
	margin: 10px 10px;
	padding: 2px 5px;
	/* overflow: hidden; */
	/* box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5); */
}
/*
.book:before {
content: "";
position: absolute;
top: 0%;
left: 0%;
width: 0px;
height: 0px;
border-bottom: 40px solid #eee;
border-left: 40px solid transparent;
-webkit-box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
-moz-box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
}

.book:after {
content: "";
position: absolute;
top: 0%;
left: 0%;
width: 0px;
height: 0px;
border-top: 41px solid rgba(255, 191, 31, 1);
border-right: 41px solid transparent;
}
*/
.book-image {
	height: 130px;
	width: 85px;
}
.book-image {
	/* -webkit-transition-property: height; */
	-webkit-transition-duration: 0.3s;
	/* -webkit-transition-opacity: 0.3s; */
	/* transition-property: height; */
	transition-duration: 0.3s;
	/* transition-opacity: 0.3s; */
}
.book-image.selected {
	/* height: 110%;
	opacity: 0.3; */
}

.book-add-to-cart {
	position: absolute;
	bottom: 0;
	display: inline-block;
	padding: 0 2px;
	/* font-family: 'AdorshoLipi', sans-serif; */
}
.book-title {
	font-size: 15px;
	color: #666;
	/* font-family:'SiyamRupali', sans-serif; */
	font-family: 'AdorshoLipi', sans-serif;
}
.book-author {
	font-size: 13px;
	color: darkgray ;
	/* font-family:'SiyamRupali', sans-serif; */
	font-family: 'AdorshoLipi', sans-serif;
}
.book-price {
	font-size: 13px;
	color: DarkSlateBlue;
	/* font-family:'SiyamRupali', sans-serif; */
	font-family: 'AdorshoLipi', sans-serif;
}
.book-brief {
	display: flex;
	flex-direction: column;
	align-self: flex-start;
	justify-content: flex-start;
	align-items: flex-start;
	font-weight: normal;
	text-align: left;
	/* box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5); */
}
.book-rating{
	line-height: 10px;
	font-size:10px;
}
/* .book {
transition: height 0.3s, box-shadow 0.3s;
}
.book:hover {
height: 95%;
box-shadow: 20px 20px 40px 0px rgba(0,0,0,0.5);
} */
</style>
