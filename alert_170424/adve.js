let text = document.getElementById('text');
let increase = document.getElementById('increase');
let decrease = document.getElementById('decrease');
let changeText = document.getElementById('change');
let newText = document.getElementById('newText');

increase.addEventListener('click', function() {
    let currentSize = parseInt(window.getComputedStyle(text, null).getPropertyValue('font-size'));
    text.style.fontSize = (currentSize + 2) + 'px';
});

decrease.addEventListener('click', function() {
    let currentSize = parseInt(window.getComputedStyle(text, null).getPropertyValue('font-size'));
    text.style.fontSize = (currentSize - 2) + 'px';
});
changeText.addEventListener('click', function() {

    text.innerHTML = newText.value;

});



