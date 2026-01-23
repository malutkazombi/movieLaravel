/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/movies.js ***!
  \********************************/
document.addEventListener('DOMContentLoaded', function () {
  var ratingSlider = document.getElementById('rating');
  var ratingValue = document.getElementById('rating-value');
  ratingSlider.addEventListener('input', function () {
    ratingValue.textContent = this.value;
  });
  ratingValue.textContent = ratingSlider.value;
});
/******/ })()
;