<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>DetailVente List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NumFacture</th>
		<th>IdArticle</th>
		<th>IdClient</th>
		<th>Quantite</th>
		<th>Total</th>
		<th>DateVente</th>
		
            </tr><?php
            foreach ($detailvente_data as $detailvente)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detailvente->numFacture ?></td>
		      <td><?php echo $detailvente->idArticle ?></td>
		      <td><?php echo $detailvente->idClient ?></td>
		      <td><?php echo $detailvente->quantite ?></td>
		      <td><?php echo $detailvente->total ?></td>
		      <td><?php echo $detailvente->dateVente ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>