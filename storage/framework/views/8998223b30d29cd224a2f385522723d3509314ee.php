<?php $__env->startSection('content'); ?>



<center>
	<br>
	<h1>Modifier  l'ingredient : <?php echo e($ingredient->intitule); ?>(100g):</h1>
	<br>
</center>
	<form action="<?php echo e(route('ingredients.update',$ingredient->id)); ?>" id="myForm" 
		class="myForm" method="post">
		<?php echo csrf_field(); ?>
		<?php echo method_field('patch'); ?>
		<div class="form-group">
			<label for="intitule">Intitul&eacute</label>
			<input name="intitule" value="<?php echo e(old('intitule') ?? $ingredient->intitule); ?>" type="text" 
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

		<br>
		
		<div class="form-group">
			<label for="energie">Valeur &eacutenerg&eacutetique (Kcal)</label>
			<input name="energie" value="<?php echo e(old('energie') ?? $ingredient->energie); ?>" type="number" 
				class="form-control <?php $__errorArgs = ['energie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
			<?php $__errorArgs = ['energie'];
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
		
		<br>
		
		<div class="form-group">
			<label for="proteines">Proteines</label>
			<input name="proteines" value="<?php echo e(old('proteines') ?? $ingredient->proteines); ?>" type="number"  
				class="form-control <?php $__errorArgs = ['proteines'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
			<?php $__errorArgs = ['proteines'];
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
		<br>

		<div class="form-group">
			<label for="glucides">Glucides</label>
			<input name="glucides" value="<?php echo e(old('glucides') ?? $ingredient->glucides); ?>" type="number" 
				class="form-control <?php $__errorArgs = ['glucides'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
			<?php $__errorArgs = ['glucides'];
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
		<br>
		<div class="form-group">
			<label for="lipides">Lipides </label>
			<input name="lipides" value="<?php echo e(old('lipides') ?? $ingredient->lipides); ?>" type="number"
				class="form-control <?php $__errorArgs = ['lipides'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>			
			<?php $__errorArgs = ['lipides'];
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
		<br>
		<div class="form-group">
			<label for="fibres">Fibres alimentaires</label>
			<input name="fibres" value="<?php echo e(old('fibres') ?? $ingredient->fibres); ?>" type="number"  
				class="form-control <?php $__errorArgs = ['fibres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>	
			<?php $__errorArgs = ['fibres'];
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
		<br>
		<div class="form-group">
			<label for="prix">Prix</label>
			<input name="prix" value="<?php echo e(old('prix') ?? $ingredient->prix); ?>" type="number" 
				class="form-control <?php $__errorArgs = ['prix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>	
			<?php $__errorArgs = ['prix'];
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
		<br>

		<div class="submit-button">
			<button onClick ="document.getElementById('myForm').submit()" type="submit" class="btn-md btn btn-outline-primary float-right">Valider</button>
		</div>
	</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/macros/resources/views/ingredients/edit.blade.php ENDPATH**/ ?>