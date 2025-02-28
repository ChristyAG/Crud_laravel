@extends("layout.master")
 @section("contenu")
 <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h3 class="border-bottom border-gray pb-2 mb-4">Ajouter un nouvel étudiant</h3>
    <div class="mt-4">

       @if(session()->has("success"))
       {{ session() ->get('success')}}
       @endif

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    <form Action="{{route('etudiant.ajouter')}}" method="post">

        @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Classe</label>
    <select  class="form-control" name="classe_id">
        <option value=""></option>

        @foreach($classes as $classe)
        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
  <a href="{{route('etudiant')}}"class="btn btn-danger">Annuler</a>
</form>
    </div>
    
    </div>
 @endsection