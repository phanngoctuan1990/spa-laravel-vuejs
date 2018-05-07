<template>
	<ol class="breadcrumb">
		<li class="Breadcrumb-item" v-for="item in breadcrumb" v-bind:class="{ 'active': currentPage(item.link) }">
			<router-link :to="{ path: item.link }" v-text="item.title"></router-link>
		</li>
	</ol>
</template>

<script>
export default ({
	props: ['breadcrumb'],
	methods: {
		currentPage (link) {
			return this.$route.path.split('?')[0] == link;
		}
	}
})
</script>