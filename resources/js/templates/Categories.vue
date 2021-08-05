<template>
<div class="category-grid" >
<div v-for="(category, index) in categories"
:key="index"
:ref="'category_'+index"
@mouseover="hoverCategory(index)"
@mouseout="hoverCategory(-1)"
@mouseleave="leaveCategory(index)"
class="category">
<img class="category-image"
:class="{'selected': isSelected(index)}"
:src="category.image">
</div>
</div>
</template>
<script>
export default {
name:'Categories',
props:['categories'],
methods:{
  hoverCategory(selectedIndex) {
    this.selectedCategory = selectedIndex
    this.animateCategories()
  },
  leaveCategory(selectedIndex){

  },
  animateCategories () {
    this.categories.forEach((category, index) => {
      const direction = this.calculateCategoryDirection(index, this.selectedCategory)
      TweenMax.to(
        this.$refs[`category_${index}`],
        0.9,
        {x: direction * 50}
      )
    })
  },
  calculateCategoryDirection (categoryIndex, selectedIndex) {
    if(selectedIndex === -1) {
      return 0
    }
    const diff = categoryIndex - selectedIndex
    return diff === 0 ? 0 : diff/Math.abs(diff)
  },

  isSelected(categoryIndex) {
    return this.selectedCategory === categoryIndex
  }
}
}
</script>
