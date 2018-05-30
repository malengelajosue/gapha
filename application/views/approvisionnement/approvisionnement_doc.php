
        <h2>Approvisionnement List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdArticle</th>
		<th>IdUtilisateur</th>
		<th>Quantite</th>
		<th>DateAppro</th>
		
            </tr><?php
            foreach ($approvisionnement_data as $approvisionnement)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $approvisionnement->idArticle ?></td>
		      <td><?php echo $approvisionnement->idUtilisateur ?></td>
		      <td><?php echo $approvisionnement->quantite ?></td>
		      <td><?php echo $approvisionnement->dateAppro ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
