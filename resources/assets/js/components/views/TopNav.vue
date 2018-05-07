<template>
	<nav class="navbar navbar-default" v-if="(user.authUser !== null && user.authUser.access_token) || this.$route.fullPath !== '/login' ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<router-link to="/" class="navbar-brand">SPA FORUM <small>Laravel + Vue.js</small></router-link>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right" v-if="user.authUser === null">
					<li><router-link :to="{ name: 'Login' }">Đăng nhập</router-link></li>
					<li><router-link :to="{ name: 'Register' }">Đăng ký</router-link></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" v-else>
					<p class="navbar-text">Xin chào {{ user.authUser.name }}</p>
					<li><a v-on:click="handleLogout()">Đăng xuất</a></li>
				</ul>
			</div>
		</div>
	</nav>
</template>
<script>
import {mapState} from 'vuex'
export default {
	methods: {
		handleLogout () {
			window.localStorage.removeItem('authUser')
			this.$store.dispatch('setUserObject', null)
			this.$router.push({name: 'Login'})
		}
	},
	computed: mapState ([
		'user'
	])
}
</script>