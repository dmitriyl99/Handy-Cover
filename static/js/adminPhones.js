$(function () {

    $('.delete-phone-item').click(deletePhoneItem);
    $('#addPhoneButton').click(function () {
       let phones = $('#phones');
       let lastPhone = $('.phone-item').last();
       let lastNumber = 0;
       if (lastPhone.length > 0) {
           lastNumber = $(lastPhone).attr('data-number');
           lastNumber++;
       }
       let htmlString = getHtmlString('new', lastNumber);
       let newPhoneItem = $(htmlString);
       phones.append(newPhoneItem);
       let destination = newPhoneItem.offset().top;
       $('html, body').animate({scrollTop: destination}, 500);
       newPhoneItem.find('.delete-phone-item').click(deletePhoneItem);
    });

    function getHtmlString(action, lastNumber) {
        let htmlString = `<div class='${action} phone-item'>
                        <div class='clearfix mb-1'><a href='#!' data-delete-number='${lastNumber}' class='float-right delete-phone-item text-danger'><i class='fas fa-trash mr-1'></i></a></div>
                        <input type='text' name='${action}Phones[]' id='phone${lastNumber}' class='form-control'>
                        </div>`;
        return htmlString;
    }

    function deletePhoneItem() {
        let number = $(this).attr('data-delete-number');
        console.log(number);
        let phoneItem = $(`.phone-item[data-number=${number}]`);
        console.log(phoneItem);
        if (phoneItem.hasClass('new')) {
            phoneItem.remove();
        } else {
            phoneItem.removeClass('phone-item');
            phoneItem.addClass('deleted-phone-item');
            phoneItem.find('input[type="text"]').attr('name', 'deletedPhones[]');
            phoneItem.find('input[name="phoneIds[]"]').attr('name', 'deletedPhoneIds[]');
        }
    }
});