// import './bootstrap';

import 'laravel-datatables-vite';
import 'datatables.net-responsive-bs5'

//Delete datatable item
window.deleteDataTableItem = () => 
    $(".delete-modal").on("click", function() {
        let route = $(this).attr("data-route");
        let modal = $(this).attr("data-target");

        let form = $(modal).find("form");

        $(form).attr("action", route);
    });

//Funcionalidad para poder hacer check en los permisos de rol y usuario (tabs)
$(function(){
    $('.checkAll').on('click', function(){
        checkPermissions(this);
        checkChild(this);
    });

    $('.checkChild').on('click', function(){
        checkChild(this);
    });
    
    $(".checkChild").each(function() {
        if($(this).is(":checked")) {
            checkChild(this);
        }
    });

    function checkPermissions(checkbox) {
        let me = $(checkbox);
        let parentId = me.data('parent');
        let moduleId = me.data('me');

        $(`input[data-parent=${moduleId}]:enabled`).each(function(){
            $(this).prop('checked', $(me).prop('checked'));

            if($(this).data('parent') != undefined){
                checkPermissions(this);
            }
        });
    }

    function checkChild(parent) {
        if($(parent).data("parent") != undefined) {
            let parentId = $(parent).attr("data-parent"); 
            let parentCheckbox = $(`input[data-me=${parentId}]`);
            let allChildrenChecked = $(`input[data-parent=${parentId}]:checked`).length == $(`input[data-parent=${parentId}]`).length;

            parentCheckbox.prop('checked', allChildrenChecked);

            if (parentCheckbox.data('parent') != undefined) {
                checkChild(parentCheckbox);
            }
        }
    }
});