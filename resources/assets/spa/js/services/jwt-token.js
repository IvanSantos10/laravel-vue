export default {
    set(key, value){
        window.localStorage[key] = value;
        return window.localStorage[key];
    },
    get(key, defaultValue = null){
        return window.localStorage[key] || defaultValue;
    },
    setObject(key, valeu){
        window.localStorage[key] = JSON.stringify(valeu);
        return this.getObject(key);
    },
    getObject(key){
        return JSON.parse(window.localStorage[key] || null);
    },
    remove(key){
        window.localStorage.removeItem(key);
    }
}