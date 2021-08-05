<template>
	<ul class="popularbookmenucard">
		<li v-text="uxmenu['popularbooks']" style="color:blue;font-size:15px;list-style:none"> </li>
		<li class="submenu" v-text="uxmenu['popularcookbookever']">  </li>
		<li class="submenu" v-text="uxmenu['popularcrimeandthrillerbooks']"> </li>
		<li class="submenu" v-text="uxmenu['popularromanticbooks']"></li>
		<li class="submenu" v-text="uxmenu['popularhistorybooks']"> </li>
  </ul>
</template>

<style scoped>
.popularbookmenucard {
  background: #fff;
  padding: 2px 2px;
  height: auto;
  margin-bottom: 10px;
  flex-direction: column;
  text-align: left;
		font-weight: normal;
	align-items: flex-start;
	box-shadow: var(--cd-shadow-common);
	-webkit-box-shadow: var(--cd-shadow-common);
	-moz-box-shadow: var(--cd-shadow-common);
}

.submenu{
	padding: 2px 7px;
	color: #0099cc;
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
