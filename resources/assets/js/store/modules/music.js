import * as vars from '../vars'

// initial state
const state = {
  ready: false,
  music: [],
  featuredSong: [],
  meta: [],
  links: []
}

// getters
const getters = {
  allMusic: state => state.music,
  musicPager: state => state.meta,
  musicLinks: state => state.links,
  featuredSong: state => state.featuredSong,
  musicReady: state => state.ready
}

// actions
const actions = {
  getAllMusic ({ commit }) {
    axios.get(vars.API_LINK + 'music')
      .then(music => {
        commit('ADD_MUSIC', { music })
      });
  },

  changeMusicPage ({ commit}, link) {
    commit('DISABLE_MUSIC');
    var param = link.split('?')[1];
    axios.get(vars.API_LINK + 'music?' + param)
      .then(music => {
        commit('ADD_MUSIC', { music })
      });
  }
}

// mutations
const mutations = {
  ['ADD_MUSIC'] (state, { music }) {
    state.music = music.data.data;
    // Add featured song.
    // Page can be changed in Music page but featured song needs to perist.
    state.featuredSong = !state.featuredSong.length ? music.data.data[0] : state.featuredSong;
    state.meta = music.data.meta;
    state.links = music.data.links;
    state.ready = true;
  },

  ['DISABLE_MUSIC'] (state) {
    state.music = [];
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