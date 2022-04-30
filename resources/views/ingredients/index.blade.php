@extends('layouts/layout')

@section('content')



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
			@foreach($ingredients as $ingredient)
				<tr>
					<td class="align-middle"> 
						<a class = "btn btn-outline-dark" href="{{route('ingredients.show',$ingredient->id)}}"> 
							{{ ucfirst($ingredient->intitule)}}
						</a>
					</td>
					<td class="align-middle text-center">{{$ingredient->energie}}</td>
					<td class="align-middle text-center">{{$ingredient->proteines}}</td>
					<td class="align-middle text-center">{{$ingredient->glucides}}</td>
					<td class="align-middle text-center">{{$ingredient->lipides}}</td>
					<td class="align-middle text-center">{{$ingredient->fibres}}</td>
					<td class="align-middle text-center">{{$ingredient->prix}}</td>
				</tr>
			@endforeach		
		</tbody>
			<tfoot>
				<tr>
					<td class="align-middle text-center">
						<div class="text-center button">
							<a href="{{route('ingredients.create')}}" class="btn btn-outline-primary">						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
												  <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
												</svg></a>
						</div>
					</td>
				</tr>
			</tfoot>	
	</table>

</div>	



</center>
@endsection