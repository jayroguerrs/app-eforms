$(document).ready(function(){  

    $("grupo#opt-5mom").hide();
    $("grupo#opt-tlm").hide();
    $("grupo#opt-tlp").hide();
    $("input[name=opt-5mom]").click(function(){
        if ($('input:radio[name=opt-5mom]:checked').val()=="NO"){
            $("grupo#opt-5mom").hide();
        } else {
            $("grupo#opt-5mom").show();
        }              
    });

    $("input[name=opt-tlm0]").click(function(){
        if ($('input:radio[name=opt-tlm0]:checked').val()=="NO"){
            $("grupo#opt-tlm").hide();
        } else {
            $("grupo#opt-tlm").show();
        }              
    });
    
    $("input[name=opt-tlp0]").click(function(){
        if ($('input:radio[name=opt-tlp0]:checked').val()=="NO"){
            $("grupo#opt-tlp").hide();
        } else {
            $("grupo#opt-tlp").show();
        }              
    });
});

// validate the comment form when it is submitted
$('#guardar-registro').validate({
    rules: {
        "fecha": {  
            required : true 
        },
        "colaborador-select": {
            required : true 
        },
        "desem" : {
            required : true
        },
        "area-select" : {
            required : true
        },
        "turno-select" : {
            required : true
        },
        "opt-esmalte": {  
            required : true 
        },
        "opt-unas": {
            required : true
        },
        "opt-accesorios" : {
            required : true
        },
        "opt-5mom": {  
            required : true 
        },
        "opt-m1": {
            required :{
                depends: function(element) {
                    return $("#opt-5mom").is(":checked");
                }
            }
        },
        "opt-m2": {
            required :{
                depends: function(element) {
                    return $("#opt-5mom").is(":checked");
                }
            }
        },
        "opt-m3": {
            required :{
                depends: function(element) {
                    return $("#opt-5mom").is(":checked");
                }
            }
        },
        "opt-m4": {
            required :{
                depends: function(element) {
                    return $("#opt-5mom").is(":checked");
                }
            }
        },
        "opt-m5": {
            required :{
                depends: function(element) {
                    return $("#opt-5mom").is(":checked");
                }
            }
        },
        "opt-tlm0": {  
            required : true 
        },
        "opt-tlm1": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm2": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm3": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm4": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm5": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm6": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm7": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm8": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "opt-tlm9": {
            required :{
                depends: function(element) {
                    return $("#opt-tlm").is(":checked");
                }
            }
        },
        "comment-tlm": {
            required: false,
            maxlength: 120
        },
        "opt-tlp0": {  
            required : true 
        },
        "opt-tlp1": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp2": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp3": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp4": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp5": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp6": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp7": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "opt-tlp8": {
            required :{
                depends: function(element) {
                    return $("#opt-tlp").is(":checked");
                }
            }
        },
        "comment-tlp": {
            maxlength: 120
        }
    },
    messages : {
        "fecha": {
            required: "Debe colocar una fecha"
        },
        "colaborador-select": {
            required: "Debe seleccionar un colaborador"                
        },
        "desem": {
            required: "Este campo no puede estar vacío, consulte a Dirección"
        },
        "area-select": {
            required: "Debe seleccionar un área"
        },
        "turno-select": {
            required: "Debe seleccionar un turno"
        },
        "opt-esmalte": {
            required: "Debe seleccionar una opción"
        },
        "opt-unas": {
            required: "Debe seleccionar una opción"                
        },
        "opt-accesorios": {
            required: "Debe seleccionar una opción"
        },
        "opt-5mom": {
            required: "Debe seleccionar una opción"
        },
        "opt-m1": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-m2": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-m3": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-m4": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-m5": {
            required: "Debe seleccionar una opción"                
        },
        "opt-tlm0": {
            required: "Debe seleccionar una opción"
        },
        "opt-tlm1": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm2": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm3": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm4": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm5": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm6": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm7": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm8": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlm9": {
            required: "Debe seleccionar una opción"                
        },
        "comment-tlm": {
            maxlength: "No debe exceder de 120 caracteres"
        },
        "opt-tlp0": {
            required: "Debe seleccionar una opción"
        },
        "opt-tlp1": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp2": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp3": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp4": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp5": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp6": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp7": {
            required: "Debe seleccionar una opción"                
        },            
        "opt-tlp8": {
            required: "Debe seleccionar una opción"                
        },
        "comment-tlp": {
            maxlength: "No debe exceder de 120 caracteres"
        }
    },
    errorElement: "err",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );
    
        if ( element.prop( "type" ) === "radio" ) {
            error.insertAfter( element.parents("div").filter(".form-group") );
        }else if (element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else if (element.prop( "tagName" ) === "SELECT"){
            error.insertAfter( element.next( "span" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
})

function formValidate(num) {
    $('#guardar-registro').validate().destroy();
    if(reglas[num]) {
        $('#guardar-registro').validate(reglas[num]);
        // console.log($('#modal-form-add-docente').validate().settings.rules);
        //console.log(num);
        return $('#guardar-registro').valid();
    } else {
        return false;
    }
}