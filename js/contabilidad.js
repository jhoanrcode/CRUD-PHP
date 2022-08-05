getSelectData();

function getSelectData () {

    var datos = { 'opcn':'select' }
    $.ajax({
      url:'controllers/index.php',
      data: datos,
      type: 'post',
      dataType: 'json',
    })
    .done(function  (data) {
      manageRow(data);
    });
}

function manageRow (data) {
  var rows = '';
  data.forEach( function  (key, value) {
    rows += '<option value="'+key.salario+'">'+key.nombres+'</option>';
    $('#empleados').html(rows);
  });
}


$(document).ready(function() {
  $('#empleados').multiselect();
});


$('.btn-calcular').click(function (event) {

  event.preventDefault();
  var selectEmpleados = $('#empleados').val();

  if(!selectEmpleados.length) {
    $('#salarios_empleados').html("$0");
    $('#promedio_empleados').html("$0");
    toastr.error('No ha seleccionado empleados', 'Opss', {timeOut: 2000});
  } else{
    let salariosSuma = selectEmpleados.reduce((a, b) => Number(a) + Number(b), 0);
    let salariosPromedio = salariosSuma/selectEmpleados.length;
    $('#salarios_empleados').html("$"+salariosSuma);
    $('#promedio_empleados').html("$"+salariosPromedio);
  }    

});
