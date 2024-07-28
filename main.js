// main.js
document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    let startX;

    function showSlide(index) {
        const slides = document.querySelectorAll('.carousel-item');
        if (index >= slides.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = slides.length - 1;
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * 100;
        document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    // Lazy load images
    const lazyImages = document.querySelectorAll('.carousel-item img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                observer.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => {
        imageObserver.observe(img);
    });

    // Auto slide every 5 seconds
    setInterval(() => {
        nextSlide();
    }, 5000);

    // Initialize the carousel
    showSlide(currentIndex);

    // Add touch/swipe functionality
    const carousel = document.querySelector('.carousel-inner');
    
    carousel.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });

    carousel.addEventListener('touchmove', function(e) {
        if (!startX) return;
        let moveX = e.touches[0].clientX;
        let diffX = startX - moveX;
        
        if (diffX > 50) {
            nextSlide();
            startX = null;
        } else if (diffX < -50) {
            prevSlide();
            startX = null;
        }
    });

    carousel.addEventListener('touchend', function() {
        startX = null;
    });
});
