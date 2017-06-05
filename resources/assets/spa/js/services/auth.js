import {Jwt} from './resources';
import LocalStorege from './localStorege';
import {User} from '../services/resources';

const TOKEN = 'token';
const USER = 'user';

const afterLogin = (response) => {
    User.get().then((response) => LocalStorege.setObject(USER, response.data));
};

export default {
    login(email, password){
        return Jwt.accessToken(email, password).then((response) => {
            afterLogin(response);
            LocalStorege.set(TOKEN, response.data.token);
            return response
        });
    },
    getAuthorizationHeader(){
        return `Bearer ${LocalStorege.get(TOKEN)}`;
    },
    user(){
        return LocalStorege.getObject(USER);
    }
}