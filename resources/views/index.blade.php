 @extends('layouts.base')
 @section('content')
 <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Personnes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/personne">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
                </ol>
                    @if(Session::has('delete_personne'))                                        
                        <div class="alert alert-success">
                            {{Session::get('update_personne')}}
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="addPersonne" class="btn btn-primary">Ajouter une personne</a>   
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des personnes ressources
                            </div>
                            <div class="card-body">
                                @if(Session()->has("successDelete"))
                                <div class="alert alert-success">
                                    <h3> {{$Session()->get("successDelete")}} </h3>
                                </div>
                                @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Prenom</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Fonction</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($personnes as $personne)
                                        <tr>
                                            <td>{{ $personne->id}}</td>
                                            <td>{{ $personne->prenom}}</td>
                                            <td>{{ $personne->nom}}</td>
                                            <td>{{ $personne->email}}</td>
                                        
                                            <td>{{ $personne->Fonction->libelle}}</td>
                                        
                                            <td>
                                            <a href="/edit-personne/{{$personne->id}}" class="btn btn-info">Editer</a>
                                            </td>
                                            
                                        <td>
                                    <a href="/delete-personne/{{$personne->id}}}" class="btn btn-danger"> Supprimer</a>

                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

