<template>
  <div class="book-detail">
    <div class="container">
      <div class="modal fade" id="book-detail" role="dialog">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <ol class="breadcrumb">
              <li v-if="bookdetail.category.category_title" class="breadcrumb-item"><a href="#">{{appdetail.categories[bookdetail.category.category_title]}}</a></li>
              <li v-if="bookdetail.category.category_class!='1'" class="breadcrumb-item"><a href="#">{{appdetail.classes[bookdetail.category.category_class]}}</a></li>
              <li v-if="bookdetail.category.category_year!='1'" class="breadcrumb-item"><a href="#">{{appdetail.years[bookdetail.category.category_year]}}</a></li>

              <li v-if="bookdetail.category.category_semester!='1'" class="breadcrumb-item"><a href="#">{{appdetail.semesters[bookdetail.category.category_semester]}}</a></li>

              <li v-if="bookdetail.category.category_part!='1'" class="breadcrumb-item"><a href="#">{{appdetail.parts[bookdetail.category.category_part]}}</a></li>

              <li v-if="bookdetail.category.category_session!='1'" class="breadcrumb-item"><a href="#">{{appdetail.sessions[bookdetail.category.category_session]}}</a></li>

              <li v-if="bookdetail.category.category_favorite!='1'" class="breadcrumb-item"><a href="#">{{appdetail.favorites[bookdetail.category.category_favorite]}}</a></li>
              <li v-if="bookdetail.category.category_relation!='1'" class="breadcrumb-item"><a href="#">{{appdetail.relations[bookdetail.category.category_relation]}}</a></li>
              <!-- <li class="breadcrumb-item active" aria-current="page">T-Shirts</li> -->
            </ol>
            <div class="modal-body">
              <div class="foldtl col-md-12 page ">
                <div class="store-body">
                  <div class="book_description">
                    <h2>{{bookdetail.book_title}}</h2>
                    <p>Sample product box</p>
                    <span class="salePercentage" style="margin-top: 15px">40%</span>
                    <span class="saleOff" style="margin-top: 15px">OFF</span>
                  </div>
                  <div class="product">
                    <div class="make3D">
                      <div class="product-front">
                        <div class="shadow"></div>
                        <img :src="'./storage/bookcovers/'+ bookdetail.book_cover">
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">
                          <div class="stats-container">
                            <span class="product_price">$39</span>
                            <span class="product_name">FLUTED HEM DRESS</span>
                            <p>Summer dress</p>
                          </div>
                        </div>
                      </div>
                      <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                          <ul class="carousel-container">
                            <li><img :src="'./storage/bookcovers/'+ bookdetail.book_cover"></li>
                            <li><img :src="'./storage/bookcovers/'+ bookdetail.book_cover"></li>
                            <li><img :src="'./storage/bookcovers/'+ bookdetail.book_cover"></li>
                          </ul>
                          <div class="arrows-perspective">
                            <div class="carouselPrev">
                              <div class="y"></div>
                              <div class="x"></div>
                            </div>
                            <div class="carouselNext">
                              <div class="y"></div>
                              <div class="x"></div>
                            </div>
                          </div>
                        </div>
                        <div class="flip-back">
                          <div class="cy"></div>
                          <div class="cx"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <nav class="header-navigation">
                <button type="button" class="btn btn-link" data-dismiss="modal">Back to List</button>
                <div class="btn-group">
                  <a href="#" class="btn btn-link btn-share">Share</a>
                  <a href="#" class="btn btn-link">Sell item like this</a>
                </div>
              </nav>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.header-navigation {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
  font-size: .80rem;
}

.header-navigation a {
  font-size: .80rem;
}

.header-navigation .breadcrumb {
  margin-bottom: 0;
  background-color: transparent;
  padding: 0.20rem 1rem;
}

.header-navigation .btn-group {
  margin-left: auto;
}

.header-navigation .btn-share {
  position: relative;
}

.header-navigation .btn-share::after {
  content: "";
  width: 1px;
  height: 50%;
  background-color: #ccc;
  position: absolute;
  top: 50%;
  left: 100%;
  transform: translateY(-50%);
}
.store-body {
  display: flex;
  flex-direction: row;
  padding: 0;
}

.store-body .book_description {
  border-right: 1px solid rgba(0,0,0,.125);
}

