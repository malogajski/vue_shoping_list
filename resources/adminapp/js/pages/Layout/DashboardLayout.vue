<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'cruds.itemSetting.title',
          icon: 'table_view',
          path: { name: 'item_setting' },
          gate: 'item_setting_access',
          children: [
            {
              title: 'cruds.item.title',
              icon: 'table_view',
              path: { name: 'items.index' },
              gate: 'item_access'
            },
            {
              title: 'cruds.store.title',
              icon: 'table_view',
              path: { name: 'stores.index' },
              gate: 'store_access'
            }
          ]
        },
        {
          title: 'cruds.ordering.title',
          icon: 'table_view',
          path: { name: 'ordering' },
          gate: 'ordering_access',
          children: [
            {
              title: 'cruds.order.title',
              icon: 'table_view',
              path: { name: 'orders.index' },
              gate: 'order_access'
            },
            {
              title: 'cruds.orderItem.title',
              icon: 'table_view',
              path: { name: 'order_items.index' },
              gate: 'order_item_access'
            }
          ]
        },
        {
          title: 'cruds.report.title',
          icon: 'table_view',
          path: { name: 'report' },
          gate: 'report_access',
          children: [
            {
              title: 'cruds.mainReport.title',
              icon: 'table_view',
              path: { name: 'main_reports.index' },
              gate: 'main_report_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
