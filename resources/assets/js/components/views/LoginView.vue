<template>
	<div class="row">
		<div class="col-md-6 col-md-push-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Đăng nhập</strong>
				</div>
				<div class="panel-body">
					<form v-on:submit.prevent="handleLoginFormSubmit()">
						<div class="form-group">
							<label>Địa chỉ Email</label>
							<input type="text" class="form-control" placeholder="Enter your email address" v-model="login.email">
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" class="form-control" placeholder="Enter your email address" v-model="login.password">
						</div>
						<button class="btn btn-primary">Đăng nhập</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import {loginUrl, getHeader, userUrl} from '../../config'
import {clientId, clientSecret} from '../../env'
export default {
	data () {
		return {
			login: {
				email: 'tyree16@example.org',
				password: 'secret'
			}
		}
	},
	methods: {
		handleLoginFormSubmit () {
			const postData = {
				grant_type: 'password',
				client_id: clientId,
				client_secret: clientSecret,
				username: this.login.email,
				password: this.login.password,
				scope: '*'
			}
			const authUser = {}
			axios.post(loginUrl, postData)
			.then(response => {
				if (response.status === 200) {
					authUser.access_token = response.data.access_token
					authUser.refresh_token = response.data.refresh_token
					window.localStorage.setItem('authUser', JSON.stringify(authUser))
					axios({method: 'get', url: userUrl, headers: getHeader()})
					.then(response => {
						authUser.email = response.data.email
						authUser.name = response.data.name
						window.localStorage.setItem('authUser', JSON.stringify(authUser))
						const userObj = JSON.parse(window.localStorage.getItem('authUser'))
						this.$store.dispatch('setUserObject', userObj)
						this.$router.push({name: 'Home'})
					})
				}
			})
			.catch(error => {
				console.log(error)
			})
		}
	}
} 
</script>