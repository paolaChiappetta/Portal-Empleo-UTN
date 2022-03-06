<?php
use Utility\AdminUtility as AdminUtility;

AdminUtility::checkSessionStatus($_SESSION['user']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/details?userEmail=<?php echo $_SESSION['user']->getEmail(); ?>">Mi cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>Enterprise/enterpriseList">Listar empresas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/jobOfferListView">Listar ofertas laborales</a>
            </li>
        </ul>
    </div>
</nav>

