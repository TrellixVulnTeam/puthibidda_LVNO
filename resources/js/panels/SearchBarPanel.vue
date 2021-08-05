<template>
	<li class="searchbarpanel ">
		<nav id="searchbarNavbar" class="navbar navbar-laravel">
				<li>
					<a  class="navbar-brand" href="#"  v-on:click="homePage" >
						<img src="storage/logos/logo2000.png" alt="" style="height: 50px" />
					</a>
				</li>
				<li class="searchmodule">
					<div id="book-search-form" >
						<input type="text" placeholder="Search for Books by Title/ Keyword/ Author" id="book_search_input" class="book-search"/>
						<i id="filtersubmit" class="fa fa-search"  v-on:click="searchBooks"></i>
					</div>
				</li>
				<li class="homedeliveryAds">
					<img src="storage/icons/homedelivery.png" alt="" style="height: 50px;" />
				</li>
			</nav>
	</li>
</template>
<style scoped>
.homedeliveryAds{
	display: flex;
	justify-content: center;
	flex-grow: 0;
	padding-left: 1rem;
	padding-right: 1rem;
}
@media only screen and (max-width: 1200px) {
	.homedeliveryAds{
		display: none;
		visibility: hidden;
	}
}
.searchbarpanel{
	display: flex;
	flex-direction: row;
	align-items: center;
	list-style: none;
}
.searchmodule{
	display: flex;
	flex-grow: 1;
	justify-content: center;
}
#searchbarNavbar{
		display: flex;
		justify-content: space-around;
		list-style: none;
		align-items: center;
		flex-direction: row;
		width:100%;
		background: var(--cd-color-bg-search);
		background-color: var(--cd-color-bg-search);
}

@media screen and (min-width: 800px) {
	#searchbarNavbar {
		padding-left: 5rem;
		padding-right: 5rem;
	}
}
#book-search-form {
	background: #e1e1e1;
	flex-grow: 2;
	background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
	background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);

	/* Rounded Corners */
	border-radius: 17px;
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;

	/* Shadows */
	box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
}
/*** TEXT BOX ***/
.book-search{
	background: #fafafa; /* Fallback color for non-css3 browsers */

	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
	background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);
	border: 0;
	border-bottom: 2px solid #fff;
	border-right: 1px solid rgba(255,255,255,.8);
	font-size: 14px;
	margin: 2px;
	padding: 3px 10px;
	width: 90%;

	/* Rounded Corners */
	border-radius: 17px;
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;

	/* Shadows */
	box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-webkit-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-moz-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
}

/*** USER IS FOCUSED ON TEXT BOX ***/
.book-search:focus{
	outline: none;
	background: #fff; /* Fallback color for non-css3 browsers */
	border-bottom: 2px solid #85CC46;
	border-right: 1px solid #85CC46;
	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(255,255,255)), color-stop(1, rgb(235,235,235)));
	background: -moz-linear-gradient( center top, rgb(255,255,255) 0%, rgb(235,235,235) 100%);
}
#book-search-form:hover >  #filtersubmit{
	color: red;
}
#filtersubmit {
	position: relative;
	z-index: 1;
	color: #7B7B7B;
	cursor:pointer;
	text-align: center;
	width: 5%;
}
</style>
<script>
export default {
	name: 'SearchBar',
	props:['cards'],
	methods:{
		searchBooks: function(){
			this.$emit('searchbooks');
		},
		homePage: function(){
			this.$emit('homepage');
		}
	}
}
</script>
