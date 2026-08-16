document.addEventListener("DOMContentLoaded", () => {
  const mainHeader = document.querySelector(".main-header");

  if (mainHeader) {
    const updateHeaderState = () => {
      mainHeader.classList.toggle("is-scrolled", window.scrollY > 12);
    };

    updateHeaderState();
    window.addEventListener("scroll", updateHeaderState, { passive: true });
  }

  const navToggle = document.querySelector(".nav-toggle");
  const mainNav = document.querySelector(".main-nav");
  const currentBenefit = document.querySelector(".benefit-current");

  if (navToggle) {
    navToggle.addEventListener("click", () => {
      mainNav.classList.toggle("active");
    });
  }

  const reserveBtn = document.querySelector(".hero-reserve-btn");
  const subjectField = document.querySelector("#footer-subject");
  const nameField = document.querySelector("#footer-name");
  const dateField = document.querySelector("#footer-date");
  const contactSection = document.querySelector("#contacto");

  const isValidClassDate = (date) => {
    const day = date.getDay();
    return day !== 0 && day !== 4 && day !== 6;
  };

  const submitButton = document.querySelector(
    ".contact-form button[type=submit]",
  );

  window.onCaptchaSuccess = () => {
    if (submitButton) {
      submitButton.disabled = false;
    }
  };

  window.onCaptchaExpired = () => {
    if (submitButton) {
      submitButton.disabled = true;
    }
  };

  if (submitButton) {
    submitButton.disabled = true;
  }

  if (dateField && window.flatpickr) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const minDate = new Date(today);
    minDate.setDate(minDate.getDate() + 2);

    flatpickr(dateField, {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d/m/Y",
      minDate,
      defaultDate: null,
      allowInput: false,
      disable: [(date) => !isValidClassDate(date)],
      onReady: () => {
        dateField.placeholder = "Selecciona un día";
      },
    });
  }

  if (reserveBtn && subjectField && nameField && contactSection) {
    reserveBtn.addEventListener("click", (event) => {
      event.preventDefault();
      subjectField.value = "Clase de prueba";
      contactSection.scrollIntoView({ behavior: "smooth", block: "start" });
      setTimeout(() => {
        nameField.focus({ preventScroll: true });
      }, 500);
    });
  }

  if (currentBenefit) {
    const benefits = [
      "más energía durante el día",
      "menos fatiga acumulada",
      "mayor movilidad y libertad corporal",
      "reducción de dolores y tensiones",
      "mejor respiración",
      "más fuerza útil",
      "más calma interna",
      "mayor conexión contigo",
      "mejor capacidad de recuperación",
      "más claridad en un mundo lleno de ruido",
    ];

    let index = 0;

    setInterval(() => {
      currentBenefit.classList.add("is-fading");

      setTimeout(() => {
        index = (index + 1) % benefits.length;
        currentBenefit.textContent = benefits[index];
        currentBenefit.classList.remove("is-fading");
      }, 600);
    }, 2400);
  }
});
