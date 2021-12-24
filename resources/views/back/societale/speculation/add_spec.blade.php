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
             <form method="POST" autocomplete="on" action="{{ route('magso_add_spec.store') }}">
              @csrf
                <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Formulaire de modification de spéculation</h3>
                                    </div>
                                </div>
                              </div>
                <div class="row text-center">
                                    @if (session('confirmation-success'))
                                        <div class="alert alert-success">
                                        {{ session('confirmation-success') }}
                                        </div>
                                    @endif
                                     @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (session('confirmation-danger'))
                                        <div class="alert alert-danger">
                                            {!! session('confirmation-danger') !!}
                                        </div>
                                    @endif
                </div> 
                <div class="card-body">
                   <div class="form-group">
                    <label for="nom">Intitulé</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Canne à sucre ..." :value="old('nom')"  autofocus>
                  </div>
                <!-- /.card-body -->
                <div class="row">
                                  <div class="col-sm-4" style="margin-bottom: 1em;margin-top: 1em;"> 
                                    <button type="submit"  class=" btn btn-success">Sauvegarder</button>
                                  </div>
                                  <div class="col-sm-4"></div>
                                  <div class="col-sm-4 pull-right" style="text-align: right ;margin-top:10px">
                                        <a href="{{route('magso_spec_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Précédent</a>
                                  </div>
                              </div>
              </form>
          </div>
                    </div>
                   
                </div>
@stop