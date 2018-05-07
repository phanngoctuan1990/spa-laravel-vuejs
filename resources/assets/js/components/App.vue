<template>
	<div class="container">
		<top-nav></top-nav>
		<breadcrumb :breadcrumb="breadcrumb"></breadcrumb>
		<router-view @update-breadcrumb="updateBreadcrumb"></router-view>
	</div>
</template>

<script>
import {mapState} from 'vuex'
import Breadcrumb from './views/Breadcrumb'
import TopNav from './views/TopNav'
export default {
	components: {Breadcrumb, TopNav},
	data () {
		return {
			breadcrumb: []
		}
	},
	methods: {
		updateBreadcrumb (breadcrumb) {
			this.breadcrumb = breadcrumb
		}
	},
	computed: mapState ([
		'user'
	])
}
</script>