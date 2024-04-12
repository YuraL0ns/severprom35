document.addEventListener('DOMContentLoaded', function() {
    let slides = document.querySelectorAll('.slide');
    let thumbnails = document.querySelectorAll('.thumb');
    let modal = document.getElementById('modal');
    let modalImg = document.getElementById('modal-image');
    let currentIndex = 0;
    let autoSlideInterval;

    function updateSlides() {
        slides.forEach(slide => slide.style.display = 'none');
        slides[currentIndex].style.display = 'block';
        if (modal.style.display === 'block') {
            modalImg.src = slides[currentIndex].src; // обновляем картинку в модальном окне
        }
    }

    function changeSlide(direction) {
        currentIndex += direction;
        if (currentIndex >= slides.length) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = slides.length - 1;
        }
        updateSlides();
    }

    function autoSlide() {
        currentIndex++;
        if (currentIndex >= slides.length) {
            currentIndex = 0;
        }
        updateSlides();
    }

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', function() {
            currentIndex = index;
            updateSlides();
            stopAutoSlide();
        });
    });

    slides.forEach(slide => {
        slide.addEventListener('click', function() {
            modal.style.display = 'block';
            modalImg.src = this.src;
        });
    });

    document.querySelector('.close').addEventListener('click', function() {
        modal.style.display = "none";
    });

    document.querySelector('.prev').addEventListener('click', function() {
        changeSlide(-1);
    });

    document.querySelector('.next').addEventListener('click', function() {
        changeSlide(1);
    });

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    autoSlideInterval = setInterval(autoSlide, 6000); // Смена слайда каждые 6 секунд

    // Инициализация слайдера
    updateSlides();
});
