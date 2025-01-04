
var count=0;
$(document).on('click','#add-form-btn',function(){
    var lastRepeatingGroup = $('.vehicle-form').last();
   
   var dd= lastRepeatingGroup.clone().insertAfter(lastRepeatingGroup);
        // var $originalSelect = $(lastRepeatingGroup).find('.selectpicker');
        // $originalSelect.next().addClass('d-none')
        // $originalSelect.selectpicker('refresh');
        $(dd).find('input').val(' ')
        $(dd).find('textarea').text(' ')
        $(dd).find('select option:selected').removeAttr('selected');
        $('.select2-container').remove();
        $('.filter-form').select2({
          placeholder: "Placeholder text",
          allowClear: true,
          multiple:true
        });
        $('.select2-container').css('width','100%');
        $(dd).find('#escort_id').attr('name', `escort_id[${count+1}][]`)
       
        reorderForms()
     checkDeleteButtonVisibility();
     count++

})
$(document).ready(function(){
    // $(document).find('select').select2()
    $('.filter-form').select2({
        theme:'bootstrap4',
        placeholder: "Placeholder text",
        allowClear: true,
        multiple:true
    });
})


function createDive(){
   
    var lastRepeatingGroup = $('.card-order').last();
    lastRepeatingGroup.clone().insertAfter(lastRepeatingGroup);
        var $originalSelect = $(lastRepeatingGroup).find('.selectpicker');
        $originalSelect.next().addClass('d-none')
        $originalSelect.selectpicker('render');
        reorderForms1()
     checkDeleteButtonVisibility();
     count++
}

$(document).on('click', '.delete-form-btn', function () {
    $(this).closest('.vehicle-form').remove();
    reorderForms();
    checkDeleteButtonVisibility();
});

let order_number = $(document).find('.vehicle-form input.number:first').val();
function reorderForms() {
    // Reorder the number inputs after deletion
    let value = order_number;
    let number = Number( value.replace(/\D/g, '') );
    let perfix = value.replace(number, '');

   $.each($(document).find('.vehicle-form'), function() {
        $(this).find('.number').val(`${perfix}${number}`);
        number ++;
   });

}

let order_number1 = $(document).find('.card-order input.number:first').val();
function reorderForms1() {
    // Reorder the number inputs after deletion
    let value = order_number1;
    let number = Number( value.replace(/\D/g, '') );
    let perfix = value.replace(number, '');

   $.each($(document).find('.card-order'), function() {
        $(this).find('.number').val(`${perfix}${number}`);
        number ++;
   });

}
function checkDeleteButtonVisibility() {
    var formCount = $('.vehicle-form').length;
    $('.delete-form-btn').each(function () {
        if (formCount <= 1) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
}

// $(document).ready(function () {
//     $('#add-form-btn').click(function () {
       
//         var newForm = $(this).parents('.vehicle-form:first').clone();
//         var $originalSelect = $(newForm).find('.selectpicker');
//         $originalSelect.next().addClass('d-none')
       
//         $originalSelect.selectpicker('render');
    
//         var lastNumberInput = $('.vehicle-form').last().find('.number');
//         var lastNumberValue = 0;

//         if (lastNumberInput.length) {
//             var numericString = lastNumberInput.val().replace(/\D/g, '');
//             var numericValue = Number(numericString);
//             if (!isNaN(numericValue)) {
//                 lastNumberValue = numericValue;
//             }
//         }

//         newForm.find('input').each(function () {
//             var input = $(this);

//             if (input.hasClass('number')) {
//                 input.val(lastNumberInput.val().replace(/\d/g, '') + (lastNumberValue + 1));
//             }
           
//             if (!(input.hasClass('drgpicker') || input.hasClass('number') || input.hasClass('task_start_time') || input.hasClass('date'))) {
//                 input.val('');
//             }
//         });
        
      
//         $('#vehicle-forms-container').append(newForm);

//         newForm.find('.btn-primary').click(function (e) {
//             e.stopPropagation();

//             $('#add-form-btn').trigger("click");
//         });

//         checkDeleteButtonVisibility();
        
//     });

//     $(document).on('click', '.delete-form-btn', function () {
//         $(this).closest('.vehicle-form').remove();
//         reorderForms();
//         checkDeleteButtonVisibility();
//     });

//     let order_number = $(document).find('.vehicle-form input.number:first').val();
//     function reorderForms() {
//         // Reorder the number inputs after deletion
//         let value = order_number;
//         let number = Number( value.replace(/\D/g, '') );
//         let perfix = value.replace(number, '');
    
//        $.each($(document).find('.vehicle-form'), function() {
//             $(this).find('.number').val(`${perfix}${number}`);
//             number ++;
//        });
   
//     }
//     function checkDeleteButtonVisibility() {
//         var formCount = $('.vehicle-form').length;
//         $('.delete-form-btn').each(function () {
//             if (formCount <= 1) {
//                 $(this).hide();
//             } else {
//                 $(this).show();
//             }
//         });
//     }

//     checkDeleteButtonVisibility();

   
// });


//old code

// $(document).ready(function () {
//     $('#add-form-btn').click(function () {
     
       
//         var newForm = $(this).parents('.vehicle-form:first').clone();
//         var $originalSelect = $(newForm).find('.selectpicker');
//         $originalSelect.next().addClass('d-none')
       
//         $originalSelect.selectpicker('render');
    
//         var lastNumberInput = $('.vehicle-form').last().find('.number');
//         var lastNumberValue = 0;

//         if (lastNumberInput.length) {
//             var numericString = lastNumberInput.val().replace(/\D/g, '');
//             var numericValue = Number(numericString);
//             if (!isNaN(numericValue)) {
//                 lastNumberValue = numericValue;
//             }
//         }

//         newForm.find('input').each(function () {
//             var input = $(this);

//             if (input.hasClass('number')) {
//                 input.val(lastNumberInput.val().replace(/\d/g, '') + (lastNumberValue + 1));
//             }
           
//             if (!(input.hasClass('drgpicker') || input.hasClass('number') || input.hasClass('task_start_time') || input.hasClass('date'))) {
//                 input.val('');
//             }
//         });

//         newForm.find('.delete-form-btn').click(function () {
//             newForm.remove();
//             checkDeleteButtonVisibility();
//         });

//         $('#vehicle-forms-container').append(newForm);

//         newForm.find('.btn-primary').click(function () {
//             $('#add-form-btn').click();
//         });

//         checkDeleteButtonVisibility();
//     });

//     function checkDeleteButtonVisibility() {
//         var formCount = $('.vehicle-form').length;
//         $('.delete-form-btn').each(function () {
//             if (formCount <= 1) {
//                 $(this).hide();
//             } else {
//                 $(this).show();
//             }
//         });
//     }

//     checkDeleteButtonVisibility();
// });