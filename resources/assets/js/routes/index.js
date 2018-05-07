import Vue from 'vue'
import Router from 'vue-router'

// Views
import HomeView from '../components/views/HomeView'
import CategoryView from '../components/views/CategoryView'
import TopicView from '../components/views/TopicView'
import NotFound from '../components/views/NotFound'
import LoginView from '../components/views/LoginView'
import ProfileView from '../components/views/ProfileView'

Vue.use(Router)

const router = new Router({
	routes: [
		{
			path: '/',
			name: 'Home',
			component: HomeView
		},
		{
			path: '/category',
			name: 'Category',
			component: CategoryView
		},
		{
			path: '/topic',
			name: 'Topic',
			component: TopicView
		},
		{
			path: '/login',
			name: 'Login',
			component: LoginView
		},
		{
			path: '/profile',
			name: 'Profile',
			component: ProfileView,
			meta: {
				requiresAuth: true
			}
		},
		{
			path: '*',
			component: NotFound
		}
	],
	mode: 'history',
	redirect: {
		'*': '/'
	}
})

router.beforeEach((to, from, next) => {
	if (to.meta.requiresAuth) {
		const authUser = JSON.parse(window.localStorage.getItem('authUser'))
		if (!(authUser && authUser.access_token )) {
			next({ name: 'Login' })
		}
	}
	next()
})

export default router
