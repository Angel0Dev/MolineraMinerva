<?php include_once 'Views/template/header.php'; ?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="mailbox-container">
                        <div class="card">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="mailbox-list col-xl-3">
                                        <ul class="list-unstyled">
                                            <?php foreach ($data['archivos'] as $archivo) { ?>
                                            <li class="mailbox-list-item">
                                                <a href="#" id="<?php echo $archivo['id']; ?>" class="compartidos">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                    <img src="<?php echo BASE_URL . 'Assets/img/team-4.jpg'; ?>" alt="">
                                                    <div class="mailbox-list-item-content">
                                                        <span class="mailbox-list-item-title">
                                                            <?php echo $archivo['nombre']; ?>
                                                        </span>
                                                        <p class="mailbox-list-item-text">
                                                        <?php echo $archivo['archivo']; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="mailbox-open-content col-xl-9" id="content-info">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Views/template/footer.php'; ?>