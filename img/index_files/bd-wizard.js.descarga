//Wizard Init

$("#wizard").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "fade",
    stepsOrientation: "vertical",    
    titleTemplate: '<span class="number">#index#</span>',

    enableFinishButton: true,
    transitionEffectSpeed: 500,
    saveState: true,
    onStepChanging: function (event, currentIndex, newIndex) { 
        if (newIndex > currentIndex){
            return formValidate(currentIndex);
        } else {
            return true
        }
    },
    onFinishing: function (event, currentIndex){        
        return formValidate(currentIndex);
    },
    onFinished: function (event, currentIndex) {          
        console.log(currentIndex);
        $('#guardar-registro').submit();
    },
    /* Labels */
    labels: {
        cancel: "Cancelar",
        current: "Paso actual:",
        pagination: "Paginación",
        finish: "Finalizar",
        next: "Siguiente",
        previous: "Anterior",
        loading: "Cargando ..."
    }
});

//Form control
