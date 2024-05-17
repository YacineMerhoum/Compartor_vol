window.addEventListener("mousemove", (e) => {
     test.style.setProperty("--x", e.layerX + "px")
     test.style.setProperty("--y", e.layerY + "px")
})