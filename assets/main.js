document.addEventListener("DOMContentLoaded", () => {
	const navToggle = document.querySelector(".nav-toggle");
	const mainNav = document.querySelector(".main-nav");
	const currentBenefit = document.querySelector(".benefit-current");

	if (navToggle) {
		navToggle.addEventListener("click", () => {
			mainNav.classList.toggle("active");
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
