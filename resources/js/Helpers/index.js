import Cookies from 'js-cookie';
import store from "@/Store/index";

export const handleInitialUserState = async ()=>{
    const storedUser = Cookies.get('user');
    if(storedUser){
        await store.dispatch('user/setUser', storedUser);
    }
}
