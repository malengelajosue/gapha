<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT D'UN UTILISATEUR</h3>

    </div>
    <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Matricule <?php echo form_error('matricule') ?></label>
                <input type="text" class="form-control" name="matricule" id="matricule" placeholder="Le matricule de l'agent" value="<?php echo $matricule; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nom <?php echo form_error('nom') ?></label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Prenom <?php echo form_error('prenom') ?></label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo $prenom; ?>" />
            </div>
         
            <div class="form-group">
                <label for="varchar">Tel <?php echo form_error('tel') ?></label>
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel" value="<?php echo $tel; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('pwd') ?></label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" value="<?php echo $pwd; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password confirmation <?php echo form_error('confpwd') ?></label>
                <input type="password" class="form-control" name="confpwd" id="pwd" placeholder="Password confirmation" value="<?php echo $pwd; ?>" />
            </div>
            <div class="form-group">
                <label for="int">Type <?php echo form_error('idType') ?></label>
                <select type="text" class="form-control" name="idType" id="idType" placeholder="IdType" value="<?php echo $idType; ?>" >
                    <?php foreach ($listeTypes as $t):?>
                    <option value="<?=$t->id?>"><?=$t->nom?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('utilisateur') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>


