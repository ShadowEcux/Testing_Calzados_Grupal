var fila; 

$(document).ready(function() {
    var idProveedor, opcion;
    opcion = 4;

    objeto = {
        id: 5
    }
    
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        ajax:{            
            url: "../modelo/proveedor.php", 
            method: 'POST',  
            data:{opcion:opcion}, // opcion 4   SELECT
            dataSrc:"",
        },
        columns:[
                {"data": "idProveedor"},
                {"data": "nombre"},
                {"data": "telefono"},
                {"data": "direccion"}, 
                {"data": "estado", searchable: false, render: function( data, type, full, meta ){
                    console.log(data);
                    if (data == 1) {
                        return "<span class='badge badge-success'>Activo</span>";
                    }else {
                        return "<span class='badge badge-danger'>Inactivo</span>";
                    }
                }},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete_sweep</i></button></div></div>"}
        ]
    });     

    
    $('#formUsuarios').submit(function(e){ 
        e.preventDefault();     
        data = {
            idProveedor: idProveedor,
            nombre: $.trim($('#nombre').val()),
            telefono: $.trim($('#telefono').val()),
            direccion: $.trim($('#direccion').val()), 
            estado: $.trim($('#estado').val()),
            opcion: opcion
        }                 
        
        $.ajax({
            url: "../modelo/proveedor.php",
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
        idProveedor=null;
        $("#formUsuarios").trigger("reset");
        $('#modalCRUD').modal('show');	    
    });

    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        idProveedor = parseInt(columna(0));           
        nombre = columna(1);
        telefono = columna(2);
        direccion = columna(3);
        estado = (columna(4) == "Activo" ? 1 : 0);
    
        $("#nombre").val(nombre);
        $("#telefono").val(telefono);
        $("#direccion").val(direccion);
        $("#estado").val(estado); 
            
        $('#modalCRUD').modal('show');		   
    });

    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        idProveedor = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;         
        var respuesta = confirm("¿Está seguro de borrar el registro "+idProveedor+"?");                
        if (respuesta) {            
            $.ajax({
                url: "../modelo/proveedor.php",
                type: "POST",
                datatype:"json",    
                data:  {opcion:opcion, idProveedor:idProveedor},    
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
                }
            });	
        }
    });
});    

function columna(col){
    let filan = fila.find('td:eq(' + col + ')').text();
    console.log(filan);
    return filan;
}