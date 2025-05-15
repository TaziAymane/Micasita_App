// Handle category selection
document.querySelectorAll('.category').forEach(category => {
    category.addEventListener('click', () => {
        document.querySelectorAll('.category').forEach(c => c.classList.remove('active'));
        category.classList.add('active');
    });
});

// Handle bottom navigation
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        item.classList.add('active');
    });
});

// Handle sidebar navigation
document.querySelectorAll('.sidebar-nav-item').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelectorAll('.sidebar-nav-item').forEach(i => i.classList.remove('active'));
        item.classList.add('active');
    });
});

// Initialize Swiper
const swiper = new Swiper('.categories-swiper', {
    slidesPerView: 'auto',
    spaceBetween: 15,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

// Handle category selection
document.querySelectorAll('.category').forEach(category => {
    category.addEventListener('click', () => {
        document.querySelectorAll('.category').forEach(c => c.classList.remove('active'));
        category.classList.add('active');
    });
});


