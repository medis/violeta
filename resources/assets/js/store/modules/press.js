import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  press: [],
  meta: []
}

// getters
const getters = {
  allPress: state => state.press,
  pressPager: state => state.meta.pagination,
  pressReady: state => state.ready
}

// actions
const actions = {
  getAllPress ({ commit }) {
    axios.get(vars.API_LINK + 'press')
      .then(press => {
        commit('ADD_PRESS', { press })
      });
  },

  changePressPage ({ commit }, link) {
    commit('DISABLE_PRESS');
    var param = link.split('?')[1];
    axios.get(vars.API_LINK + 'press?' + param)
      .then(press => {
        commit('ADD_PRESS', { press })
      });
  }
}

// mutations
const mutations = {
  ['ADD_PRESS'] (state, { press }) {
    state.press = press.data.data;
    state.meta = press.data.meta;
    state.ready = true;
  },

  ['DISABLE_PRESS'] (state) {
    state.press = [];
    state.meta = [];
    state.ready = false;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}