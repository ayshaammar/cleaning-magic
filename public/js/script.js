   let currentIndex = 0;
    const slider = document.getElementById('slider');
    const totalSlides = document.querySelectorAll('.slide').length;

    function moveSlide(direction) {
      currentIndex += direction;
      if (currentIndex < 0) currentIndex = totalSlides - 1;
      if (currentIndex >= totalSlides) currentIndex = 0;
      slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }


document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form");
  if (form) {
    form.addEventListener("submit", e => {
      e.preventDefault();
      alert("شكرًا لتواصلك معنا! سنرد عليك في أقرب وقت.");
      form.reset();
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  // زر العودة للأعلى
  const backToTop = document.getElementById("backToTop");

  window.addEventListener("scroll", () => {
    backToTop.style.display = window.scrollY > 300 ? "block" : "none";
  });

  backToTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  // معالجة نموذج الاتصال
  const form = document.getElementById("contact-form");
  const successMsg = document.getElementById("success-message");

  if (form && successMsg) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      this.reset();
      successMsg.style.display = "block";
    });
  }
});
