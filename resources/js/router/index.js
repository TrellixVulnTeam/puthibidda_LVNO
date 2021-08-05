import Vue from 'vue'
//
// import Router from 'vue-router'
// import home from '@/components/home'
// import blog from '@/components/blog'
// import services from '@/components/services'
// import contact from '@/components/contact'
// import details from '@/components/details'
//
// Vue.use(Router)

import Router from 'vue-router'
Vue.use(Router)

import NewBooks from '../templates/NewBooks.vue'
import Books from '../templates/Books.vue'
import Categories from '../templates/Categories.vue'

export default new Router({
  routes: [
    {
      path: '/newbooks',
      name: 'NewBooks',
      component: NewBooks
    },
    {
      path: '/books',
      name: 'Books',
      component: Books
    },
    {
      path: '/categories',
      name: 'Categories',
      component: Categories
    }
  ]
})
