<template>
  <div>
    <div v-if="!dataReady">
      Loading
    </div>
    <div v-if="dataReady">
        <h1>{{ post.title }}</h1>
        <div v-html="post.content">{{ post.content }}</div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import router from '../router/index'
import store from '../vuex/store'

const fetchInitialData = (store, params) => {
  return new Promise((resolve, reject) => {
    if (params.slug !== store.state.post.slug) {
      return store.dispatch('getPost', params.slug)
      .then(
        response => { return resolve(response) },
        response => { return reject(response) }
      )
    } else {
      resolve(store.state.post)
    }
  })
  .catch(() => { router.push({name: 'pagenotfound'}) })
}
export default {
  name: 'post',
  data () {
    return {
      dataReady: false
    }
  },
  computed: {
    ...mapGetters({
      post: 'getPost'
    })
  },
  metaInfo () {
    return {
      title: store.state.post.title || 'Loading',
      titleTemplate: '%s'
    }
  },
  methods: {
    loadData () {
      if (this.$route.name !== this.$options.name) {
        return
      }
      this.dataReady = false
      return fetchInitialData(this.$store, this.$route.params)
      .then(response => {
        this.dataReady = true
      })
      .catch(err => {
        if (err) this.$router.push({name: 'pagenotfound'})
      })
    }
  },
  watch: {
    '$route.params.slug': 'loadData'
  },
  mounted () {
    this.loadData()
  }
}
</script>