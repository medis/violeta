import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  texts: []
}

// getters
const getters = {
  allTexts: state => state.texts,
  textsReady: state => state.ready,
  getText: (state, getters) => (keyword) => {
    return state.texts.find(text => text.machine_name === keyword).body
  }
}//state.texts.map(function(e) { return e.machine_name; }).indexOf('Nick')

// actions
const actions = {
  getAllTexts ({ commit }) {
    axios.get(vars.API_LINK + 'texts')
      .then(texts => {
        commit('ADD_TEXTS', { texts })
      });
  }
}

// mutations
const mutations = {
  ['ADD_TEXTS'] (state, { texts }) {
    state.texts = texts.data.data;
    state.ready = true;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}