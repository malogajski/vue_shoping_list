import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'item-setting',
        name: 'item_setting',
        component: View,
        redirect: { name: 'items.index' },
        children: [
          {
            path: 'items',
            name: 'items.index',
            component: () => import('@cruds/Items/Index.vue'),
            meta: { title: 'cruds.item.title' }
          },
          {
            path: 'items/create',
            name: 'items.create',
            component: () => import('@cruds/Items/Create.vue'),
            meta: { title: 'cruds.item.title' }
          },
          {
            path: 'items/:id',
            name: 'items.show',
            component: () => import('@cruds/Items/Show.vue'),
            meta: { title: 'cruds.item.title' }
          },
          {
            path: 'items/:id/edit',
            name: 'items.edit',
            component: () => import('@cruds/Items/Edit.vue'),
            meta: { title: 'cruds.item.title' }
          },
          {
            path: 'stores',
            name: 'stores.index',
            component: () => import('@cruds/Stores/Index.vue'),
            meta: { title: 'cruds.store.title' }
          },
          {
            path: 'stores/create',
            name: 'stores.create',
            component: () => import('@cruds/Stores/Create.vue'),
            meta: { title: 'cruds.store.title' }
          },
          {
            path: 'stores/:id',
            name: 'stores.show',
            component: () => import('@cruds/Stores/Show.vue'),
            meta: { title: 'cruds.store.title' }
          },
          {
            path: 'stores/:id/edit',
            name: 'stores.edit',
            component: () => import('@cruds/Stores/Edit.vue'),
            meta: { title: 'cruds.store.title' }
          }
        ]
      },
      {
        path: 'ordering',
        name: 'ordering',
        component: View,
        redirect: { name: 'orders.index' },
        children: [
          {
            path: 'orders',
            name: 'orders.index',
            component: () => import('@cruds/Orders/Index.vue'),
            meta: { title: 'cruds.order.title' }
          },
          {
            path: 'orders/create',
            name: 'orders.create',
            component: () => import('@cruds/Orders/Create.vue'),
            meta: { title: 'cruds.order.title' }
          },
          {
            path: 'orders/:id',
            name: 'orders.show',
            component: () => import('@cruds/Orders/Show.vue'),
            meta: { title: 'cruds.order.title' }
          },
          {
            path: 'orders/:id/edit',
            name: 'orders.edit',
            component: () => import('@cruds/Orders/Edit.vue'),
            meta: { title: 'cruds.order.title' }
          },
          {
            path: 'order-items',
            name: 'order_items.index',
            component: () => import('@cruds/OrderItems/Index.vue'),
            meta: { title: 'cruds.orderItem.title' }
          },
          {
            path: 'order-items/create',
            name: 'order_items.create',
            component: () => import('@cruds/OrderItems/Create.vue'),
            meta: { title: 'cruds.orderItem.title' }
          },
          {
            path: 'order-items/:id',
            name: 'order_items.show',
            component: () => import('@cruds/OrderItems/Show.vue'),
            meta: { title: 'cruds.orderItem.title' }
          },
          {
            path: 'order-items/:id/edit',
            name: 'order_items.edit',
            component: () => import('@cruds/OrderItems/Edit.vue'),
            meta: { title: 'cruds.orderItem.title' }
          }
        ]
      },
      {
        path: 'report',
        name: 'report',
        component: View,
        redirect: { name: 'main_reports.index' },
        children: [
          {
            path: 'main-reports',
            name: 'main_reports.index',
            component: () => import('@cruds/MainReports/Index.vue'),
            meta: { title: 'cruds.mainReport.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
