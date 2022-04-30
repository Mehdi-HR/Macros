<?php $__env->startSection('content'); ?>



<center>
<div class="card">
  <div class="card-header">
    <h2><?php echo e($recette->intitule); ?>

  </div>
  <div class="card-body">
    <h5 class="card-title"><u>Ingredients :</u></h5>
    <ul class="liste">
  		<?php $items = $recette->items(); ?>
    	<?php if(!empty($items)): ?>
    		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<li> 
    			<span class="fst-italic">
    				<?php echo e($item['qte']); ?>g 
    				<a class="link-dark link" href="<?php echo e(route('ingredients.show',$item['ingredient']->id)); ?>">
    					<?php echo e($item['ingredient']->intitule); ?>

    				</a> 	
    			</span>
  			
    		</li>

    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    	<?php endif; ?>    	
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ajouterIngredient">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
		    <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
		</svg> 
    </button>
  </div>
</div>


<?php if($recette->poids() > 0): ?>
	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2><?php echo e($recette->intitule); ?> (total) </h2>  </th>				
			</thead>
			<tbody>
					<tr>
						<td><strong>Energie</strong></td>
						<td><?php echo e($recette->energie()); ?></td>
					</tr>
					<tr>
						<td><strong>Proteines</strong></td>
						<td><?php echo e($recette->proteines()); ?></td>
					</tr>
					<tr>
						<td><strong>Glucides</strong></td>
						<td><?php echo e($recette->glucides()); ?></td>
					</tr>
					<tr>
						<td><strong>Lipides</strong></td>
						<td><?php echo e($recette->lipides()); ?></td>
					</tr>
					<tr>
						<td><strong>Fibres</strong></td>
						<td><?php echo e($recette->fibres()); ?></td>
					</tr>
					<tr>
						<td><strong>Prix</strong></td>
						<td><?php echo e($recette->prix()); ?></td>
					</tr>
					<tr>
						<td><strong>Poids</strong></td>
						<td><?php echo e($recette->poids()); ?></td>
					</tr>
			</tbody>
		</table>	

	</div>
<?php endif; ?>

<div class="button">
<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter2"> Modifier</button>
	&nbsp&nbsp	&nbsp&nbsp

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter1">
  Supprimer
</button>

</div>

<?php if($recette->poids() > 0): ?>

	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2><?php echo e($recette->intitule); ?> (100g) </h2>  </th>				
			</thead>
			<tbody>
					<tr>
						<td><strong>Energie</strong></td>
						<td><?php echo e($recette->energie100g()); ?></td>
					</tr>
					<tr>
						<td><strong>Proteines</strong></td>
						<td><?php echo e($recette->proteines100g()); ?></td>
					</tr>
					<tr>
						<td><strong>Glucides</strong></td>
						<td><?php echo e($recette->glucides100g()); ?></td>
					</tr>
					<tr>
						<td><strong>Lipides</strong></td>
						<td><?php echo e($recette->lipides100g()); ?></td>
					</tr>
					<tr>
						<td><strong>Fibres</strong></td>
						<td><?php echo e($recette->fibres100g()); ?></td>
					</tr>
					<tr>
						<td><strong>Prix</strong></td>
						<td><?php echo e($recette->prix100g()); ?></td>
					</tr>
			</tbody>
		</table>	
	</div>
<div class="button">
	<form action="<?php echo e(route('recettes.add_as_ingredient',$recette->id)); ?>" method="POST">
		<?php echo csrf_field(); ?>
		<button class="btn btn-outline-primary" type="submit">
			Ajouter autant qu'ingredient			
		</button>
	</form>
</div>
<?php endif; ?>
<!-- Modal1 -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">&Ecirctes vous s&ucircre ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        &Ecirctes vous s&ucircre de vouloir supprimer la recette "<?php echo e($recette->intitule); ?>" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form action="<?php echo e(route('recettes.destroy',$recette['id'])); ?>" method="POST" id="myForm">
					<?php echo csrf_field(); ?>
					<?php echo method_field('delete'); ?>
	        <button type="submit" class="btn btn-primary" id="submitBtn" >Continuer</button>    	
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier le nom de la recette <?php echo e($recette->intitule); ?>:  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('recettes.update',$recette->id)); ?>" method="POST" id="myForm">
      	<?php echo csrf_field(); ?>
      	<?php echo method_field('PATCH'); ?>
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

  <!-- Modal3 -->
<div class="modal fade" id="ajouterIngredient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un ingredient : </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('recettes.add_ingredient',$recette->id)); ?>" method="POST" id="myForm">
      	<?php echo csrf_field(); ?>
      	<div class="modal-body">
			<div class="form-group">
				<label for="id_ingredient">Veuillez choisir un ingredient :</label>
				<select name="id_ingredient" class=" form-control">
					<?php $ingredients = $recette->nonUtilises(); ?>
					<?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($ingredient->id); ?>">
							<?php echo e(ucfirst($ingredient->intitule)); ?>

						</option>	
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>				
			</div>
			<div class="form-group">
				<label for="quantite">Veuillez entrer une quantite :</label>
				<input name="quantite" value="<?php echo e(old('quantite')); ?>" type="number"  
					class=" form-control <?php $__errorArgs = ['quantite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
				<?php $__errorArgs = ['quantite'];
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
		        <button type="submit" class="btn btn-primary" id="submitBtn" >Ajouter</button>    	
	      </div>
      </form>


    </div>
    </div>
  </div>


</div>

</center>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/recettes/show.blade.php ENDPATH**/ ?>