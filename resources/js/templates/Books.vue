<template>
<div class="book-row">
<div v-for="(book, index) in books"
:key="book.id"
:ref="'book_'+index"
@mouseover="hoverBook(index)"
@mouseout="hoverBook(-1)"
@mouseleave="leaveBook(index)"
class="book">
<img class="book-image"
:class="{'selected': isSelected(index)}"
:src="'./storage/bookcovers/'+book.book_cover">
<div class="book-footer">
<h3 class="book-title" v-text="book.title"></h3>
<!-- <h3 class="book-title" >@{{book.title}}</h3> -->
<p class="book-text">by
<span
class="book-author"
:class="{'selected': isSelected(index)}" v-text="book.author"></span>
</p>
</div>
</div>
</div>
</template>
<style scoped>
.book-row {
  display: flex;
  justify-content: center;
  align-items: center;
  min-width: 100%;
  height: 200px;
}
.book {
  position: relative;
  background-color: #FFFFFF;
  height: 175px;
  width: 110px;
  margin: 10px;
  overflow: hidden;
  box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.5);
}
.book-image {
  position: absolute;
  left: -9999px;
  right: -9999px;
  margin: auto;
  height: 100%;
  min-width: 100%;
}
.book-image {
  /* the other rules */
  transition: height 0.3s, opacity 0.3s;
}
.book-image.selected {
  height: 110%;
  opacity: 0.3;
}
.book-author {
  /* the other rules */
  transition: color 0.3s;
}
.book-author.selected {
  color: #B0B000;
}
.book-footer {
  position: absolute;
  bottom: 0;
  display: none;
  height: 20%;
  padding: 10px 15px;
  font-family: 'AdorshoLipi', sans-serif;
}
.book-text {
  font-size: 12px;
  color: rgba(0, 0, 0, 0.9);
}
.book-title {
  font-size: 15px;
  font-family:'AdorshoLipi', sans-serif;
}
.book-author {
  font-size: 13px;
  color: #Ba64FF;
}
.book {
  /* the other rules */
  transition: height 0.3s, box-shadow 0.3s;
}
.book:hover {
  height: 95%;
  box-shadow: 20px 20px 40px 0px rgba(0,0,0,0.5);
}
</style>
<script>
export default {
name:'Books',
props:['books'],
methods:{
  hoverBook(selectedIndex) {
    this.selectedBook = selectedIndex
    this.animateBooks()
    if(selectedIndex!=-1){
    $(".book-footer:eq("+selectedIndex+")").css('position','relative')
    $(".book-image:eq("+selectedIndex+")").css({'height':'110%','opacity':'0.3'})
    }
  },
  leaveBook(selectedIndex){
    if(selectedIndex!=-1){
    $(".book-footer:eq("+selectedIndex+")").css('position','absolute')
    $(".book-image:eq("+selectedIndex+")").css({'height':'100%','opacity':'1'})
    }
  },
  animateBooks () {
    this.books.forEach((book, index) => {
      const direction = this.calculateBookDirection(index, this.selectedBook)
      TweenMax.to(
        this.$refs[`book_${index}`],
        0.9,
        {x: direction * 50}
      )
    })
  },
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
