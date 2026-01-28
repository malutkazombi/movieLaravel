document.addEventListener('DOMContentLoaded', function () {
  const ratingSlider = document.getElementById('rating');
  const ratingValue = document.getElementById('rating-value');

  ratingSlider.addEventListener('input', function () {
    ratingValue.textContent = this.value;
  });

  ratingValue.textContent = ratingSlider.value;
});
