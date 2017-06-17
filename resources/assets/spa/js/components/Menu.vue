<template>
    <ul :id="o.id" class="dropdown-content" v-for="o in menusDropdown">
        <li v-for="item in o.items">
            <a v-link="{name: item.routeName}">{{ item.name }}</a>
        </li>
    </ul>
    <ul id="dropdown-logout" class="dropdown-content" >
        <li>
            <a v-link="{name: 'auth.logout'}">Sair</a>
        </li>
    </ul>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper ">
                <div class="col s12">
                    <a href="#" class="left brand-logo">PR Contas</a>
                    <a href="#" data-activates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li v-for="o in menus">
                            <a v-if="o.bropdownId" class="dropdown-button" href="!#" :data-activates="o.bropdownId">
                                {{ o.name }} <i class="material-icons right">arrow_drop_down</i>
                            </a>
                            <a v-else v-link="{name: o.url}">{{ o.name }}</a>
                        </li>
                        <li>
                            <a href="!#" class="dropdown-button" data-activates="dropdown-logout">
                                {{ name }} <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li v-for="o in menus">
                            <a v-link="{ name: o.url}">{{ o.name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <router-view></router-view>
</template>

<script type='text/javascript'>
    import Auth from '../services/auth';
    export default {
        data() {
            return {
                menus: [
                    {name: 'Contas a pagar', bropdownId: 'teste'},
                    {name: 'Contas a receber', bropdownId: 'auth.login'}
                ],
                menusDropdown: [
                    {
                        id: 'teste',
                        items: [
                            {id: 0, name: 'Listar contas', routeName: 'auth.login'},
                            {id: 1, name: 'Criar contas', routeName: 'auth.login'}
                        ]
                    }
                ],
                user: Auth.user
            };
        },
        computed: {
           name(){
               return this.user.data ? this.user.data.name : '';
           }
        },
        ready() {
            $('.button-collapse').sideNav();
            $('.dropdown-button').dropdown();
        },
    };
</script>