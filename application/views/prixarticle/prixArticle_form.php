<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajout d'un prix</h3>

    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Article <?php echo form_error('idArticle') ?></label>
            <select type="text" class="form-control" name="idArticle" id="idArticle" placeholder="IdArticle" value="<?php echo $idArticle; ?>" >
                <?php foreach ($listeArticles as $a):?>
                <option value="<?=$a->id?>"><?= $a->designation ?></option> 
                <?php endforeach;?>
            </select>
        </div>
	    <div class="form-group">
            <label for="double">Prix <?php echo form_error('prix') ?></label>
            <input type="text" class="form-control" name="prix" id="prix" placeholder="Prix" value="<?php echo $prix; ?>" />
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="dateFixation" id="dateFixation" placeholder="DateFixation" value="<?php echo $dateFixation; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('prix') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>