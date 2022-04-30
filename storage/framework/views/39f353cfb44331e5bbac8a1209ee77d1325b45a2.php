<?php $__env->startSection('content'); ?>



<center>
	<br>
<div class="tableFixHead">
	
	<table class="table table-striped"> 
		<thead>
			<th class="head" scope="col"> Ingredient(100g) </th>
			<th class="head text-center" scope="col"> Energie (Kcal)</th>
			<th class="head text-center" scope="col"> Proteines </th>
			<th class="head text-center" scope="col"> Glucides </th>
			<th class="head text-center" scope="col"> Lipides </th>
			<th class="head text-center" scope="col"> Fibres </th>
			<th class="head text-center" scope="col"> Prix (Dhs)</th>

		</thead>
		<tbody>
			<?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="align-middle"> 
						<a class = "btn btn-outline-dark" href="<?php echo e(route('ingredients.show',$ingredient->id)); ?>"> 
							<?php echo e(ucfirst($ingredient->intitule)); ?>

						</a>
					</td>
					<td class="align-middle text-center"><?php echo e($ingredient->energie); ?></td>
					<td class="align-middle text-center"><?php echo e($ingredient->proteines); ?></td>
					<td class="align-middle text-center"><?php echo e($ingredient->glucides); ?></td>
					<td class="align-middle text-center"><?php echo e($ingredient->lipides); ?></td>
					<td class="align-middle text-center"><?php echo e($ingredient->fibres); ?></td>
					<td class="align-middle text-center"><?php echo e($ingredient->prix); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
		</tbody>
			<tfoot>
				<tr>
					<td class="align-middle text-center">
						<div class="text-center button">
							<a href="<?php echo e(route('ingredients.create')); ?>" class="btn btn-outline-primary">						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
												  <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
												</svg></a>
						</div>
					</td>
				</tr>
			</tfoot>	
	</table>

</div>	



</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/ingredients/index.blade.php ENDPATH**/ ?>