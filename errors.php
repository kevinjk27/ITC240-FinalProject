<?php 

if(count($errors) > 0 ): ?>

<?php
// run a foreach loop to indetify the errors

foreach($errors as $error) : ?>


<p style="color:red";><?php echo $error;?></p>



<?php endforeach?>
<?php endif ?>