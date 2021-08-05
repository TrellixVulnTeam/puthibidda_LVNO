<template>
	<ul class="bestbookmenucard">
		<!-- {{uxmenu['morebeautifulbooks']}} -->
		<li v-text="uxmenu['bestbooks']" style="color:green;font-size:15px;list-style:none"> </li>
		<li class="submenu" v-text="uxmenu['morebeautifulbooks']" ></li>
		<li class="submenu" v-text="uxmenu['bestcookbookever']"> </li>
		<li class="submenu" v-text="uxmenu['bestcrimeandthrillerbooks']"></li>
		<li class="submenu" v-text="uxmenu['bestromanticbooks']"></li>
		<li class="submenu" v-text="uxmenu['besthistorybooks']"></li>
	</ul>
</template>

<style scoped>
.bestbookmenucard {
	background: #FFFFFF;
	padding: 5px;
	height: auto;
	margin-bottom: 10px;
	font-weight: normal;
	flex-direction: column;
	text-align: left;
	align-items: flex-start;
	box-shadow: var(--cd-shadow-common);
	-webkit-box-shadow: var(--cd-shadow-common);
	-moz-box-shadow: var(--cd-shadow-common);
}

.submenu{
	padding: 0 5px;
	background: #FFFFFF;
	color: #555566;
	font-size:13px;
	height: auto;
	cursor:pointer;
  margin-bottom: 2px;
	line-height: normal;
  flex-grow: 0;
	list-style-type: none;
}
.submenu:hover {
	color: white;
	background: #0099cc;
	background-color: #0099cc;
}
</style>
<script>
export default {
	name: 'SidemenuCard',
	props:['uxmenu']
}
</script>
