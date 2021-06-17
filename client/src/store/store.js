import Vue from 'vue';
import Vuex from 'vuex';
import VueCookies from 'vue-cookies';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		userInfo: {
			id: '',
			email: '',
			name: '',
			surname: '',
			mobile: ''
		},
		userAddresses: null,
		userCart: null
	},

	mutations: {
		SET_USER(state, user) {
			state.userInfo = user;
		},

		SET_USER_ADDRESSES (state, userAddresses) {
			state.userAddresses = userAddresses;
		},

		SET_USER_CART (state, userCart) {
			state.userCart = userCart;
		}
	},

	actions: {
		async fetchUserInfo({ commit }) {
			const token = VueCookies.get('token');

			if (token !== null) {
				try {	
					const res = await fetch('http://localhost:3000/auth/user', {
						method: 'GET',
						headers: {
							"Authorization" : token,
						}
					});

					if (res.ok) {
						const resolve = await res.json();

						if (!resolve.error) {
							commit('SET_USER', resolve);
						}
						else {
							this.$notify({
								group: 'errors',
								type: 'error',
								title: 'Error',
								text: resolve.error
							});
						}
					}
				} 
				catch (error) {	
					this.$notify({
						group: 'errors',
						type: 'error',
						title: 'Error',
						text: error
					});
				}
			}
		},

		async fetchUserAddresses ({ commit }) {
			const token = VueCookies.get('token');

			if (token !== null) {
				try {	
					const res = await fetch('http://localhost:3000/home/addresses', {
						method: 'GET',
						headers: {
							"Authorization" : token,
						}
					});

					if (res.ok) {
						const resolve = await res.json();

						if (!resolve.error) {
							commit('SET_USER_ADDRESSES', resolve.addresses);
						}
						else {
							this.$notify({
								group: 'errors',
								type: 'error',
								title: 'Error',
								text: resolve.error
							});
						}
					}
				} 
				catch (error) {	
					this.$notify({
						group: 'errors',
						type: 'error',
						title: 'Error',
						text: error
					});
				}
			}
		},

		async fetchUserCart ({ commit }) {
			const token = VueCookies.get('token');

			if (token !== null) {
				try {	
					const res = await fetch('http://localhost:3000/home/addresses', {
						method: 'GET',
						headers: {
							"Authorization" : token,
						}
					});

					if (res.ok) {
						const resolve = await res.json();

						if (!resolve.error) {
							commit('SET_USER_ADDRESSES', resolve.addresses);
						}
						else {
							this.$notify({
								group: 'errors',
								type: 'error',
								title: 'Error',
								text: resolve.error
							});
						}
					}
				} 
				catch (error) {	
					this.$notify({
						group: 'errors',
						type: 'error',
						title: 'Error',
						text: error
					});
				}
			}
		},
	}
});