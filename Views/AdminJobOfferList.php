<?php
require_once('title.php');
require_once('nav.php');

use Utility\AdminUtility as AdminUtility;

AdminUtility::checkSessionStatus($_SESSION['user']);
?>

    <main class="">
        <section class="ourMision-Bg">
            <div class="ourMision">
                <p>Listado de ofertas laborales</p>
            </div>
        </section>
        <?php
        require_once('adminNav.php');
        ?>
        <div class="container float-none">
            <div class="row w-100">
                <?php
                if (isset($message)) {

                    echo '<div class="alert alert-success w-100" role="alert">';
                    echo '<h4 class="alert-heading">Proceso completado!</h4>';
                    echo '<p>' . $message . '</p>';
                    echo '</div>';
                } elseif (isset($errorMessage)) {

                    echo '<div class="alert alert-danger w-100" role="alert">';
                    echo '<h4 class="alert-heading">Algo inesperado sucedió!</h4>';
                    echo '<p>' . $errorMessage . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="row sticky-top w-100">
                <button class="btn btn-primary btn-lg btn-block" style="transform: rotate(0)" type="button">
                    <a href="<?php echo FRONT_ROOT ?>JobOffer/jobOfferForm"
                       class="btn-link stretched-link text-black-50">Crear
                        nueva oferta</a>
                </button>
            </div>
            <div class="table-responsive">
                <table id="theTable" class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                        <td>Empresa</td>
                        <td>Carrera</td>
                        <td>Puesto</td>
                        <td>Estado</td>
                        <td>Fecha inicial</td>
                        <td>Fecha límite</td>
                        <td>Salario</td>
                        <td>Modificar</td>
                        <td>Eliminar</td>
                        <td>Ver detalle</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($jobOfferDTOList as $jobOfferDTO) {
                        $status = ($jobOfferDTO->getUserName()!==null)?'Ocupada':'Disponible';
                        echo '<tr>';
                        echo '<td>' . $jobOfferDTO->getEnterpriseName() . '</td>';
                        echo '<td>' . $jobOfferDTO->getCareerName() . '</td>';
                        echo '<td>' . $jobOfferDTO->getJobPositionDescription() . '</td>';
                        echo '<td>' . $status . '</td>';
                        echo '<td>' . $jobOfferDTO->getStartDate() . '</td>';
                        echo '<td>' . $jobOfferDTO->getLimitDate() . '</td>';
                        echo '<td>' . $jobOfferDTO->getSalary() . '</td>'; ?>
                        <td>
                            <button class="btn btn-outline-success btn-lg" style="transform: rotate(0)">
                                <a href="<?php echo FRONT_ROOT ?>JobOffer/jobOfferForm?update=<?php echo $jobOfferDTO->getIdJobOffer() ?>"
                                   class="stretched-link btn-block btn-link text-black-50 text-decoration-none">Actualizar</a>
                            </button>
                        </td>
                        <td>
                            <form action="<?php echo FRONT_ROOT ?>JobOffer/deleteJobOffer">
                                <button class="btn btn-outline-danger btn-lg" style="transform: rotate(0)" type="submit" name="idJobOffer"
                                        value="<?php echo $jobOfferDTO->getIdJobOffer() ?>">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-outline-primary btn-lg" style="transform: rotate(0)">
                                <a href="<?php echo FRONT_ROOT ?>JobOffer/jobOfferDetails?details=<?php echo $jobOfferDTO->getIdJobOffer() ?>"
                                   class="stretched-link btn-block btn-link text-black-50 text-decoration-none">Ver Detalle</a>
                            </button>
                        </td></tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
            <script type="application/javascript">
                $(document).ready(function () {
                    $('#theTable').DataTable({});
                });
            </script>
        </div>
    </main>
<?php
require_once('companies.php');
require_once('contactForm.php');
?>