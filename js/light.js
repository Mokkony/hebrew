if (!localStorage.theme) localStorage.theme = "dark"
document.body.className = localStorage.theme

toggleThemeBtn.onclick = () => {
    document.body.classList.toggle("light")
    localStorage.theme = document.body.className || "dark"
}

// toggleThemeBtn.onclick = () => {
//   // if(localStorage.theme == "light")
//   //   setTimeout(theme, 1000);
//   // else theme();
//   setTimeout(theme, 1000);
// }
// toggleThemeBtn1.onclick = () => {
//   // if(localStorage.theme == "light")
//   //   setTimeout(theme, 1000);
//   // else theme();
//   // setTimeout(theme, 1000);
//   theme();
// }

// function theme() {
//   document.body.classList.toggle("light")
//   localStorage.theme = document.body.className || "dark"
// }
