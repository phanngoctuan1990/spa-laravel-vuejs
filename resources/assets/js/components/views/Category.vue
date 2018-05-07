<template>
	<div class="panel panel-success">
		<div class="panel-heading">
			<router-link :to="{name: 'Category', params: {categoryId: category.id, categoryName: category.name}}" v-text="category.name"></router-link>
		</div>
		<div class="panel-body">
			{{category.description}}
		</div>
		<div class="panel-footer">
			<span>{{category.numberOfTopics}}</span>
			<small>Chủ đề</small>
		</div>
	</div>
</template>

<script>
export default ({
	props: ['category']
})
</script>