import Vue from 'vue'
import Vuex from 'vuex'
import press from './modules/press'

Vue.use(Vuex)


export default new Vuex.Store({
  modules: {
    press
  }
})