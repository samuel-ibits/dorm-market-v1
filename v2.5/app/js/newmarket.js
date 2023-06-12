const menuIcon = document.getElementById('menu-icon');
const dropdown = document.getElementById('dropdown');
const productCards = document.querySelectorAll('.product-card');
const productModal = document.getElementById('product-modal');

menuIcon.addEventListener('click', function() {
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});


productCards.forEach(function(card) {
    card.addEventListener('click', function() {
        productModal.style.display = 'flex';
    });
});


function hideModal() {
    productModal.style.display = 'none';
}

const slidesContainer = document.querySelector('.slides-container');
const slides = Array.from(document.querySelectorAll('.slide'));
const pagination = document.querySelector('.pagination');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
let currentIndex = 0;
let intervalId;

// Create pagination dots
slides.forEach(function(_, index) {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    if (index === currentIndex) {
        dot.classList.add('active-dot');
    }
    pagination.appendChild(dot);
});

const dots = Array.from(document.querySelectorAll('.dot'));

function goToSlide(index) {
    slidesContainer.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(function(dot, dotIndex) {
        dot.classList.toggle('active-dot', dotIndex === index);
    });
}

function startSlider() {
    intervalId = setInterval(function() {
        currentIndex = (currentIndex + 1) % slides.length;
        goToSlide(currentIndex);
    }, 3000);
}

function stopSlider() {
    clearInterval(intervalId);
}

function handlePrev() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    goToSlide(currentIndex);
}

function handleNext() {
    currentIndex = (currentIndex + 1) % slides.length;
    goToSlide(currentIndex);
}

slidesContainer.addEventListener('mouseenter', stopSlider);
slidesContainer.addEventListener('mouseleave', startSlider);
prevBtn.addEventListener('click', handlePrev);
nextBtn.addEventListener('click', handleNext);

let touchStartX = 0;

slidesContainer.addEventListener('touchstart', function(e) {
    touchStartX = e.touches[0].clientX;
});

slidesContainer.addEventListener('touchend', function(e) {
    const touchEndX = e.changedTouches[0].clientX;
    const deltaX = touchEndX - touchStartX;
    if (deltaX > 0) {
        handlePrev();
    } else if (deltaX < 0) {
        handleNext();
    }
});

startSlider();