import {Jwt} from './resources';
import LocalStorege from './localStorege';

const TOKEN = 'token';
export default {
    login(email, password){
        return Jwt.accessToken(email, password).then((response) => {
            LocalStorege.set(TOKEN, response.data.token);
            return response
        });
    },
    getAuthorizationHeader(){
        return `Bearer ${LocalStorege.get(TOKEN)}`;
    }
}