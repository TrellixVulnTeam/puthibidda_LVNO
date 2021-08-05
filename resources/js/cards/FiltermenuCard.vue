<template>
	<ul class="sidemenucard">
		<li class="submenu" style="color:blue;font-size:20px"> Filter </li>
		<li class="submenu"> By Category </li>
		
		<li class="submenu"> By Writers </li>
		<li class="submenu"> By Title </li>
		<li class="submenu"> By Keywords </li>
  </ul>
</template>

<style scoped>
.sidemenucard {
  background: #FFFFFF;
  padding: 5px;
  height: auto;
  margin-bottom: 10px;
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
  height: auto;
  margin-bottom: 1px;
	line-height: normal;
  flex-grow: 0;
	list-style-type: none;
	border-bottom: 1px solid #ddddee;
}
</style>
<script>
  export default {
    name: 'FiltermenuCard',
    props:['title','message']
  }
</script>
