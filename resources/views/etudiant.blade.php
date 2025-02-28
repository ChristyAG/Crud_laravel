<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Offcanvas template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/offcanvas/">


<link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
 
    <link href="{{ asset ('css/offcanvas.css') }}" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="#">Crud étudiant</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="#">Etudiant</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<main role="main" class="container">

</div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="{{ asset ('js/vendor/jquery.slim.min.js') }}"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="{{ asset ('js/offcanvas.js') }}"></script></body>
</html> -->

@extends("layout.master")
@section("contenu")
<div class="my-3 p-3 bg-white rounded shadow-sm">
  <h3 class="border-bottom border-gray pb-2 mb-4">Liste des étudiants inscrit</h3>
  <div class="mt-4">
    <div class="d-flex justify-content-between mb-4">
      {{ $etudiants->links() }}
      <div><a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un nouvel étudiant</a></div>
    </div>
    @if(session()->has("successDelete"))
       {{ session() ->get('successDelete')}}
       @endif

    <table class="table table-bordered table-hover mt-2">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Classe</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($etudiants as $etudiant)
        <tr>
          <th scope="row">{{$loop->index}}</th>
          <td>{{$etudiant->nom}}</td>
          <td>{{$etudiant->prenom}}</td>
          <td>{{$etudiant->classe->libelle}}</td>
          <td>
            <a class="btn btn-info" href="{{ route ('etudiant.edit',['etudiant'=>$etudiant->id]) }}">Modifier</a>
            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vtraiment supprimer cet étudiant ?'))
            {document.getElementById('form-{{ $etudiant->id }}').submit()}" >Supprimer</a>

            <form id="form-{{ $etudiant->id }}" action="{{ route('etudiant.supprimer', ['etudiant'=>$etudiant->id]) }}" method="post">
              @csrf
              <input type="hidden" name="_method" value="delete">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection