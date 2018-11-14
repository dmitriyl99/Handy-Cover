$(document).ready(function () {
    $('input[type="file"]').change(inputFile);
    
    function inputFile() {
        let inputFile = $(this);
        let filePath = inputFile[0].value;
        console.log(filePath);
        let inputFileParent = inputFile.parent();
        let label = inputFileParent.find('.custom-file-label');
        console.log(label)
        let fileName = filePath.split('\\').pop().split('/').pop();
        label.text(fileName);
    }
});