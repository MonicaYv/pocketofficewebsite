$(document).ready(function () {
    const $slider = $('#testimonial-slider');
    const $prevBtn = $('#btn_prev');
    const $nextBtn = $('#btn_next');

    const itemsToShow = 2;
    const totalItems = $slider.children().length;
    const totalSlides = Math.ceil(totalItems / itemsToShow);
    let currentSlide = 0;

    function updateSlider() {
        const translateX = -(100 / itemsToShow) * currentSlide;
        $slider.css('transform', `translateX(${translateX}%)`);
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    $nextBtn.on('click', function (e) {
        e.preventDefault();
        nextSlide();
    });

    $prevBtn.on('click', function (e) {
        e.preventDefault();
        prevSlide();
    });

    // Auto-play every 4 seconds
    setInterval(nextSlide, 4000);

    // Initialize
    updateSlider();
});
