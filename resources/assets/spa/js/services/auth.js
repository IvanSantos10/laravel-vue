import JwtToken from './jwt-token';
import LocalStorege from './localStorege';
import {User} from '../services/resources';

const USER = 'user';

const afterLogin = (response) => {
    User.get().then((response) => LocalStorege.setObject(USER, response.data));
};

export default {
    login(email, password){
        return JwtToken.accessToken(email, password).then((response) => {
            afterLogin(response);
            return response
        });
    },
    logout(){
        let afterLogout = () => {
            this.clearAuth();
        };

        return JwtToken.revokeToken()
            .then(afterLogout())
            .catch(afterLogout());
    },
    user(){
        return LocalStorege.getObject(USER);
    },
    check(){
        return JwtToken.token ? true :false;
    },
    clearAuth(){
        LocalStorege.remove(USER);
    }


}