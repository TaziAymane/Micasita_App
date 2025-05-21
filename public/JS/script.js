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


// product
    // Initialize Swiper
    const swipeP = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 15,
        freeMode: true,
    });

    // Handle Swiper slide clicks
    document.querySelectorAll('.swiper-slide').forEach(slide => {
        slide.addEventListener('click', () => {
            // Remove active class from all slides
            document.querySelectorAll('.swiper-slide').forEach(s => {
                s.classList.remove('active');
            });
            // Add active class to clicked slide
            slide.classList.add('active');
            
            // Optional: You might want to do something with the selected category
            const selectedCategory = slide.textContent.trim();
            console.log("Selected category:", selectedCategory);
            // Here you could filter products or do other actions
        });
    });

    // Handle navigation item clicks (keep your existing code)
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    // Handle sidebar navigation item clicks (keep your existing code)
    document.querySelectorAll('.sidebar-nav-item').forEach(item => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.sidebar-nav-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

