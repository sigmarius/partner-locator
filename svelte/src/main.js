import App from './App.svelte';

const partnersApp = new App({
	target: document.body,
});

export default partnersApp;

const event = new CustomEvent('partnersAppReady', {detail: partnersApp});

document.dispatchEvent(event);