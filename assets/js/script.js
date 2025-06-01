document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("theme-switch");
  const html = document.documentElement;
  const storedTheme = localStorage.getItem("theme");

  if (storedTheme) {
    html.setAttribute("data-theme", storedTheme);
    toggle.checked = storedTheme === "dark";
  }

  toggle.addEventListener("change", function () {
    const newTheme = toggle.checked ? "dark" : "light";
    html.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});
