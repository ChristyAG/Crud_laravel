@extends("layout.master")
@section("contenu")
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h3 class="border-bottom border-gray pb-2 mb-4">modifier un étudiant</h3>
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
        <form Action="{{route('etudiant.update', ['etudiant' =>$etudiant->id])}}" method="post">

            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Classe</label>
                <select class="form-control" name="classe_id">
                    <option value=""></option>

                    @foreach($classes as $classe)
                    @if($classe->id == $etudiant->classe_id)
                    <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                    @else
                    <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>

</div>
@endsection