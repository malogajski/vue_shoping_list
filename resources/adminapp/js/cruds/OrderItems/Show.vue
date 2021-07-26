<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.orderItem.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.order') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="order.number">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.store') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="store.title">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.item') }}
                        </td>
                        <td>
                          <datatable-single :row="entry" field="item.title">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.quantity') }}
                        </td>
                        <td>
                          {{ entry.quantity }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.real_price') }}
                        </td>
                        <td>
                          {{ entry.real_price }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.orderItem.fields.purchased') }}
                        </td>
                        <td>
                          <datatable-checkbox :value="entry.purchased">
                          </datatable-checkbox>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableCheckbox from '@components/Datatables/DatatableCheckbox'

export default {
  components: {
    DatatableSingle,
    DatatableCheckbox
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('OrderItemsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('OrderItemsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
