// Mobile Menu Toggle
// document.getElementById("menu-toggle").addEventListener("click", function () {
//     document.getElementById("mobile-menu").classList.toggle("hidden");
// });


/*=====================================================================  
                    @@ // Show more detail of news
=====================================================================*/
document.querySelectorAll('.btn-detail').forEach(button => {
  button.addEventListener('click', () => {
    const cardNews = document.getElementById('card-news');
    const cmsNews = document.getElementById('cms-news');

    // Hide card-news, show cms-news
    cardNews.classList.add('hidden');
    cmsNews.classList.remove('hidden');
  });
});

/*=====================================================================  
                    @@ Show more of product detail
=====================================================================*/
// // Get elements
// const readDetailBtn = document.getElementById("read-detail-btn");
// const closeDetailBtn = document.getElementById("close-detail-btn");
// const detailSection = document.getElementById("more-detail-product");

// // Show on Read Detail click
// readDetailBtn.addEventListener("click", () => {
//   detailSection.classList.remove("hidden");
// });

// // Hide on Close click
// closeDetailBtn.addEventListener("click", () => {
//   detailSection.classList.add("hidden");
// });
/*=====================================================================  
                    @@ Responsive design
=====================================================================*/
document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    }
});
/*=====================================================================  
                    @@ Year of all reserved copyright
=====================================================================*/
document.getElementById("year").textContent = new Date().getFullYear();
