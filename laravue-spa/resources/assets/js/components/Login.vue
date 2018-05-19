<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="alert alert-danger" role="alert" v-if="showAlert">
                {{ alertMessage }}
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control"
                         v-model="email" @keyup.enter="login" required autofocus>
                </div>
              </div>

              <label for="password" class="col-md-4 control-label">Password</label>
              <div class="form-group">
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control"
                         v-model="password" @keyup.enter="login" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button @click="login" type="submit" class="btn btn-primary">
                    Login
                  </button>
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
  import userStore from '../stores/userStore'
  import http from '../services/http'

  export default {
    mounted() {
      this.fetchUsers()
    },
    data() {
      return {
        email: '',
        password: '',
        showAlert: false,
        alertMessage: '',
      }
    },
    methods: {
      login() {
        userStore.login(this.email, this.password, res => {
          this.$router.push('/')
        }, error => {
          this.showAlert = true
          this.alertMessage = 'Wrong email or password.'
        })
      },
    }
  }
</script>
