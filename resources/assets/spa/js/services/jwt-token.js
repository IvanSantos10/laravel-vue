import {Jwt} from './resources';
import LocalStorege from './localStorege';

const TOKEN = 'token';
export default {
    get token(){
        return LocalStorege.get(TOKEN);
    },
    set token(value){
        return value ? LocalStorege.set(TOKEN, value) : LocalStorege.remove(TOKEN);
    },
    accessToken(email, password){
        return Jwt.accessToken(email, password).then((response) => {
            this.token = response.data.token;
            return response;
        });
    },
    refreshToken(){
        return Jwt.refreshToken().then((response) => {
            this.token = response.data.token;
            return response;
        });
    },
    revokeToken(){
        let afterRevokeToken = () => {
            this.token = null;
        };

        return Jwt.logout()
            .then(afterRevokeToken())
            .catch(afterRevokeToken());
    },
    getAuthorizationHeader(){
        return `Bearer ${LocalStorege.get(TOKEN)}`;
    },

}