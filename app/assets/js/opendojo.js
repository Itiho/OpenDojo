$(window).load(
    function(){
        $('[data-toggle="confirmation-delete"]').confirmation({ 
                                    btnOkIcon: "fa fa-trash-o fa-lg", 
                                    btnOkClass: "btn btn-xs btn-danger",
                                    btnCancelIcon: "fa fa-times",
                                    btnOkLabel: "&nbsp;Sim", 
                                    btnCancelLabel: "&nbsp;Não" });
    }
); 

