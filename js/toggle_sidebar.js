function toggleSidebar() {
  const admin_wrapper = document.querySelector(".admin_wrapper");

  admin_wrapper.classList.toggle("hidden_sidebar");
  console.log(
    "admin_wrapper",
    admin_wrapper.classList.contains("hidden_sidebar")
  );
}

// here is and automatically invoke function
document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("resize", function () {
    const admin_wrapper = document.querySelector(".admin_wrapper");
    console.log("window resize : ", window.innerWidth, window.innerHeight);
    if (window.innerWidth < 600) {
      admin_wrapper.classList.add("hidden_sidebar");
    }
  });
});
