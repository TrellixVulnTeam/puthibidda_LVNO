<template>
<div class="todays-special" style="display:none;" background-color="#000000" text-variant="white">
<div id="todaysSpecialCardSammary"  class="card text-white bg-dark mb-3 col-xl-12" style="width: 90%;">
  <img class="card-img-top col-xl-3" id="ts_rotate_left" src="/storage/bookcovers/todaysspeical.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">আজকের আকর্ষণ</h5>
    <p class="card-text">সঞ্চয়িতার কবিতাগুলি সংকলনের ভার আমি নিজে নিয়েছি। অন্যের উপরেই দিতাম। কেননা,কবিতা যে লেখে কবিতাগুলির অন্তরের ইতিহাস তার কাছে সুম্পষ্ট। বাহিরের প্রকাশে কবিতাগুলি উজ্জ্বল হয়েছে কি না হয়তো সেটা তার পক্ষে নিশ্চিত বোঝা কোনো স্থলে সহজ হয় না। কিন্তু, এই সংকলন উপলক্ষে একটি কথা বলার সুযোগ পাব প্রত্যাশা করে এ কাজে হাত দিয়েছি।</p>
    <a href="#" style="display:flex; position:absolute;right:10px;top:10px" class="btn btn-success">বিস্তারিত</a>
  </div>
</div>
</div>
</template>
<style scoped>
#ts_rotate_left {
height:210px;
width:160px;
float: left;
-ms-transform: rotate(-8deg); /* IE 9 */
-webkit-transform: rotate(-8deg); /* Safari */
transform: rotate(-8deg);
}

#todaysSpecialCardSammary{
position:absolute;
width:95%;
left:20px;
bottom:10px;
height:45%;
}
</style>
<script>
export default {
name:'TodaysSpecial'
}
</script>
