const check = document.getElementById('check');
const label = document.getElementById('label');

check.addEventListener('change', () => {
	document.body.classList.toggle('dark');
});
