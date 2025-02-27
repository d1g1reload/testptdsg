(() => {
  "use strict";

  const setThemeToLight = () => {
    document.documentElement.setAttribute("data-bs-theme", "light");
  };

  const updateDropdownIcon = () => {
    const themeIconActive = document.querySelector(".theme-icon-active");
    const iconElement = document.querySelector(
      `[data-bs-theme-value="light"] .theme-icon`
    );

    if (themeIconActive && iconElement) {
      themeIconActive.innerHTML = iconElement.outerHTML;
    }
  };

  setThemeToLight();

  window.addEventListener("DOMContentLoaded", () => {
    const themeSwitcherText = document.querySelector(".bs-theme-text");
    const btnToActive = document.querySelector(`[data-bs-theme-value="light"]`);

    document.querySelectorAll("[data-bs-theme-value]").forEach((element) => {
      element.classList.remove("active");
      element.setAttribute("aria-pressed", "false");
    });

    if (btnToActive) {
      btnToActive.classList.add("active");
      btnToActive.setAttribute("aria-pressed", "true");
    }

    updateDropdownIcon();
  });
})();
