$(document).ready(function  () {

  'use strict';
  getPageData();


  function getPageData () {
    var datos = { 'opcn':'tabla' }
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

  function limpiarCampos () {
    $('#create-item').find('input[name="nombre"]').val('');
    $('#create-item').find('input[name="apellido"]').val('');
    $('#create-item').find('input[name="salario"]').val('');
    $('#create-item').find('input[name="email"]').val('');
  }

  function manageRow (data) {
    var rows = '';
    data.forEach( function  (key, value) {
      rows += '<tr>';
      rows += '<td>'+key.nombre+'</td>';
      rows += '<td>'+key.apellido+'</td>';
      rows += '<td>'+key.salario+'</td>';
      rows += '<td>'+key.email+'</td>';
      rows += '<td>'+key.fecha_creacion+'</td>';
      rows += '<td data-id="'+key.id+'">';
      rows += '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
      rows += '<button class="btn btn-danger remove-item"><i class="fa fa-trash" aria-hidden="true"></i></button>';
      rows += '</tr>';

      $('tbody').html(rows);
    });

  }


  $('.crud-submit').click(function (event) {

    event.preventDefault();
    var validar = $(this).hasClass("disabled");

    if(!validar) {

      var nombre = $('#create-item').find('input[name="nombre"]').val(),
      apellido = $('#create-item').find('input[name="apellido"]').val(),
      salario = $('#create-item').find('input[name="salario"]').val(),
      email = $('#create-item').find('input[name="email"]').val();

      var datos = {
          opcn: 'nuevo',
          nombre: nombre,
          apellido: apellido,
          salario: salario,
          email: email
      };

      $.ajax({
        url:'controllers/index.php',
        data: datos,
        type: 'post',
        dataType: 'json',
      })
      .done(function  (data) {
        limpiarCampos();
        $('.crud-submit').addClass("disabled");
        getPageData();
        $('.modal').modal('hide');

        if (data.error && data.msj != "") {
          toastr.error('El email ya se encuentra registrado', 'Opss', {timeOut: 2000});
        } else {
          toastr.success('Empleado creado exitosamente!', 'Genial', {timeOut: 5000});
        }
        
      })
      .fail(function(){
        toastr.error('Empleado no fue creado', 'Opss', {timeOut: 2000});
      });
      
    } else {
      toastr.warning('Complete los campos requeridos', 'Espera', {timeOut: 3000});
    }

  });


  $('body').on('click', '.remove-item', function  () {
    var id = $(this).parent('td').data('id'),
        c_obj = $(this).parents('tr');

    var datos = {
            opcn: 'eliminar', 
            id: id
        };
          $.ajax({
            url:'controllers/index.php',
            data: datos,
            type: 'post',
            dataType: 'json',
          })
    .done(function  (data) {
      c_obj.remove();
      toastr.success('Empleado borrado!', 'Genial', {timeOut:5000});
      getPageData();
    })
    .fail(function(){
      toastr.error('Empleado no pudo ser borrado', 'Opss', {timeOut: 2000});
    });

  });


  $('body').on('click', '.edit-item', function  (event) {

      var elementos_text = new Array(3);
      var elementos = $(this).closest('tr').children();

      elementos.each(function(idx, value) {
        elementos_text[idx] = $(value).text();
      });

      var id = $(this).parent('td').data('id');
      
      $('#edit-item').find('input[name="nombre"]').val(elementos_text[0]);
      $('#edit-item').find('input[name="apellido"]').val(elementos_text[1]);
      $('#edit-item').find('input[name="salario"]').val(elementos_text[2]);
      $('#edit-item').find('input[name="email"]').val(elementos_text[3]);
      $('#edit-item').find('input[name="id"]').val(id);

      elementos.splice(0, elementos.length);
      elementos_text.splice(0, elementos_text.length);

  });


  $('.crud-submit-edit').click(function  (event) {

    event.preventDefault();
    var validar = $(this).hasClass("disabled");

    if(!validar) {

      var nombre = $('#edit-item').find('input[name="nombre"]').val(),
      apellido = $('#edit-item').find('input[name="apellido"]').val(),
      salario = $('#edit-item').find('input[name="salario"]').val(),
      email = $('#edit-item').find('input[name="email"]').val(),
      id = $('#edit-item').find('.edit-id').val();

      var datos = {
          opcn: 'editar',
          id:id,
          nombre: nombre,
          apellido: apellido,
          salario: salario,
          email: email
      };
        $.ajax({
          url:'controllers/index.php',
          data: datos,
          type: 'post',
          dataType: 'json',
        })
      .done(function  (data) {
        getPageData();
        $('.modal').modal('hide');

        if (data.error && data.msj != "") {
          toastr.error('El email ya se encuentra registrado', 'Opss', {timeOut: 2000});
        } else {
          toastr.success('Empleado actualizado exitosamente!', 'Genial', {timeOut: 5000});
        }
      })
      .fail(function(){
        toastr.error('Empleado no fue actualizado', 'Opss', {timeOut: 2000});
      });
    }
    else {
      toastr.warning('Complete los campos requeridos', 'Espera', {timeOut: 3000});
    }

  });

});