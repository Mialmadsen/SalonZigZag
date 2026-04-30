document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".gallery-page-card img");
    const lightbox = document.getElementById("galleryLightbox");
    const lightboxImg = document.querySelector(".gallery-lightbox-img");
  
    images.forEach(img => {
      img.addEventListener("click", () => {
        lightboxImg.src = img.dataset.full;
        lightbox.classList.add("is-active");
      });
    });
  
    lightbox.addEventListener("click", () => {
      lightbox.classList.remove("is-active");
      lightboxImg.src = "";
    });
  });