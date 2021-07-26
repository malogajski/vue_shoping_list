<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.orderItem.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.order_id !== null,
                      'is-focused': activeField == 'order'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.orderItem.fields.order')
                    }}</label>
                    <v-select
                      name="order"
                      label="number"
                      :key="'order-field'"
                      :value="entry.order_id"
                      :options="lists.order"
                      :reduce="entry => entry.id"
                      @input="updateOrder"
                      @search.focus="focusField('order')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.store_id !== null,
                      'is-focused': activeField == 'store'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.orderItem.fields.store')
                    }}</label>
                    <v-select
                      name="store"
                      label="title"
                      :key="'store-field'"
                      :value="entry.store_id"
                      :options="lists.store"
                      :reduce="entry => entry.id"
                      @input="updateStore"
                      @search.focus="focusField('store')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.item_id !== null,
                      'is-focused': activeField == 'item'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.orderItem.fields.item')
                    }}</label>
                    <v-select
                      name="item"
                      label="title"
                      :key="'item-field'"
                      :value="entry.item_id"
                      :options="lists.item"
                      :reduce="entry => entry.id"
                      @input="updateItem"
                      @search.focus="focusField('item')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.quantity,
                      'is-focused': activeField == 'quantity'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.orderItem.fields.quantity')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.quantity"
                      @input="updateQuantity"
                      @focus="focusField('quantity')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.orderItem.fields.real_price') }}</label>
                    <div
                      class="form-group bmd-form-group"
                      :class="{
                        'has-items': entry.real_price,
                        'is-focused': activeField == 'real_price'
                      }"
                    >
                      <label class="bmd-label-floating">{{
                        $t('cruds.orderItem.fields.real_price_helper')
                      }}</label>
                      <input
                        class="form-control"
                        type="number"
                        step="0.01"
                        :value="entry.real_price"
                        @input="updateRealPrice"
                        @focus="focusField('real_price')"
                        @blur="clearFocus"
                      />
                    </div>
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label"
                      ><input
                        class="form-check-input"
                        type="checkbox"
                        :value="entry.purchased"
                        :checked="entry.purchased"
                        @change="updatePurchased"
                      /><span class="form-check-sign"
                        ><span class="check"></span></span
                      >{{ $t('cruds.orderItem.fields.purchased') }}</label
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('OrderItemsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('OrderItemsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setOrder',
      'setStore',
      'setItem',
      'setQuantity',
      'setRealPrice',
      'setPurchased'
    ]),
    updateOrder(value) {
      this.setOrder(value)
    },
    updateStore(value) {
      this.setStore(value)
    },
    updateItem(value) {
      this.setItem(value)
    },
    updateQuantity(e) {
      this.setQuantity(e.target.value)
    },
    updateRealPrice(e) {
      this.setRealPrice(e.target.value)
    },
    updatePurchased(e) {
      this.setPurchased(e.target.checked)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'order_items.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
