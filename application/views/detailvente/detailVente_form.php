<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT D'UNE VENTE</h3>

    </div>
    <div class="box-body">

        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">NumFacture <?php echo form_error('numFacture') ?></label>
                <input type="text" class="form-control" name="numFacture" id="numFacture" placeholder="NumFacture" disabled="disabled" value="<?php echo $numFacture; ?>" />
            </div>
            <div class="form-group">
                <label for="int">Article <?php echo form_error('idArticle') ?></label>
                <select type="text" class="form-control" name="idArticle" id="idArticle" placeholder="IdArticle" value="<?php echo $idArticle; ?>" ></select>
            </div>
            <div class="form-group">
                <label for="int">Client <?php echo form_error('idClient') ?></label>
                <select type="text" class="form-control" name="idClient" id="idClient" placeholder="IdClient" value="<?php echo $idClient; ?>" ></select>
            </div>
            <div class="form-group">
                <label for="int">Quantite <?php echo form_error('quantite') ?></label>
                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Quantite" value="<?php echo $quantite; ?>" />
            </div>
            <div class="form-group">
                <label for="double">Total <?php echo form_error('total') ?></label>
                <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
            </div>
            <div class="form-group">
                <label for="date">DateVente <?php echo form_error('dateVente') ?></label>
                <input type="text" class="form-control" name="dateVente" id="dateVente" placeholder="DateVente" value="<?php echo $dateVente; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('vente') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>