.store-body .product {
  width: 248px;
  padding: 15px 15px 0 15px;
}


.page {
  background: #fff;
  width: 100%;
  height: 400px;
  margin: 5px;

  /*
  background: -moz-linear-gradient(bottom,  #ffffff 0%, #e5e5e5 100%);
  background: -webkit-gradient(linear, left bottom, left top, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5));
  background: -webkit-linear-gradient(bottom,  #ffffff 0%,#e5e5e5 100%);
  background: -o-linear-gradient(bottom,  #ffffff 0%,#e5e5e5 100%);
  background: -ms-linear-gradient(bottom,  #ffffff 0%,#e5e5e5 100%);
  background: linear-gradient(bottom,  #ffffff 0%,#e5e5e5 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); */
}

.page h2 {
  padding: 15px 0 0 20px;
  font: 400 35px/1.5 'Lilita One', Helvetica, sans-serif;
}

.page p {
  padding: 10px 20px;
  font: 12px/1.5 Helvetica, sans-serif;
  color: #4b4b4b;
}

.triangle {
  width: 0px;
  height: 0px;
  border-bottom: 170px solid #000;
  border-right: 170px solid transparent;
}

.foldtl {
  position: relative;
  -webkit-box-shadow: -5px -5px 20px rgba(0,0,0,0.6);
  -moz-box-shadow: -5px -5px 20px rgba(0,0,0,0.6);
  box-shadow: -5px -5px 20px rgba(0,0,0,0.6);
}

.foldtl:before {
  content: "";
  position: absolute;
  bottom: 0%;
  right: 0%;
  width: 0px;
  height: 0px;
  border-top: 70px solid #eee;
  border-right: 70px solid transparent;
  -webkit-box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
  -moz-box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
  box-shadow: -7px -7px 7px rgba(0,0,0,0.3);
}

.foldtl:after {
  content: "";
  position: absolute;
  bottom: 0%;
  right: 0%;
  width: 0px;
  height: 0px;
  border-bottom: 69px solid rgba(255, 191, 31, 1);
  border-left: 69px solid transparent;
}


.salePercentage {
  font-size: 20px;
  font-weight: bold;
  position: absolute;
  padding-top: 50px;
  padding-right: 5px;
  right:0;
  z-index: 1;
  bottom: 0px;
  color: #f02333;
}

