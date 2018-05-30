<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT D'UN FOURNISSEUR</h3>

    </div>
    <div class="box-body">
        <h2 style="margin-top:0px">Fournisseur <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nom <?php echo form_error('nom') ?></label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tel <?php echo form_error('tel') ?></label>
            <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel" value="<?php echo $tel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Adresse <?php echo form_error('adresse') ?></label>
            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo $adresse; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomResponsable <?php echo form_error('nomResponsable') ?></label>
            <input type="text" class="form-control" name="nomResponsable" id="nomResponsable" placeholder="NomResponsable" value="<?php echo $nomResponsable; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fournisseur') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
    