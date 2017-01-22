<template>
  <div>
    <div v-if="!dataReady">
      Loading
    </div>
    <div v-if="dataReady">
      <h1>Wordpress Vue.js Server-Side Redering</h1>
      <div class="grid gut40 outergut">
        <div class="col perc20" v-for="post in posts.data">
          <div class="item">
            <router-link :to="{ path: `post/${post.slug}` }">
              <div class="title">{{ post.title }}</div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="sass" scoped>
  .item {
    a {
      text-decoration: none;
    }
    .image {
      width: 100%;
      padding-bottom: 50%;
      background-size: cover;
      margin: 0 0 5px 0
    }
    .title {
      font-size: 14px
    }
  }
</style>

<script>
import { mapGetters } from 'vuex'
import router from '../router/index'

const fetchInitialData = store => {
  return new Promise((resolve, reject) => {
    if (store.state.posts === null) {
      return store.dispatch('getPosts')
      .then(
        response => { return resolve(response) },
        response => { return reject(response) }
      )
    } else {
      resolve(store.state.posts)
    }
  })
  .catch(() => { router.push({name: 'pagenotfound'}) })
}
export default {
  name: 'index',
  data () {
    return {
      dataReady: false
    }
  },
  computed: {
    ...mapGetters({
      posts: 'getPosts'
    })
  },
  methods: {
    loadData () {
      if (this.$route.name !== this.$options.name) {
        return
      }
      this.dataReady = false
      fetchInitialData(this.$store)
      .then(() => {
        this.dataReady = true
      })
      .catch(err => {
        if (err) this.$router.push({name: 'pagenotfound'})
      })
    }
  },
  watch: {
    '$route': 'loadData'
  },
  mounted () {
    this.loadData()
  }
}
</script>