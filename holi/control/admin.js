var fila; 

$(document).ready(function() {
    var idCliente, opcion;
    opcion = 4;
    
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        ajax:{            
            url: "../modelo/admin.php", 
            method: 'POST',  
            data:{opcion:opcion}, // opcion 4   SELECT
            dataSrc:""
        },
        columns: [
            { data: 'DNI' },
            { data: 'nombre' },
            { data: 'apellidoP' },
            { data: 'apellidoM' },
            { data: 'rol' },
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete_sweep</i></button></div></div>"}
        ]
    });

    $('#formUsuarios').submit(function(e){ 
        e.preventDefault();     
        data = {
            /*
            idCliente: idCliente,
            nombre: $.trim($('#nombre').val()),
            apellidoP: $.trim($('#apellidoP').val()),
            apellidoM: $.trim($('#apellidoM').val())   ,
            DNI: $.trim($('#DNI').val()),
            fechaNacimiento: $.trim($('#fechaNacimiento').val()),
            opcion: opcion
            */
            idUsuario: idUsuario,
            nombre: $.trim($('#nombre').val()),
            apellidoP: $.trim($('#apellidoP').val()),
            apellidoM: $.trim($('#apellidoM').val())   ,
            DNI: $.trim($('#DNI').val()),
            direccion: $.trim($('#direccion').val()),
            celular: $.trim($('#celular').val()),
            usuario: $.trim($('#usuario').val()),
            pasword: $.trim($('#pasword').val()),  
            opcion: opcion

        }

        $.ajax({
            url: "../modelo/admin.php",
            type: "POST",
            datatype:"json",  
            data:  data,  
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    $("#btnNuevo").click(function(){
        opcion = 1;//Crear       
        idUsuario=null;
        $("#formUsuarios").trigger("reset");
        $('#modalCRUD').modal('show');	    
    });

  
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        idCliente = parseInt(columna(0));           
        nombre = columna(1);
        apellidoP = columna(2);
        apellidoM = columna(3);
        DNI = columna(4);
        fechaNacimiento = columna(5);
    
        $("#nombre").val(nombre);
        $("#apellidoP").val(apellidoP);
        $("#apellidoM").val(apellidoM);
        $("#DNI").val(DNI);
        $("#fechaNacimiento").val(fechaNacimiento);
            
        $('#modalCRUD').modal('show');		   
    });  

    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        idCliente = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;         
        var respuesta = confirm("¿Está seguro de borrar el registro "+idCliente+"?");                
        if (respuesta) {            
            $.ajax({
                url: "../modelo/admin.php",
                type: "POST",
                datatype:"json",    
                data:  {opcion:opcion, idCliente:idCliente},    
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
                }
            });	
        }
    });
});    

function columna(col){
    return fila.find('td:eq(' + col + ')').text();
}