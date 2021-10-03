@extends('layouts.base')
 @section('content')
 <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ajout de personne</h1>
            <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/personne">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="personne" class="btn btn-primary">Liste des personne</a>
                        
                    </div>
                </div>
                <div class="card mb-4">    
                    <div class="card-body">
            <form action="{{route('create-personne')}}" method="post">
                @csrf
                @if(Session::has('success'))                                        
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::has('fail'))                                       
                        <div class="alert alert-success">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Enter votre prenom">
                </div>

                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Enter votre nom">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter votre email">
                </div>

                <div class="form-group">
                    <label for="form-control">Fonction</label> <br>
                    <select name="fonction_id" for="form-control">
                        <option value="">Veillez choisir</option>
                        @foreach ($fonctions as $fonction)
                        <option value="{{ $fonction->id }}">{{ $fonction->libelle}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">Valider</button>
                </div>        
            </form>
            </div>
    </div>
</main>
@endsection