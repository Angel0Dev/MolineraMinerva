<?php include_once 'Views/template/header.php'; ?>

<!-- End Navbar -->
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
            </div>


<div class="section-description">
    <h3>Archivos Recientes</h3>
</div>
<div class="row">
    <?php foreach ($data['archivos'] as $archivo) { ?>
        <div class="col-md-6 mb-4">
            <div class="card file-manager-recent-item">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill"><?php echo $archivo['nombre']; ?></a>
                        <span class="p-h-sm">167kb</span>
                        <span class="p-h-sm text-muted">09.14.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-<?php echo $archivo['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-<?php echo $archivo['id']; ?>">
                            <li><a class="dropdown-item compartir" href="#" id="<?php echo $archivo['id']; ?>">Compartir</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL . 'Assets/archivos/' . $archivo['id_carpeta'] . '/' . $archivo['nombre']; ?>" download="<?php echo $archivo['nombre']; ?>">Descargar</a></li>
                            <li><a class="dropdown-item eliminar" href="#" data-id="<?php echo $archivo['id']; ?>">Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>
</div>

<?php
include_once 'Views/components/modal.php';
include_once 'Views/template/footer.php';
?>