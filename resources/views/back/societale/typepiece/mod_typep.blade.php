@extends('partials/layouts_magso')
@section('style')
<style>
    body, h1, h2, form{
        font-family: "Arial";font-size: 13px;
    }
    h3{
        font-size: 20px;
    }
</style>
@section('content')
	 <script src="//unpkg.com/alpinejs" defer></script>
	 <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        
                        <div class="col-lg-8 col-8 offset-2">
             <form method="POST" autocomplete="on" action="{{ route('magso_mod_typep.update', $typep) }}">
              @csrf {{ method_field('PUT') }}
                <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Formulaire de modification des types de pièce</h3>
                                    </div>
                                </div>
                              </div>
                <div class="row text-center">
                                    @if (session('update'))
                                        <div class="alert alert-dark" role="alert">
                                          {{ session('update') }}
                                        </div>
                                    @endif
                </div> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="intitule">Intitulé</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer le nom de votre coopérative" value="{{old('nom') ?? $typep->nom}}" autofocus>
                  </div>
                </div>
                <!-- /.card-body -->
                 <div class="row">
                                  <div class="col-sm-4" style="margin-bottom: 1em;margin-top: 1em;"> 
                                    <button type="submit"  class=" btn btn-success">Sauvegarder</button>
                                  </div>
                                  <div class="col-sm-4"></div>
                                  <div class="col-sm-4 pull-right" style="text-align: right ;margin-top:10px">
                                        <a href="{{route('magso_typep_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Précédent</a>
                                  </div>
                              </div>
              </form>
          </div>
                    </div>
                   
                </div>
@stop