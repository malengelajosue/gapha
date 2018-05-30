<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Les types d'utilisateurs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('type/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('type/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('type'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
                <table id="example2" class="table table-bordered table-hover">
                     
            <tr>
                <th>No</th>
		<th>Nom</th>
		<th>Description</th>
		<th>Action</th>
            </tr><?php
            foreach ($typeutilisateur_data as $typeutilisateur)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $typeutilisateur->nom ?></td>
			<td><?php echo $typeutilisateur->description ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('type/read/'.$typeutilisateur->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('type/update/'.$typeutilisateur->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('type/delete/'.$typeutilisateur->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
                
                </div>
          </div>
                <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('type/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('type/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
      </div>
</section>
  
        
       
    
    </body>
</html>