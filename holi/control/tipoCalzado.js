var fila; 

$(document).ready(function() {
    var idTipoCalzado, opcion;
    opcion = 4;
    
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        ajax:{            
            url: "../modelo/tipoCalzado.php", 
            method: 'POST',  
            data:{opcion:opcion}, // opcion 4   SELECT
            dataSrc:""
        },
        "columns":[
                {"data": "idTipoCalzado"},
                {"data": "nombre"}, 
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete_sweep</i></button></div></div>"}
        ]
    });     

    
    $('#formUsuarios').submit(function(e){ 
        e.preventDefault();     
        data = {
            idTipoCalzado: idTipoCalzado,
            nombre: $.trim($('#nombre').val()), 
            opcion: opcion
        }                 
        
        $.ajax({
            url: "../modelo/tipoCalzado.php",
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
        idTipoCalzado=null;
        $("#formUsuarios").trigger("reset");
        $('#modalCRUD').modal('show');	    
    });

    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        idTipoCalzado = parseInt(columna(0));           
        nombre = columna(1); 
    
        $("#nombre").val(nombre); 
            
        $('#modalCRUD').modal('show');		   
    });

    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        idTipoCalzado = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;         
        var respuesta = confirm("¿Está seguro de borrar el registro "+idTipoCalzado+"?");                
        if (respuesta) {            
            $.ajax({
                url: "../modelo/tipoCalzado.php",
                type: "POST",
                datatype:"json",    
                data:  {opcion:opcion, idTipoCalzado:idTipoCalzado},    
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