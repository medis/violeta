import Vue from 'vue'
import Vuex from 'vuex'
import show from './modules/show'
import press from './modules/press'
import music from './modules/music'

Vue.use(Vuex)


export default new Vuex.Store({
  modules: {
    show,
    press,
    music
  }
})