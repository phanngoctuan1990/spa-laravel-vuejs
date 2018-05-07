
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import store from './store';
import NProgress from 'nprogress';
import App from './components/App';
import Router from './routes/index';
import timeFilter from './filters/timeFilter';
import largeNumber from './filters/largeNumber';

Vue.filter('fromNow' ,timeFilter);
Vue.filter('largeNumber' ,largeNumber);

axios.interceptors.request.use(function (config) {
	NProgress.start();
	return config;
}, function (error) {
	return Promise.reject(error);
})

axios.interceptors.response.use(function (config) {
	NProgress.done();
	return config;
}, function (error) {
	return promise.reject(error);
})

var vm = new Vue({
	el: '#app',
	store,
	router: Router,
	render: h => h(App)
});