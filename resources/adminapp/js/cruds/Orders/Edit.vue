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
                <strong>{{ $t('cruds.order.title_singular') }}</strong>
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
                      'has-items': entry.number,
                      'is-focused': activeField == 'number'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.order.fields.number')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.number"
                      @input="updateNumber"
                      @focus="focusField('number')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.order_title,
                      'is-focused': activeField == 'order_title'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.order.fields.order_title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.order_title"
                      @input="updateOrderTitle"
                      @focus="focusField('order_title')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.user_id !== null,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.order.fields.user')
                    }}</label>
                    <v-select
                      name="user"
                      label="name"
                      :key="'user-field'"
                      :value="entry.user_id"
                      :options="lists.user"
                      :reduce="entry => entry.id"
                      @input="updateUser"
                      @search.focus="focusField('user')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.planned_at,
                      'is-focused': activeField == 'planned_at'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.order.fields.planned_at')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.planned_at"
                      @input="updatePlannedAt"
                      @focus="focusField('planned_at')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
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
    ...mapGetters('OrdersSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('OrdersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setNumber',
      'setOrderTitle',
      'setUser',
      'setPlannedAt'
    ]),
    updateNumber(e) {
      this.setNumber(e.target.value)
    },
    updateOrderTitle(e) {
      this.setOrderTitle(e.target.value)
    },
    updateUser(value) {
      this.setUser(value)
    },
    updatePlannedAt(e) {
      this.setPlannedAt(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'orders.index' })
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
