// import shop from '../../api/shop'
import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  shows: [],
  latestShows: [],
  meta: []
}

// getters
const getters = {
  allShows: state => state.shows,
  showsPager: state => state.meta.pagination,
  mostRecentShows: state => state.latestShows,
  showsReady: state => state.ready
}

// actions
const actions = {
  getAllShows ({ commit }) {
    axios.get(vars.API_LINK + 'shows')
      .then(shows => {
        commit('ADD_SHOWS', { shows })
      });

    // shop.getProducts(products => {
    //   commit('ADD_SHOWS', { products })
    // })
  },

  changeShowsPage ({ commit}, link) {
    commit('DISABLE_SHOWS');
    var param = link.split('?')[1];
    axios.get(vars.API_LINK + 'shows?' + param)
      .then(shows => {
        commit('ADD_SHOWS', { shows })
      });
  }
}

// mutations
const mutations = {
  ['ADD_SHOWS'] (state, { shows }) {
    state.shows = shows.data.data;
    // Add latest shows only when first page is fetched.
    // Page can be changed in Shows page but latest shows should never change.
    state.latestShows = !state.latestShows.length ? shows.data.data.slice(0, 3) : state.latestShows;
    state.meta = shows.data.meta;
    state.ready = true;
  },

  ['DISABLE_SHOWS'] (state) {
    state.shows = [];
    state.meta = [];
    state.ready = false;
  }

  // [types.ADD_TO_CART] (state, { id }) {
  //   state.all.find(p => p.id === id).inventory--
  // }
}

export default {
  state,
  getters,
  actions,
  mutations
}