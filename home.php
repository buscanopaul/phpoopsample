<?php require_once 'controllers/home.controller.php'; ?>
<?php include 'templates/header.php'; ?>


<div class="container">
  <h2>TABLE</h2>



  
  
    <p><h4>Hi,  <?php echo $user->data()->name; ?></h4></p>




  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>AGE</th>
      </tr>
    </thead>
    <a href="add.php"<button class="btn btn-success">ADD</button></a>&nbsp;
    <a href="logout.php"<button class="btn btn-default">Logout</button></a>
    <tbody>
    	<?php if($customers->count()): ?>
    <?php $c = 0; ?>
		<?php foreach($customers->results() as $customersData): ?>
		<tr>
		<td><?php echo escape($customersData->id); ?></td>
		<td><?php echo escape($customersData->firstname); ?></td>
		<td><?php echo escape($customersData->lastname); ?></td>
		<td><?php echo escape($customersData->age); ?></td>

    <?php $c++; ?>


	
    		<form action="edit.php" method="post">
    			<input type="hidden" value="<?php echo escape($customersData->id); ?>" name="id">
    			<input type="hidden" value="<?php echo escape($customersData->firstname); ?>" name="firstname">
    			<input type="hidden" value="<?php echo escape($customersData->lastname); ?>" name="lastname">
    			<input type="hidden" value="<?php echo escape($customersData->age); ?>" name="age">
    		<td><button  class="btn btn-warning" type="submit" name="edit">EDIT</button></td>
    			
    		
    		</form>

        <form action="delete.php" method="post">
          <input type="hidden" value="<?php echo escape($customersData->id); ?>" name="id">
          <input type="hidden" value="<?php echo escape($customersData->firstname); ?>" name="firstname">
          <input type="hidden" value="<?php echo escape($customersData->lastname); ?>" name="lastname">
          <input type="hidden" value="<?php echo escape($customersData->age); ?>" name="age">
        <td><button  class="btn btn-default" type="submit" name="delete">DELETE</button></td>

        </form>
	
    </tr>

     

      	
      <?php endforeach; ?>
      <?php endif; ?>

      

    </tbody>


  </table>

</div>


       <p>ITEMS:<h3> <?php echo $c; ?> </h3></p>
      


 







<?php require_once 'templates/footer.php'; ?>
