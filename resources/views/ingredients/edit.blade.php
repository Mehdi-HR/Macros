@extends('layouts/layout')

@section('content')



<center>
	<br>
	<h1>Modifier  l'ingredient : {{$ingredient->intitule}}(100g):</h1>
	<br>
</center>
	<form action="{{route('ingredients.update',$ingredient->id)}}" id="myForm" 
		class="myForm" method="post">
		@csrf
		@method('patch')
		<div class="form-group">
			<label for="intitule">Intitul&eacute</label>
			<input name="intitule" value="{{ old('intitule') ?? $ingredient->intitule }}" type="text" 
				class=" form-control @error('intitule') is-invalid @enderror" required>
			@error('intitule')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror						
		</div>

		<br>
		
		<div class="form-group">
			<label for="energie">Valeur &eacutenerg&eacutetique (Kcal)</label>
			<input name="energie" value="{{ old('energie') ?? $ingredient->energie }}" type="number" 
				class="form-control @error('energie') is-invalid @enderror" required>
			@error('energie')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror			
		</div>
		
		<br>
		
		<div class="form-group">
			<label for="proteines">Proteines</label>
			<input name="proteines" value="{{ old('proteines') ?? $ingredient->proteines }}" type="number"  
				class="form-control @error('proteines') is-invalid @enderror" required>
			@error('proteines')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror			
		</div>
		<br>

		<div class="form-group">
			<label for="glucides">Glucides</label>
			<input name="glucides" value="{{ old('glucides') ?? $ingredient->glucides }}" type="number" 
				class="form-control @error('glucides') is-invalid @enderror" required>
			@error('glucides')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror				
		</div>
		<br>
		<div class="form-group">
			<label for="lipides">Lipides </label>
			<input name="lipides" value="{{ old('lipides') ?? $ingredient->lipides }}" type="number"
				class="form-control @error('lipides') is-invalid @enderror" required>			
			@error('lipides')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror	
		</div>
		<br>
		<div class="form-group">
			<label for="fibres">Fibres alimentaires</label>
			<input name="fibres" value="{{ old('fibres') ?? $ingredient->fibres }}" type="number"  
				class="form-control @error('fibres') is-invalid @enderror" required>	
			@error('fibres')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror			
		</div>
		<br>
		<div class="form-group">
			<label for="prix">Prix</label>
			<input name="prix" value="{{ old('prix') ?? $ingredient->prix }}" type="number" 
				class="form-control @error('prix') is-invalid @enderror" required>	
			@error('prix')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror					
		</div>
		<br>

		<div class="submit-button">
			<button onClick ="document.getElementById('myForm').submit()" type="submit" class="btn-md btn btn-outline-primary float-right">Valider</button>
		</div>
	</form>



@endsection