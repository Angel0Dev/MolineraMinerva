<?php include_once 'Views/template/header.php'; ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>Panel de archivos</h1>
                        </div>
                        <div class="page-description-actions">
                            <a href="#" class="btn btn-primary" id="btnUpload"><i class="material-icons">add</i>Subir archivo o carpeta</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <?php foreach ($data['carpetas'] as $carpeta) { ?>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">folder</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <a href="#" style="cursor: pointer;" id="<?php echo $carpeta['id']; ?>" class="text-sm mb-0 text-capitalize carpetas"><?php echo $carpeta['nombre']; ?></a>
                                        <h4 class="mb-0"><?php echo $carpeta['fecha']; ?></h4>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">15GB </span>de uso de espacio</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-end">
                    <?php
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    ?>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <?php if ($data['pagina'] > 1) { ?>
                            <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'archivos/pagina/' . $anterior; ?>">Anterior</a>
                        <?php }
                        if ($data['pagina'] < $data['total']) { ?>
                            <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'archivos/pagina/' . $siguiente; ?>">Siguiente</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Views/components/modal.php';
include_once 'Views/template/footer.php';
?>