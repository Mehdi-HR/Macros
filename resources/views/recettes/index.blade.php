@extends('layouts/layout')

@section('content')



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
			@foreach($recettes as $recette)
				<tr>
					<td class="align-middle">
						<a class = "btn btn-outline-dark" href="{{route('recettes.show',$recette->id)}}"> 
							{{ ucfirst($recette->intitule)}}
						</a>
					</td>
					<td class="align-middle text-center">{{$recette->energie()}}</td>
					<td class="align-middle text-center">{{$recette->proteines()}}</td>
					<td class="align-middle text-center">{{$recette->glucides()}}</td>
					<td class="align-middle text-center">{{$recette->lipides()}}</td>
					<td class="align-middle text-center">{{$recette->fibres()}}</td>
					<td class="align-middle text-center">{{$recette->poids()}}</td>
					<td class="align-middle text-center">{{$recette->prix()}}</td>
				</tr>
			@endforeach		
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
      <form action="{{route('recettes.store')}}" method="POST" id="myForm">
      	@csrf
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

</center>


@endsection