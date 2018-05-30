
        <h2>Fournisseur List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nom</th>
		<th>Tel</th>
		<th>Email</th>
		<th>Adresse</th>
		<th>NomResponsable</th>
		
            </tr><?php
            foreach ($fournisseur_data as $fournisseur)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $fournisseur->nom ?></td>
		      <td><?php echo $fournisseur->tel ?></td>
		      <td><?php echo $fournisseur->email ?></td>
		      <td><?php echo $fournisseur->adresse ?></td>
		      <td><?php echo $fournisseur->nomResponsable ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
  