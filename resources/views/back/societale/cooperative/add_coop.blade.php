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
             <form method="POST" autocomplete="on" action="{{ route('magso_add_coop.store') }}">
              @csrf
                <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Formulaire d'enregistrement de coopérative</h3>
                                    </div>
                                </div>
                              </div>
                <div class="row text-center">
                                   @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                  @endif
                                                  @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                              <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                  @endif
                </div> 
                <div class="card-body">
                      <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="intitule">Intitule</label>
                                <input type="text" name="intitule" class="form-control" id="intitule" placeholder="Intitule" :value="old('intitule')"  autofocus>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input type="text" name="responsable" class="form-control" id="responsable" placeholder="Responsable" :value="old('responsable')" required autofocus>
                              </div>
                            </div>
                      </div>

                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="tel" name="contact" class="form-control" id="contact" placeholder="07 xxxxxxxx" :value="old('contact')" required autofocus>
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