// import shop from '../../api/shop'
import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  shows: []
}

// getters
// const getters = {
//   allProducts: state => state.all
// }

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
  }
}

// mutations
const mutations = {
  ['ADD_SHOWS'] (state, { products }) {
    state.shows = shows;
    state.ready = true;
  }

  // [types.ADD_TO_CART] (state, { id }) {
  //   state.all.find(p => p.id === id).inventory--
  // }
}

export default {
  state,
  // getters,
  actions,
  mutations
}