export default {
    state: () =>{
        user: {}
    },
    mutations:{
        setUser:(state, user)=>{
            state.user = user
        }
    },
    actions:{
        setUser:({commit, state}, user)=>{
            commit('setUser', user)
        }
    }
}
