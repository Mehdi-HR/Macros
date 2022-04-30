<?php $__env->startSection('content'); ?>



<center>
	<br>
<div class="tableFixHead">
	
	<table class="table table-striped"> 
		<thead>
			<th class="head" scope="col" > Recette </th>
			<th class="head text-center" scope="col"> Energie (Kcal)</th>
			<th class="head text-center" scope="col"> Proteines </th>
			<th class="head text-center" scope="col"> Glucides </th>
			<th class="head text-center" scope="col"> Lipides </th>
			<th class="head text-center" scope="col"> Fibres </th>
			<th class="head text-center" scope="col"> Poids </th>
			<th class="head text-center" scope="col"> Prix (Dhs)</th>

		</thead>
		<tbody>
			<?php $__currentLoopData = $recettes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recette): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="align-middle">
						<a class = "btn btn-outline-dark" href="<?php echo e(route('recettes.show',$recette->id)); ?>"> 
							<?php echo e(ucfirst($recette->intitule)); ?>

						</a>
					</td>
					<td class="align-middle text-center"><?php echo e($recette->energie()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->proteines()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->glucides()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->lipides()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->fibres()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->poids()); ?></td>
					<td class="align-middle text-center"><?php echo e($recette->prix()); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
		</tbody>
		<tfoot>
			<tr>
				<td class="align-middle text-center">
                  <div class="button">
					<button class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
						  <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
						</svg>
					</button>
				</div>
				</td>
			</tr>
		</tfoot>			
	</table>
</div>	

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une recette </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('recettes.store')); ?>" method="POST" id="myForm">
      	<?php echo csrf_field(); ?>
      	<div class="modal-body">
			<div class="form-group">
				<label for="intitule">Nom de la recette :</label>
				<input name="intitule" value="<?php echo e(old('intitule')); ?>" type="text"  
					class=" form-control <?php $__errorArgs = ['intitule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
				<?php $__errorArgs = ['intitule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				    <div class="alert alert-danger"><?php echo e($message); ?></div>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>						
			</div>      	
		</div>	
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
		        <button type="submit" class="btn btn-primary" id="submitBtn" >Valider</button>    	
	      </div>
      </form>


    </div>
  </div>
</div>

</center>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/recettes/index.blade.php ENDPATH**/ ?>