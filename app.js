
// Funciones
// Función que añade el curso al carrito
function comprarCurso(e) {
     e.preventDefault();
     // Delegation para agregar-carrito
     if(e.target.classList.contains('agregar-carrito')) {
          const curso = e.target.parentElement.parentElement;
          // Enviamos el curso seleccionado para tomar sus datos
          leerDatosCurso(curso);
     }
}
// Lee los datos del curso
function leerDatosCurso(curso) {
     const infoCurso = {
          imagen: curso.querySelector('img').src,
          titulo: curso.querySelector('h3').textContent,
          precio: curso.querySelector('h4').textContent,
          id: curso.querySelector('a').getAttribute('data-id')
     }

     console.log(curso);

}