const bar_btn = document.getElementById("bar_btn");
const sideBar = document.getElementsByClassName("sidebar")[0];
console.log(bar_btn);

bar_btn.addEventListener("click", () => {
  sideBar.classList.toggle("collapse");
});
