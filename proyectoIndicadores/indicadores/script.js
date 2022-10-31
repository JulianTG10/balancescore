function mostrar(id) {
      if (id == "Margen Neto") {
        document.getElementById("Margen Neto").style.display = "block";
      } else {
        document.getElementById("Margen Neto").style.display = "none";
      }
  
      if (id == "trabajador") {
          $("#estudiante").hide();
          $("#trabajador").show();
          $("#autonomo").hide();
          $("#paro").hide();
      }
  
      if (id == "autonomo") {
          $("#estudiante").hide();
          $("#trabajador").hide();
          $("#autonomo").show();
          $("#paro").hide();
      }
  
      if (id == "paro") {
          $("#estudiante").hide();
          $("#trabajador").hide();
          $("#autonomo").hide();
          $("#paro").show();
      }
  }
