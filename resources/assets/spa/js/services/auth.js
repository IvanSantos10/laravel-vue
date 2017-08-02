import JwtToken from './jwt-token';
import LocalStorege from './localStorege';
import {User} from '../services/resources';

const USER = 'user';

const afterLogin = function(response){
    this.user.check = true;
    User.get()
        .then((response) => {
        this.user.data = response.data;
        });
};

export default {
    user: {
        set data(value){
            if(!value){
                LocalStorege.remove(USER);
                this._data = null;
                return;
            }
            this._data = value;
            LocalStorege.setObject(User, value);
        },
        get data(){
            if (!this._data){
                this._data = LocalStorege.getObject(User);
            }
            return this._data;
        },
        check: JwtToken.token ? true : false
    },
    login(email, password){
        return JwtToken.accessToken(email, password).then((response) => {
            let afterLoginContext = afterLogin.bind(this);
            afterLoginContext(response);
            return response;
        });
    },
    logout(){
        let afterLogout = (response) => {
            this.clearAuth();
            return response
        };

        return JwtToken.revokeToken()
            .then(afterLogout)
            .catch(afterLogout);
    },
    clearAuth(){
        this.user.data = null;
        this.user.check = false;
    }


}