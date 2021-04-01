<?php
	
	/* Connect */
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tbldisc";
	$campos="*";
	// Se realiza consulta SELECT a la tabla con LIKE al nombre y al autor.
	$sWhere=" tbldisc.disc_name LIKE '%".$query."%' OR tbldisc.disc_author LIKE '%".$query."%' ";
	$sWhere.=" order by tbldisc.disc_name";
	
	
	include 'pagination.php'; //include pagination
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;

	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);

	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Disco</th>
						<th>Autor</th>
						<th class='text-center'>Stock</th>
						<th class='text-right'>Precio (dólares valida decimales)</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$disc_id=$row['id'];
							$disc_code=$row['disc_code'];
							$disc_name=$row['disc_name'];
							$disc_author=$row['disc_author'];
							$disc_qty=$row['disc_qty'];
							$price=$row['price'];						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $disc_code;?></td>
							<td ><?php echo $disc_name;?></td>
							<td ><?php echo $disc_author;?></td>
							<td class='text-center' ><?php echo $disc_qty;?></td>
							<td class='text-right'><?php echo number_format($price,2);?></td>
							<td>
								<a href="#"  data-target="#editDiscModal" class="edit" data-toggle="modal" data-code='<?php echo $disc_code;?>' data-name="<?php echo $disc_name?>" data-author="<?php echo $disc_author?>" data-stock="<?php echo $disc_qty?>" data-price="<?php echo $price;?>" data-id="<?php echo $disc_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteDiscModal" class="delete" data-toggle="modal" data-id="<?php echo $disc_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          