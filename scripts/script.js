document.addEventListener("DOMContentLoaded", function() {
     const toggleMenu = document.getElementById("toggleMenu");
     const nav = document.getElementById("nav");
 
     toggleMenu.addEventListener("click", function() {
          if (nav.style.top == "-5cm") {
               nav.style.top = "2.12cm"
               nav.style.transition = ".3s"
          } else {
               nav.style.top = "-5cm"
               nav.style.transition = ".2s"
          }
     });
});