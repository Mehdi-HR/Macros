<?php $__env->startSection('content'); ?>



<center>

	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2><?php echo e($ingredient['intitule']); ?> (100g) </h2>  </th>				
			</thead>
			<tbody>
				<?php $__currentLoopData = $ingredient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
					<?php if($key != 'intitule' && $key != 'id'): ?>
						<tr>
							<td> <strong><?php echo e(ucfirst($key)); ?> </strong></td>
							<td><?php echo e($value); ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>	

	</div>

<div class="button">
	<a href="<?php echo e(route('ingredients.edit',$ingredient['id'])); ?>" class="btn btn-outline-warning">Modifer</a>
	&nbsp&nbsp	&nbsp&nbsp


<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
  Supprimer
</button>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">&Ecirctes vous s&ucircre ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        &Ecirctes vous s&ucircre de vouloir supprimer l'ingredient "<?php echo e($ingredient['intitule']); ?>" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form action="<?php echo e(route('ingredients.destroy',$ingredient['id'])); ?>" method="POST" id="myForm">
			<?php echo csrf_field(); ?>
			<?php echo method_field('delete'); ?>
	        <button type="button" class="btn btn-primary" id="submitBtn" >Continuer</button>    	
        </form>
      </div>
    </div>
  </div>
</div>

</center>
<script>
$(document).ready(function(){
    $("#submitBtn").click(function(){        
        $("#myForm").submit(); // Submit the form
    });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/ingredients/show.blade.php ENDPATH**/ ?>