$(document).ready( function () {
  borrarVariablesDeBomberosEnSesion();
});

function borrarVariablesDeBomberosEnSesion() {
   $.ajax({
   url: "EliminarTodasLasVariablesEnSesionDeBomberos.php",
    type: "POST",
      data:{"algo":""}
        }).done(function(data) {
         console.log(data);
             });
        }
