<template>
	<div class="panel panel-success">
		<div class="panel-heading">
			<router-link :to="{name: 'Topic', params: {topicId: topic.id}}" v-text="topic.title"></router-link>
		</div>
		<div class="panel-body">
			<strong>by {{topic.created_by}}</strong>
			<span>{{topic.time | fromNow}}</span>
		</div>
		<div class="panel-footer">
			<span>{{ topic.views | largeNumber}}</span>
			<small>Lượt xem</small>
		</div>
	</div>
</template>

<script>
export default ({
	props: ['topic']
})
</script>