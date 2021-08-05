<template>
	<ul class="itemcard">
		<li id="itemCarousel" class="carousel carousel-fade" data-ride="carousel" interval="4000">
			<div class="carousel-inner">
				<div v-for="(item, index) in items" :class="{'carousel-item active':index == 1, 'carousel-item':index != 1 }"
				:key="index+'-'+ item.id"
				:ref="index+'-'+ item.id"
				:id="index+'-'+ item.id"
				class="item card">
				<div class="card-body">
					<img class="item-image card-img-top"
					@click="itemClicked(item)"
					:key="item.id"
					:id="index+'-'+ item.id+ 'cover'"
					:src="'./storage/'+profile+'/'+ item.author_image">

				</div>
				<p class="card-title">{{item.author_name}}</p>
			</div>
		</div>
		<a id="carousel-control-prev" class="carousel-control-prev" href="#itemCarousel" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a id="carousel-control-next" class="carousel-control-next" href="#itemCarousel" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</li>
</ul>
</template>

<style scoped>
.card-title{
	white-space:nowrap;
	font-size: 15px;
	color:black;
	margin: 0;
}
.itemcard {
	display: flex;
	list-style: none;
	font-weight: bold;
	text-align: center;
	background: var(--cd-color-bg-previewcard);
	background-color: var(--cd-color-bg-previewcard);
	box-shadow: var(--cd-shadow-common);
	-webkit-box-shadow: var(--cd-shadow-common);
	-moz-box-shadow: var(--cd-shadow-common);
}
.card-body, .card-title{
	padding-bottom: 5px;
}

.item-image {
	background: #fff0f4;
	position: relative;
	/* background-color: #FFFFFF; */
	max-width: 100%;
	max-height: 100%;
	/* overflow: hidden; */
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5);
}
</style>
<script>
export default {
	name: 'AuthorCard',
	props:['profile','message'],
	data: function(){
		return{
			items: [],
			totalItems: 0,
		}
	},
	mounted(){
		this.loadData('/'+this.profile+'/all');
	},
	methods:{
		itemClicked: function(bookdetail) {
			this.$emit('bookdetail',bookdetail);
		},
		loadData: function (link) {
			axios.get(link).then((response)=>{
				this.items = response.data;
				this.totalItems = this.items.length;
			});
		},
	}
}
</script>
