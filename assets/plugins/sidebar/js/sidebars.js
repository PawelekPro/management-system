/* global bootstrap: false */
(() => {
  'use strict'
  const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(tooltipTriggerEl => {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

document.addEventListener('DOMContentLoaded', function () {
  const arrowToggles = document.querySelectorAll('.has-arrow');

  arrowToggles.forEach(link => {
    link.addEventListener('click', function () {
      const icon = this.querySelector('.bi-chevron-right, .bi-chevron-down');

      if (icon) {
        if (icon.classList.contains('bi-chevron-right')) {
          icon.classList.remove('bi-chevron-right');
          icon.classList.add('bi-chevron-down');
        } else {
          icon.classList.remove('bi-chevron-down');
          icon.classList.add('bi-chevron-right');
        }
      }
    });
  });
});