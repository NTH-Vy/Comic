document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper-container", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 150,
        modifier: 1,
        slideShadows: true,
      },
      spaceBetween: 0,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  });

  // JavaScript for Tab Switching
  function switchTab(element, tabId) {
    // Remove active class from all tabs
    const tabs = document.querySelectorAll(".tab");
    tabs.forEach((tab) => tab.classList.remove("active"));
    
    // Add active class to clicked tab
    element.classList.add("active");
    
    // Hide all tab contents
    const tabContents = document.querySelectorAll(".tab-content");
    tabContents.forEach((content) => content.style.display = "none");
    
    // Show selected tab content
    document.getElementById(tabId).style.display = "block";
  }