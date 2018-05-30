<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">APPROVISIONNER</h3>

    </div>
    <div class="box-body">
        
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">Article <?php echo form_error('idArticle') ?></label>
                
                <select type="text" class="form-control" name="idArticle" id="idArticle" placeholder="IdArticle" value="<?php echo $idArticle; ?>" >
                    <?php foreach ($listeArticles as $a):?>
                    <option value="<?=$a->id ?>"><?= $a->designation ?></option>
                    <?php endforeach;?>
                </select>
            </div>
           
            <div class="form-group">
                <label for="int">Quantite <?php echo form_error('quantite') ?></label>
                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Quantite" value="<?php echo $quantite; ?>" />
            </div>
            <div class="form-group">
              
                <input type="hidden" class="form-control" name="dateAppro" id="dateAppro" placeholder="DateAppro" value="<?php echo $dateAppro; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('approvisionnement') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
