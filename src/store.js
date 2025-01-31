/*import { createStore } from 'vuex'

export const store = createStore({
  state () {
    return {
      gemeinden: []
    }
  },
  mutations: {
    updateGemeinden (state, gemeinden) {
      state.gemeinden = gemeinden;
    }
  }
})*/


export const state = {
  gemeinden: []
};

export function updateGemeinden(gemeinden) {
  state.gemeinden = gemeinden;
}

