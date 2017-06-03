import {Jwt} from './resources';
import LocalStorege from './localStorege';

export default {
    login(email, password){
        return Jwt.accessToken(email, password).then((response) => {
            LocalStorege.set('token', response.data.token);
            return response
        });
    }
}