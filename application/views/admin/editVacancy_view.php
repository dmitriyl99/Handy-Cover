<?php
$vacancy = $data->getVacancy();
?>

<h5>Редактировать вакансию</h5>
<a href="/adminvacancies" class="align-middle mb-3"><i class='fas fa-level-up-alt mr-1'></i>Вернуться</a>
<form method="post">
    <input type="hidden" name="vacancyId" value="<?php echo $vacancy->getId();?>">
    <div class="form-group">
        <label for="vacancyName">Название вакансии</label>
        <input type="text" class="form-control" name="vacancyName" id="vacancyName" value="<?php echo $vacancy->getName()?>">
    </div>
    <div class="form-group">
        <label for="vacancyDemands">Требования</label>
        <textarea name="vacancyDemands" id="vacancyDemands" class="form-control"><?php echo $vacancy->getDemands()?></textarea>
    </div>
    <input type="submit" value="Сохранить" class="btn btn-success">
</form>