.saleOff {
  font-size: 20px;
  font-weight: bold;
  position: absolute;
  right: 25px;
  bottom: 33px;
  z-index: 1;
  color: #f02333;
}
.product{
  position: relative;
  perspective: 800px;
  width:248px;
  height:372px;
  transform-style: preserve-3d;
  transition: transform 5s;
  float:left;
  margin-right: 23px;
  -webkit-transition: width 500ms ease-in-out;
  -moz-transition: width 500ms ease-in-out;
  -ms-transition: width 500ms ease-in-out;
  -o-transition: width 500ms ease-in-out;
  transition: width 500ms ease-in-out;
}
.product-front img{width:100%;}
.product-front, .product-back{
  width:256px;
  height:380px;
  background:#fff;
  position:absolute;
  left:-5px;
  top:-5px;
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.product-back{
  display:none;
  transform: rotateY( 180deg );
}
.make3D.animate .product-back,
.make3D.animate .product-front,
div.large .product-back{
  top:0px;
  left:0px;
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.make3D{
  width:247px;
  height:371px;
  position:absolute;
  top:10px;
  left:10px;
  overflow:hidden;
  transform-style: preserve-3d;
  -webkit-transition:  100ms ease-out;
  -moz-transition:  100ms ease-out;
  -o-transition:  100ms ease-out;
  transition:  100ms ease-out;
}
div.make3D.flip-10{
  -webkit-transform: rotateY( -10deg );
  -moz-transform: rotateY( -10deg );
  -o-transform: rotateY( -10deg );
  transform: rotateY( -10deg );
  transition:  50ms ease-out;
}
div.make3D.flip90{
  -webkit-transform: rotateY( 90deg );
  -moz-transform: rotateY( 90deg );
  -o-transform: rotateY( 90deg );
  transform: rotateY( 90deg );
  transition:  100ms ease-in;
}
div.make3D.flip190{
  -webkit-transform: rotateY( 190deg );
  -moz-transform: rotateY( 190deg );
  -o-transform: rotateY( 190deg );
  transform: rotateY( 190deg );
  transition:  100ms ease-out;
}
div.make3D.flip180{
  -webkit-transform: rotateY( 180deg );
  -moz-transform: rotateY( 180deg );
  -o-transform: rotateY( 180deg );
  transform: rotateY( 180deg );
  transition:  150ms ease-out;
}
.make3D.animate{
  top:5px;
  left:5px;
  width:256px;
  height:380px;
  box-shadow:0px 5px 31px -1px rgba(0, 0, 0, 0.15);
  -webkit-transition:  100ms ease-out;
  -moz-transition:  100ms ease-out;
  -o-transition:  100ms ease-out;
  transition:  100ms ease-out;
}
div.large .make3D{
  top:0;
  left:0;
  width:256px;
  height:380px;
  -webkit-transition:  300ms ease-out;
  -moz-transition:  300ms ease-out;
  -o-transition:  300ms ease-out;
  transition:  300ms ease-out;
}
.large div.make3D{box-shadow:0px 5px 31px -1px rgba(0, 0, 0, 0);}
.large div.flip-back{display:none;}
.stats-container{
  background:#fff;
  position:absolute;
  top:382px;
  left:0;
  width: 252px;
  height: 300px;
  padding: 24px 40px 35px 32px;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.make3D.animate .stats-container{
  top:265px;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.stats-container .product_name{
  font-size: 15px;
  color: #393c45;
  font-weight: 700;
}
.stats-container p{
  font-size:15px;
  color:#b1b1b3;
  padding:2px 0 20px 0;
}
.stats-container .product_price{
  float:right;
  color:#5ff7d2;
  font-size:22px;
  font-weight:600;
}
.image_overlay{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:#5ff7d2;
  opacity:0;
}
.make3D.animate .image_overlay{
  opacity:0.7;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.product-options{
  padding:0;
}
.product-options strong{
  font-weight:700;
  color:#393c45;
  font-size:14px;
}
.product-options span{
  color:#969699;
  font-size:14px;
  display:block;
  margin-bottom:8px;
}
.add_to_cart{
  position:absolute;
  top:80px;
  left:50%;
  width:152px;
  font-size:15px;
  margin-left:-78px;
  border:2px solid #fff;
  color:#fff;
  text-align:center;
  text-transform:uppercase;
  font-weight:700;
  padding:10px 0;
  opacity:0;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.add_to_cart:hover{
  background:#fff;
  color:#5ff7d2;
  cursor:pointer;

}
.make3D.animate .add_to_cart{
  opacity:1;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.view_gallery{
  position:absolute;
  top:144px;
  left:50%;
  width:152px;
  font-size:15px;
  margin-left:-78px;
  border:2px solid #fff;
  color:#fff;
  text-align:center;
  text-transform:uppercase;
  font-weight:700;
  padding:10px 0;
  opacity:0;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
.view_gallery:hover{
  background:#fff;
  color:#5ff7d2;
  cursor:pointer;

}
.make3D.animate .view_gallery{
  opacity:1;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}
div.colors div{
  margin-top:3px;
  width:15px;
  height:15px;
  margin-right:5px;
  float:left;
}
div.colors div span{
  width:15px;
  height:15px;
  display:block;
  border-radius:50%;
}
div.colors div span:hover{
  width:17px;
  height:17px;
  margin:-1px 0 0 -1px;
}
div.c-blue span{background:#6e8cd5;}
div.c-red span{background:#f56060;}
div.c-green span{background:#44c28d;}
div.c-white span{
  background:#fff;
  width:14px;
  height:14px;
  border:1px solid #e8e9eb;
}
div.shadow{
  width:335px;height:520px;
  opacity:0;
  position:absolute;
  top:0;
  left:0;
  z-index:3;
  display:none;
  background: -webkit-linear-gradient(left,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
  background: -o-linear-gradient(right,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
  background: -moz-linear-gradient(right,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
  background: linear-gradient(to right, rgba(0,0,0,0.1), rgba(0,0,0,0.2));
}
.product-back div.shadow{
  z-index:10;
  opacity:1;
  background: -webkit-linear-gradient(left,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
  background: -o-linear-gradient(right,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
  background: -moz-linear-gradient(right,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
  background: linear-gradient(to right, rgba(0,0,0,0.2), rgba(0,0,0,0.1));
}
.flip-back{
  position:absolute;
  top:20px;
  right:20px;
  width:30px;
  height:30px;
  cursor:pointer;
}
.cx, .cy{
  background:#d2d5dc;
  position:absolute;
  width:0px;
  top:15px;
  right:15px;
  height:3px;
  -webkit-transition: all 250ms ease-in-out;
  -moz-transition: all 250ms ease-in-out;
  -ms-transition: all 250ms ease-in-out;
  -o-transition: all 250ms ease-in-out;
  transition: all 250ms ease-in-out;
}
.flip-back:hover .cx, .flip-back:hover .cy{
  background:#979ca7;
  -webkit-transition: all 250ms ease-in-out;
  -moz-transition: all 250ms ease-in-out;
  -ms-transition: all 250ms ease-in-out;
  -o-transition: all 250ms ease-in-out;
  transition: all 250ms ease-in-out;
}
.cx.s1, .cy.s1{
  right:0;
  width:30px;
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.cy.s2{
  -ms-transform: rotate(50deg);
  -webkit-transform: rotate(50deg);
  transform: rotate(50deg);
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.cy.s3{
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.cx.s1{
  right:0;
  width:30px;
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.cx.s2{
  -ms-transform: rotate(140deg);
  -webkit-transform: rotate(140deg);
  transform: rotate(140deg);
  -webkit-transition: all 100ms ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.cx.s3{
  -ms-transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
  transform: rotate(135deg);
  -webkit-transition: all 100ease-out;
  -moz-transition: all 100ms ease-out;
  -ms-transition: all 100ms ease-out;
  -o-transition: all 100ms ease-out;
  transition: all 100ms ease-out;
}
.carousel{
  width:256px;
  height:500px;
  overflow:hidden;
  position:relative;
}
.carousel ul{
  position:absolute;
  top:0;
  left:0;
}
.carousel li{
  width:256px;
  height:500px;
  float:left;
  overflow:hidden;
}
.carousel img{
  margin-top: -22px;
  width: 110%;
}
.arrows-perspective{
  width:256px;
  height:55px;
  position: absolute;
  top: 218px;
  transform-style: preserve-3d;
  transition: transform 5s;
  perspective: 335px;
}
.carouselPrev, .carouselNext{
  width: 50px;
  height: 55px;
  background: #ccc;
  position: absolute;
  top:0;
  transition: all 200ms ease-out;
  opacity:0.9;
  cursor:pointer;
}
.carouselNext{
  top:0;
  right: -26px;
  -webkit-transform: rotateY( -117deg );
  -moz-transform: rotateY( -117deg );
  -o-transform: rotateY( -117deg );
  transform: rotateY( -117deg );
  transition: all 200ms ease-out;

}
.carouselNext.visible{
  right:0;
  opacity:0.8;
  background: #fff;
  -webkit-transform: rotateY( 0deg );
  -moz-transform: rotateY( 0deg );
  -o-transform: rotateY( 0deg );
  transform: rotateY( 0deg );
  transition: all 200ms ease-out;
}
.carouselPrev{
  left:-26px;
  top:0;
  -webkit-transform: rotateY( 117deg );
  -moz-transform: rotateY( 117deg );
  -o-transform: rotateY( 117deg );
  transform: rotateY( 117deg );
  transition: all 200ms ease-out;

}
.carouselPrev.visible{
  left:0;
  opacity:0.8;
  background: #fff;
  -webkit-transform: rotateY( 0deg );
  -moz-transform: rotateY( 0deg );
  -o-transform: rotateY( 0deg );
  transform: rotateY( 0deg );
  transition: all 200ms ease-out;
}
.carousel .x, .carousel .y{
  height:2px;
  width:15px;
  background:#5ff7d2;
  position:absolute;
  top:31px;
  left:17px;
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.carousel .x{
  -ms-transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
  transform: rotate(135deg);
  top:21px;
}
.carousel .carouselNext .x{
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.carousel .carouselNext .y{
  -ms-transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
  transform: rotate(135deg);
}
</style>
<script>
export default {
  name:'BookDetail',
  props:['bookdetail','appdetail']
}
</script>
