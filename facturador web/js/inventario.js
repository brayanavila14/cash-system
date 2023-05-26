document.querySelector(".ingreso").addEventListener("click", e => {
    const newElement = document.createElement("div");
    newElement.classList.add("products");
    newElement.textContent = "apenas estoy empezando";
    document.querySelector(".contenido-lista").appendChid(newElement);
  });