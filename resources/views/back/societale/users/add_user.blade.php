@extends('partials/layouts_magso', ['title' => 'Ajouter un membre'])
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
                            <form method="POST" autocomplete="on" action="{{ route('magso_add_list.store') }}" enctype="multipart/form-data">
                             @csrf
                              <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Enregistrement d'un utilisateur</h3>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
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
                                          <label for="name"  class="sr-only">Nom</label>
                                          <input type="text" name="name" class="form-control" id="name" placeholder="Entrer un nom" :value="old('name')" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="email" class="sr-only">Email</label>
                                          <input type="email" name="email" class="form-control" id="email" placeholder="Entrer un email">
                                          @error('email')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="password"  class="sr-only">Mot de passe</label>
                                          <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" :value="old('password')" required autofocus>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                          <select name="role" class="form-control"  :value="old('role')" autofocus>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                          @error('role')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
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
                                        <a href="{{route('magso_user_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Précédent</a>
                                  </div>
                              </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
@stop