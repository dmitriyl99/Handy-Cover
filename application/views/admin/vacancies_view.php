<h4>Вакансии Handy Cover</h4>
<div class="row">
    <div class="col-12 offset-10">
        <a href="/adminvacancies/createVacancy" class="btn btn-primary">Открыть вакансию</a>
    </div>
    <table class="table mt-4 table-hover table-bordered">
        <thead class="thead-light">
        <tr>
            <th class="text-center">Вакансия</th>
            <th class="text-center">Действия</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $vacancies = $data->getVacancies();
            foreach ($vacancies as $vacancy) {
                $id = $vacancy->getId();
                $name = $vacancy->getName();
                echo
                "
                <tr>
                    <td class='w-50'>$name</td>
                    <td>
                        <div class='row'>
                            <div class='col-6'>
                                <a href='/adminvacancies/editVacancy?id=$id' class='d-block text-center'><i class='fas fa-pencil-alt mr-1'></i>Изменить</a>
                            </div>
                            <div class='col-6'>
                                <a href='/adminvacancies/removeVacancy?id=$id' data-modal-text='вакансию $name' class='d-block text-center text-danger catalogDeleteButton'><i class='fas fa-trash mr-1'></i>Удалить</a>
                            </div>
                        </div>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="removeDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подвердите свои действия</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить <span id="modalTarget"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="noModalButton" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                <a type="button" id="yesModalButton" class="btn btn-danger">Да</a>
            </div>
        </div>
    </div>
</div>