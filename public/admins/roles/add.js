$('.checkbox_wrapper').on('click', function (){
    $(this).parents('.card-checked').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
})
