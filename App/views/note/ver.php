<div class="container">
    <div class="row">
        <div class="col s12">
        <h2 class="header"><?php echo $data['registros']['id']; ?> - <?php echo $data['registros']['titulo']; ?></h2>
        <div class="card">
            <div class="card-image">
            <img src="<?php echo URL_BASE; ?>/uploads/<?php echo $data['registros']['imagem']; ?>" width="600" alt="imagem"/>
            </div>
            <div class="card-content">
            <p><?php echo $data['registros']['texto']; ?></p>
            </div>
        </div>
        </div>
    </div>
</div>