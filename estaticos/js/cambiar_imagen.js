document.addEventListener("DOMContentLoaded", function() {

    const urls = ["estaticos/imagenes/libros1.jpg", "estaticos/imagenes/libros2.jpg", "estaticos/imagenes/libros3.jpg"];
    let i = 0;
    const imagenContenedor = document.getElementById("imagen-contenedor");

    function cambiarImagen() {
        imagenContenedor.style.backgroundImage = `url(${urls[i]})`;
      i = (i + 1) % urls.length;
    }

    setInterval(cambiarImagen, 3000);
  });