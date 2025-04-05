<div class="container mt-5">
    <h2 class="text-center">Bộ Sưu Tập Mới</h2>
    <div class="collection-slider">
        <div class="slide-item">
            <img src="https://cdn.pnj.io/images/promo/238/BANNER_BST_Audax_1200x1200.png" class="slide-image" alt="Collection 1">
        </div>
        <div class="slide-item">
            <img src="https://cdn.pnj.io/images/promo/238/BST_Longines__KV_WATCH_1200.png" class="slide-image" alt="Collection 2">
        </div>
        <div class="slide-item">
            <img src="https://cdn.pnj.io/images/promo/238/BST_Sakura__1200x1200.jpg" class="slide-image" alt="Collection 3">
        </div>
        <div class="slide-item">
            <img src="https://cdn.pnj.io/images/promo/238/BST_My_pricess_moment_KV_1200x1200.jpg" class="slide-image" alt="Collection 4">
        </div>
        <div class="slide-item">
            <img src="https://cdn.pnj.io/images/promo/238/BST_BISOUS_BANNER_1200x1200.png" class="slide-image" alt="Collection 5">
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const slider = document.querySelector('.collection-slider');
const slides = document.querySelectorAll('.slide-item');

let currentIndex = 0;

function updateSlider() {
    let centerIndex = 2; // Ảnh ở giữa
    let displayIndices = [];

    for (let i = 0; i < slides.length; i++) {
        let displayIndex = (currentIndex - centerIndex + i + slides.length) % slides.length;
        displayIndices.push(displayIndex);
    }

    slides.forEach((slide, i) => {
        let displayIndex = displayIndices[i];
        if (displayIndex === centerIndex) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
        slide.style.order = displayIndex - currentIndex + centerIndex; // Sắp xếp ảnh
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlider();
}

function startAutoSlide() {
    setInterval(nextSlide, 3000);
}

updateSlider();
startAutoSlide();
    
</script>

<style>
  .collection-slider {
    display: flex;
    justify-content: center;
    align-items: center;
}

.slide-item {
    flex: 0 0 15%; /* Chiều rộng của mỗi ảnh */
    transition: transform 0.3s ease;
}

.slide-image {
    width: 100%;
    height: auto;
    object-fit: contain;
}

.slide-item.active {
    flex: 0 0 30%; /* Chiều rộng của ảnh đang active */
}
</style>