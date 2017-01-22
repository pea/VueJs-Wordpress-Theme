<template>
  <div>
    <div v-if="!dataReady">
      Loading
    </div>
    <div v-if="dataReady">
      <h1>Archive</h1>
      Total: {{ posts.total }}<br>
      Total Pages: {{ posts.totalPages }}
      <ul>
        <li v-for="post in posts.data">
          <router-link :to="{ path: `post/${post.slug}` }">
            {{ post.title }}
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import router from '../router/index'
import store from '../vuex/store'

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
  name: 'archive',
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
      fetchInitialData(store)
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