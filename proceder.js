document.addEventListener("DOMContentLoaded", function () {
  const createAccountBtn = document.querySelector(".create-account");
  const backToLoginBtn = document.querySelector(".back-to-login");

  const loginSection = document.getElementById("loginSection");
  const registerSection = document.getElementById("registerSection");

  createAccountBtn.addEventListener("click", function () {
    loginSection.style.display = "none";
    registerSection.style.display = "block";
  });

  backToLoginBtn.addEventListener("click", function () {
    registerSection.style.display = "none";
    loginSection.style.display = "block";
  });
});
