import http from '../services/http'

export default {
  debug: true,
  state: {
    user: {},
    authenticated: false,
  },

  login(email, password, successCb = null, errorCb = null) {
    var login_param = {email: email, password: password}

    http.post('authenticate', login_param, res => {
      this.state.user = res.data.user
      this.state.authenticated = true
      successCb()
    }, error => {
      errorCb()
    })
  },

  setCurrentUser() {
    http.get('me', res => {
      this.state.user = res.data.user
      this.state.authenticated = true
    })
  },

  /**
   * Init the store.
   */
  init() {
    this.setCurrentUser()
  }
}
