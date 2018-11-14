$(document).ready(function () {
    $('#addPcPItemButton').click(function () {
        let pcpItems = $('#photosColorsPrices');
        let lastPopItem = $('.photos-colors-prices-item').last();
        let lastNumber = 0;
        if (lastPopItem.length > 0) {
            lastNumber = $(lastPopItem).attr('data-number');
            lastNumber++;
        }


        let htmlString = `<div class="photos-colors-prices-item" data-number="${lastNumber}">
<div class="clearfix mb-3">
                    <a href="#!" data-delete-item="${lastNumber}" class="float-right delete-pcp-item text-danger"><i class='fas fa-trash mr-1'></i></a>
                </div>
<div class="form-group custom-file">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                <input type="file" name="productImage[]" id="productImage${lastNumber}" class="custom-file-input">
                <label for="productImage${lastNumber}" class="custom-file-label">Выберите изображение товара</label>
            </div>
            <div class="form-group">
                <label for="color${lastNumber}">Цвет</label>
                <input type="text" class="form-control" name="color[]" id="color${lastNumber}">
            </div>
            <div class="form-group">
                <label for="price${lastNumber}">Цена</label>
                <input type="text" class="form-control" name="price[]" id="price${lastNumber}">
            </div>
</div>`;
        let newPcpItem = $(htmlString);
        pcpItems.append(newPcpItem);
        let destination = newPcpItem.offset().top;
        $('html, body').animate({ scrollTop: destination }, 500);
        newPcpItem.find('.delete-pcp-item').click(deletePcpItem);
        pcpItem.find('input[type="file"]').change(inputFile);
    });

    function deletePcpItem() {
        let number = $(this).attr('data-delete-item');
        let pcpItem = $(`.photos-colors-prices-item[data-number=${number}]`);
        pcpItem.remove();
    }
});