@extends('layouts/layout')

@section('content')



<center>

	<div class="single-record">
		<table class="table table-striped">
			<thead>
				<th colspan="2" class="text-center"> <h2>{{$ingredient['intitule']}} (100g) </h2>  </th>				
			</thead>
			<tbody>
				@foreach($ingredient as $key => $value)	
					@if($key != 'intitule' && $key != 'id')
						<tr>
							<td> <strong>{{ucfirst($key)}} </strong></td>
							<td>{{$value}}</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>	

	</div>

<div class="button">
	<a href="{{route('ingredients.edit',$ingredient['id'])}}" class="btn btn-outline-warning">Modifer</a>
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
        &Ecirctes vous s&ucircre de vouloir supprimer l'ingredient "{{$ingredient['intitule']}}" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <form action="{{route('ingredients.destroy',$ingredient['id'])}}" method="POST" id="myForm">
			@csrf
			@method('delete')
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
@endsection

