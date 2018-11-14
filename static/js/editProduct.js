$(document).ready(function () {
    $('.delete-pcp-item').click(deletePcpItem);
    $('#addPcPItemButton').click(function () {
        let pcpItems = $('#photosColorsPrices');
        let lastPopItem = $('.photos-colors-prices-item').last();
        let lastNumber = 0;
        if (lastPopItem.length > 0) {
            lastNumber = $(lastPopItem).attr('data-number');
            lastNumber++;
        }


        let htmlString = getHtmlString('new', lastNumber)
        let newPcpItem = $(htmlString);
        pcpItems.append(newPcpItem);
        let destination = newPcpItem.offset().top;
        $('html, body').animate({ scrollTop: destination }, 500);
        newPcpItem.find('.delete-pcp-item').click(deletePcpItem);
        pcpItem.find('input[type="file"]').change(inputFile);
    });
    
    function deletePcpItem() {
        let number = $(this).attr('data-delete-number');
        let pcpItem = $(`.photos-colors-prices-item[data-number=${number}]`);
        if (pcpItem.hasClass('new')) {
            pcpItem.remove();
        } else
        {
            pcpItem.removeClass('photos-colors-prices-item');
            pcpItem.addClass('deleted-pcp-item');
            pcpItem.find('input[type="file"]').attr('name', 'deletedProductImage[]');
            let textInputs = pcpItem.find('input[type="text"]');
            $(textInputs[0]).attr('name', 'deletedColor[]');
            $(textInputs[1]).attr('name', 'deletedPrice[]');
            pcpItem.find('input[name="productImageId[]"]').attr('name', 'deletedProductImageId[]');
        }
    }

    function getHtmlString(action, lastNumber)
    {
        let htmlString = `<div class="${action} photos-colors-prices-item" data-number="${lastNumber}">
<div class="clearfix mb-3">
                    <a href="#!" data-delete-item="${lastNumber}" class="float-right delete-pcp-item text-danger"><i class='fas fa-trash mr-1'></i></a>
                </div>
<div class="form-group custom-file">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                <input type="file" name="${action}ProductImage[]" id="productImage${lastNumber}" class="custom-file-input">
                <label for="productImage${lastNumber}" class="custom-file-label">Выберите изображение товара</label>
            </div>
            <div class="form-group">
                <label for="color${lastNumber}">Цвет</label>
                <input type="text" class="form-control" name="${action}Color[]" id="color${lastNumber}">
            </div>
            <div class="form-group">
                <label for="price${lastNumber}">Цена</label>
                <input type="text" class="form-control" name="${action}Price[]" id="price${lastNumber}">
            </div>
</div>`;
        return htmlString;
    }
});