@extends('layouts/layout')

@section('content')



<center>
<div class="card">
  <div class="card-header">
    <h2>{{$recette->intitule}}
  </div>
  <div class="card-body">
    <h5 class="card-title"><u>Ingredients :</u></h5>
    <ul class="liste">
  		@php $items = $recette->items(); @endphp
    	@if(!empty($items))
    		@foreach($items as $item)
    		<li> 
    			<span class="fst-italic">
    				{{$item['qte']}}g 
    				<a class="link-dark link" href="{{route('ingredients.show',$item['ingredient']->id)}}">
    					{{$item['ingredient']->intitule}}
    				</a> 	
    			</span>
  			
    		</li>

    		@endforeach
    </ul>
    	@endif    	
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ajouterIngredient">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
		    <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
		</svg> 
    </button>
  </div>
</div>


@if($recette->poids() > 0)
	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2>{{$recette->intitule}} (total) </h2>  </th>				
			</thead>
			<tbody>
					<tr>
						<td><strong>Energie</strong></td>
						<td>{{$recette->energie()}}</td>
					</tr>
					<tr>
						<td><strong>Proteines</strong></td>
						<td>{{$recette->proteines()}}</td>
					</tr>
					<tr>
						<td><strong>Glucides</strong></td>
						<td>{{$recette->glucides()}}</td>
					</tr>
					<tr>
						<td><strong>Lipides</strong></td>
						<td>{{$recette->lipides()}}</td>
					</tr>
					<tr>
						<td><strong>Fibres</strong></td>
						<td>{{$recette->fibres()}}</td>
					</tr>
					<tr>
						<td><strong>Prix</strong></td>
						<td>{{$recette->prix()}}</td>
					</tr>
					<tr>
						<td><strong>Poids</strong></td>
						<td>{{$recette->poids()}}</td>
					</tr>
			</tbody>
		</table>	

	</div>
@endif

<div class="button">
<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter2"> Modifier</button>
	&nbsp&nbsp	&nbsp&nbsp

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter1">
  Supprimer
</button>

</div>

@if($recette->poids() > 0)

	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2>{{$recette->intitule}} (100g) </h2>  </th>				
			</thead>
			<tbody>
					<tr>
						<td><strong>Energie</strong></td>
						<td>{{$recette->energie100g()}}</td>
					</tr>
					<tr>
						<td><strong>Proteines</strong></td>
						<td>{{$recette->proteines100g()}}</td>
					</tr>
					<tr>
						<td><strong>Glucides</strong></td>
						<td>{{$recette->glucides100g()}}</td>
					</tr>
					<tr>
						<td><strong>Lipides</strong></td>
						<td>{{$recette->lipides100g()}}</td>
					</tr>
					<tr>
						<td><strong>Fibres</strong></td>
						<td>{{$recette->fibres100g()}}</td>
					</tr>
					<tr>
						<td><strong>Prix</strong></td>
						<td>{{$recette->prix100g()}}</td>
					</tr>
			</tbody>
		</table>	
	</div>
<div class="button">
	<form action="{{route('recettes.add_as_ingredient',$recette->id)}}" method="POST">
		@csrf
		<button class="btn btn-outline-primary" type="submit">
			Ajouter autant qu'ingredient			
		</button>
	</form>
</div>
@endif
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
        &Ecirctes vous s&ucircre de vouloir supprimer la recette "{{$recette->intitule}}" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form action="{{route('recettes.destroy',$recette['id'])}}" method="POST" id="myForm">
					@csrf
					@method('delete')
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
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier le nom de la recette {{$recette->intitule}}:  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('recettes.update',$recette->id)}}" method="POST" id="myForm">
      	@csrf
      	@method('PATCH')
      	<div class="modal-body">
			<div class="form-group">
				<label for="intitule">Nom de la recette :</label>
				<input name="intitule" value="{{old('intitule')}}" type="text"  
					class=" form-control @error('intitule') is-invalid @enderror" required>
				@error('intitule')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror						
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
      <form action="{{route('recettes.add_ingredient',$recette->id)}}" method="POST" id="myForm">
      	@csrf
      	<div class="modal-body">
			<div class="form-group">
				<label for="id_ingredient">Veuillez choisir un ingredient :</label>
				<select name="id_ingredient" class=" form-control">
					@php $ingredients = $recette->nonUtilises(); @endphp
					@foreach($ingredients as $ingredient)
						<option value="{{$ingredient->id}}">
							{{ucfirst($ingredient->intitule)}}
						</option>	
					@endforeach
				</select>				
			</div>
			<div class="form-group">
				<label for="quantite">Veuillez entrer une quantite :</label>
				<input name="quantite" value="{{old('quantite')}}" type="number"  
					class=" form-control @error('quantite') is-invalid @enderror" required>
				@error('quantite')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror						
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

@endsection

