import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  radios: [],
  meta: [],
  links: []
}

// getters
const getters = {
  allRadios: state => state.radios,
  radiosPager: state => state.meta,
  radiosLinks: state => state.links,
  radiosReady: state => state.ready
}

// actions
const actions = {
  getAllRadios ({ commit }) {
    axios.get(vars.API_LINK + 'radios')
      .then(radios => {
        commit('ADD_RADIOS', { radios })
      });
  },

  changeRadiosPage ({ commit }, link) {
    commit('DISABLE_RADIOS');
    var param = link.split('?')[1];
    axios.get(vars.API_LINK + 'radios?' + param)
      .then(radios => {
        commit('ADD_RADIOS', { radios })
      });
  }
}

// mutations
const mutations = {
  ['ADD_RADIOS'] (state, { radios }) {
    state.radios = radios.data.data;
    state.meta = radios.data.meta;
    state.links = radios.data.links;
    state.ready = true;
  },

  ['DISABLE_RADIOS'] (state) {
    state.radios = [];
    state.meta = [];
    state.links = [];
    state.ready = false;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}