<?php
function getSocialLinkName($key)
{
    switch ($key) {
        case 'TG': return "Telegram";
        case 'OK': return 'Одноклассники';
        case 'FB': return "Facebook";
        case 'INST': return "Instagram";
    }
}
?>

<h5>Контакты Handy Cover</h5>
<form method="post" class="mb-3">
    <div class="form-group">
        <label for="address">Адрес</label>
        <input type="text" name="address" class="form-control" id="address" value="<?php echo $data->getAddress()?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $data->getEmail()?>" placeholder="E-mail адрес">
    </div>
    <div class="form-group clearfix">
        <label>Контактные телефоны</label>
        <div id="phones" class="mb-3">
            <?php
            $phones = $data->getPhones();
            for ($i = 0; $i < count($phones); $i++)
            {
                $phone = $phones[$i];
                $id = $phone->getId();
                $number = $phone->getPhoneNumber();
                echo
                "
                <div class='phone-item' data-number='$i'>
                        <input type='hidden' name='phoneIds[]' value='$id'>
                        <div class='clearfix mb-1'><a href='#!' data-delete-number='$i' class='float-right delete-phone-item text-danger'><i class='fas fa-trash mr-1'></i></a></div>
                        <input type='text' name='phones[]' id='phone$i' class='form-control' value='$number'>
                </div>
                ";
            }
            ?>
        </div>
        <button id="addPhoneButton" class="btn btn-primary float-right" type="button">Добавить</button>
    </div>
    <div class="form-group">
        <label>Социальные сети</label>
        <?php
        $socialLinks = $data->getSocialLinks();
        foreach ($socialLinks as $key => $socialLink) {
            $name = getSocialLinkName($key);
            echo
            "
            <div class='form-group'>
                <input type='hidden' name='socialLinksKeys[]' value='$key' >
                <label for='socialLink${$key}'>$name</label>
                <input type='text' class='form-control' name='socialLinks[]' id='socialLink$key' value='$socialLink'>
            </div>
            ";
        }

        ?>
    </div>
    <input type="submit" value="Сохранить" class="btn btn-success">
</form>