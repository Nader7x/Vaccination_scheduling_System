const btn = document.getElementById('btn');

btn.addEventListener('click', () => {

    btn.style.visibility = 'hidden';

    const box = document.getElementById('box');
    box.style.visibility = 'visible';
});
<script src="index.js"></script>