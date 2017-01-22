import Archive from '../components/Archive.vue'
import Category from '../components/Category.vue'
import Index from '../components/Index.vue'
import Meta from 'vue-meta'
import Page from '../components/Page.vue'
import PageNotFound from '../components/PageNotFound.vue'
import Post from '../components/Post.vue'
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.use(Meta)

const router = new VueRouter({
  mode: 'history',
  base: '/',
  routes: [
    { path: '/', name: 'index', component: Index },
    { path: '/:slug', name: 'page', component: Page },
    { path: '/post/:slug', name: 'post', component: Post },
    { path: '/category/:slug', name: 'category', component: Category },
    { path: '/archive', name: 'achive', component: Archive },
    { path: '/404', name: 'pagenotfound', component: PageNotFound }

  ]
})

export default router
