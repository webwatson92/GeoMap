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
             <form method="POST" autocomplete="on" action="{{ route('magso_mod_coop.update', $cooperative) }}">
              @csrf {{ method_field('PUT') }}
                <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Formulaire de modification de coopérative</h3>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="intitule">Intitulé</label>
                              <input type="text" name="intitule" class="form-control" id="intitule" placeholder="Entrer le nom de votre coopérative" value="{{old('intitule') ?? $cooperative->intitule}}" autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input type="text" name="responsable" class="form-control" id="responsable" placeholder="Entrer un responsable" value="{{old('responsable') ?? $cooperative->responsable}}"  autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div>
                              <label for="contact">Contact</label>
                              <input type="text" name="contact" class="form-control" id="contact" placeholder="Entrer un nom" value="{{old('contact') ?? $cooperative->contact}}" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="row">
                                  <div class="col-sm-4" style="margin-bottom: 1em;margin-top: 1em;"> 
                                    <button type="submit"  class=" btn btn-success">Sauvegarder</button>
                                  </div>
                                  <div class="col-sm-4"></div>
                                  <div class="col-sm-4 pull-right" style="text-align: right ;margin-top:10px">
                                        <a href="{{route('magso_coop_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Précédent</a>
                                  </div>
                              </div>
              </form>
          </div>
                    </div>
                   
                </div>
@stop