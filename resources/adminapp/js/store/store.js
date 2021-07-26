import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ItemsIndex from './cruds/Items'
import ItemsSingle from './cruds/Items/single'
import StoresIndex from './cruds/Stores'
import StoresSingle from './cruds/Stores/single'
import OrdersIndex from './cruds/Orders'
import OrdersSingle from './cruds/Orders/single'
import MainReports from './cruds/MainReports'
import OrderItemsIndex from './cruds/OrderItems'
import OrderItemsSingle from './cruds/OrderItems/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ItemsIndex,
    ItemsSingle,
    StoresIndex,
    StoresSingle,
    OrdersIndex,
    OrdersSingle,
    MainReports,
    OrderItemsIndex,
    OrderItemsSingle
  },
  strict: debug
})
