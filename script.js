const reservationBtns = document.querySelectorAll('.reservation-btn');
const popupContainer = document.getElementById('popup-container');
const closeBtn = document.getElementById('close-btn');

reservationBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    popupContainer.style.visibility = 'visible';
    popupContainer.style.opacity = '1';
  });
});

closeBtn.addEventListener('click', () => {
  popupContainer.style.visibility = 'hidden';
  popupContainer.style.opacity = '0';
});
