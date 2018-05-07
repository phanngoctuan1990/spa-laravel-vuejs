<template>
	<div>
		<h2>Các chủ đề trong danh mục {{categoryName}}</h2>
		<topic v-for="topic in topics" :topic="topic" :key="topic.id"></topic>
		<pagination v-bind:pagination="pagination" v-on:click.native="getTopics(pagination.current_page)" :offset="5"></pagination>
	</div>
</template>

<script>
import Topic from "./Topic.vue"
import Pagination from "./Pagination"

export default ({
	components: {Topic, Pagination},
	data () {
		return {
			topics: [],
			categoryId: this.$route.params.categoryId,
			categoryName: this.$route.params.categoryName,
			counter: 0,
			pagination: {
				total: 0,
				per_page: 2,
				from: 1,
				to: 0,
				current_page: 1,
				last_page: 1
			},
			offset: 5
		}
	},
	mounted () {
		this.getTopics(this.pagination.current_page);
	},
	watch: {
		topics: function () {
			let breadcrumb = this.topics[0].breadcrumb
			breadcrumb.pop()
			this.$emit('update-breadcrumb', breadcrumb)
		}
	},
	methods: {
		getTopics(page) {
			axios.get('/api/categories/' + this.categoryId + '/topics?page=' + page).then((response) => {
				this.topics = response.data.data;
				this.pagination.total = response.data.total;
				this.pagination.total = response.data.total;
				this.pagination.per_page = response.data.per_page;
				this.pagination.from = response.data.from;
				this.pagination.to = response.data.to;
				this.pagination.current_page = response.data.current_page;
				this.pagination.last_page = response.data.last_page;
			})
		}
	}
})
</script>