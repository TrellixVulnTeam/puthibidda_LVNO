<template>
	  <div class="circle">
	    <div class="circle-plus">
	      <div class="vertical-plus">
	      </div>
	    </div>
	  </div>
</template>
<style scoped>
.circle{
	position: absolute;
	margin-top: 10%;
	margin-left: 20px;
	height: 25px;
	width: 25px;
	border: 1px solid #45B4FE;
	border-radius: 50%;
	/* display: inline-block; */
	/* color: red; */
	background-color: #cae3f9;
}
.circle-plus{
	position: relative;
	background-color: #45B4FE;
	width: 50%;
	height: 12.5%;
	left: 25%;
	top: 43.75%;
}
.vertical-plus{
	position: relative;
	background-color: #45B4FE;
	width: 21.5%;
	height: 399%;
	left: 40.75%;
	top: -127.5%;
}
</style>
<script>
export default {
	name: 'HomecontacthelpNav',
	props:['title','message'],
	methods:{
		showHelps:function(){
				this.$emit('helppage','3');
		}
	}
}
</script>
