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
                            <form method="POST" autocomplete="on" action="{{ route('magso_add_member.update', $members) }}" enctype="multipart/form-data">
                                 @csrf @method('PUT')
                              <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Formulaire de modification d'un membre</h3>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                                   @if (session('update'))
                                                        <div class="alert alert-dark" role="alert">
                                                          {{ session('update') }}
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
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" name="code" class="form-control" id="code" placeholder="Entrer un code" value="{{old('code') ?? $members->code}}"   autofocus>
                                          </div>
                                     </div>  
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <select name="cooperative" class="form-control" :value="old('cooperative')" autofocus>
                                                @foreach($cooperative as $cp)
                                                <option value="{{ $cp->intitule }}">{{ $cp->intitule }}</option>
                                                @endforeach
                                                  @error('cooperative')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                  @enderror
                                            </select>
                                          </div>
                                     </div>
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                          <select name="type_p" class="form-control" :value="old('type_p')" autofocus>
                                              
                                              <option value="CNI">CNI</option>
                                              <option value="Passeport">Passeport</option>
                                              <option value="Permis de conduire">Permis de conduire</option>
                                                @error('type_p')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                          </select>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="row">
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                          <label for="name"  class="sr-only">Nom</label>
                                          <input type="text" name="name" class="form-control" id="name" placeholder="Entrer un nom" value="{{old('name') ?? $members->name}}"  required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                     </div>
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                          <label for="name"  class="sr-only">Pr??nom</label>
                                          <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer un pr??nom" value="{{old('prenom') ?? $members->prenom}}"  required autofocus>
                                          @error('prenom')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                        </div>
                                     </div>  
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                          <label for="date_naissance"  class="sr-only">Date de naissance</label>
                                          <input type="date" name="date_naissance" class="form-control" id="date_naissance" placeholder="Entrer le nom de votre coop??rative" value="{{old('date_naissance') ?? $members->date_naissance}}"   autofocus>
                                            @error('date_naissance')
                                                 <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                     </div>
                                  </div>

                                  <div class="row">
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="lieu" class="sr-only">Lieu</label>
                                            <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Abidjan" value="{{old('lieu') ?? $members->lieu}}"  autofocus>
                                              @error('lieu')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                     </div>
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <select name="situation_mat" class="form-control" :value="old('situation_mat')" autofocus>
                                                
                                                
                                                <option value="C??libataire">C??libataire</option>
                                                <option value="Mari??(e)">Mari??(e)</option>
                                                <option value="Divorc??(e)">Divorc??(e)</option>
                                                <option value="Voeuf(ve)">Voeuf(ve) </option>
                                                <option value="Autre">Autre</option>
                                                @error('situation_mat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </select>
                                          </div>
                                     </div>
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <select name="civilite" class="form-control" :value="old('civilite')" autofocus>
                                                
                                                
                                                <option value="Monsieur">Monsieur</option>
                                                <option value="Madame">Madame</option>
                                                <option value="Mademoiselle">Mademoiselle</option>
                                                  @error('civilite')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                  @enderror
                                            </select>
                                          </div>
                                     </div>    
                                  </div>

                                  <div class="row">
                                     <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="police_a" class="sr-only">Police assurance</label>
                                              <input type="text" name="police_a" class="form-control" id="police_a" placeholder="Police assurance" value="{{old('police_a') ?? $members->police_a}}"  autofocus>
                                              @error('police_a')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                            </div>
                                     </div>
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                                <label for="numero_p" class="sr-only">N?? pi??ce</label>
                                                <input type="text" name="numero_p" class="form-control" id="numero_p" placeholder="Num??ro de la pi??ce"  value="{{old('numero_p') ?? $members->numero_p}}"  autofocus>
                                                @error('numero_p')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                          </div>
                                     </div>  
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="tel" class="sr-only">T??l??phone</label>
                                            <input type="text" name="tel" class="form-control" id="tel" placeholder="T??l??phone"  value="{{old('tel') ?? $members->tel}}"  autofocus>
                                            @error('tel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </div>
                                     </div>
                                  </div>

                                  <div class="row">
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="mobile" class="sr-only">Mobile</label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{old('mobile') ?? $members->mobile}}"  autofocus>
                                            @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </div>
                                     </div>
                                     <div class="col-sm-4">    
                                        <div class="form-group">
                                          <label for="adresse" class="sr-only">Adresse</label>
                                          <input type="text" name="adresse" class="form-control" id="adresse" placeholder="21 BP 2100 Abidjan 21" value="{{old('adresse') ?? $members->adresse}}" autofocus>
                                          @error('adresse')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                        </div> 
                                     </div>  
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                          <label for="email" class="sr-only">Email</label>
                                          <input type="email" value="{{old('email') ?? $members->email}}" name="email" class="form-control" id="email" placeholder="Entrer un email">
                                          @error('email')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                        </div>
                                     </div>
                                  </div>
                                  <div class="divider"></div>
                                  <div class="row">
                                     <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="interlocuteur" class="sr-only">Interlocuteur</label>
                                              <input type="text" name="interlocuteur" class="form-control" id="interlocuteur" placeholder="Interlocuteur"  value="{{old('interlocuteur') ?? $members->interlocuteur}}" autofocus>
                                              @error('interlocuteur')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                            </div>
                                     </div>
                                     <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="tel_interlocuteur" class="sr-only">T??l??phone</label>
                                            <input type="text" name="tel_interlocuteur" class="form-control" id="tel_interlocuteur" placeholder="T??l??phone" value="{{old('tel_interlocuteur') ?? $members->tel_interlocuteur}}" autofocus>
                                            @error('tel_interlocuteur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </div>
                                     </div>  
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="role" class="form-control"  :value="old('role')" autofocus>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                          </div>
                                     </div>
                                  </div>
                                   <div class="row">
                                     <div class="col-sm-4">
                                           <div class="form-group">
                                            <select name="user_id" class="form-control" :value="old('user_id')" autofocus>
                                                @foreach($members as $cp)
                                                <option value="{{ $members->id }}">{{ $members->name }}</option>
                                                @endforeach
                                                  @error('user_id')
                                                      <div class="invalid-feedback">{{ $message }}</div>
                                                  @enderror
                                            </select>
                                          </div>
                                     </div>
                                     <div class="col-sm-4">
                                         <div class="custom-file form-group">
                                            <input type="file" name="profile_photo_path" id="chooseFile">
                                            <label for="chooseFile">Selectionner l'image</label>
                                             @error('profile_photo_path')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                             
                                        </div>
                                     </div>

                                     <div class="col-sm-4">
                                          <img class="avatar-img" style="height:80px;width: 150px;border-radius:10%; " src="{{asset('public/img/photo')}}/{{$members->profile_photo_path }}" alt="Photo de {{Auth::user()->name}}">
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
                                        <a href="{{route('magso_user_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Pr??c??dent</a>
                                  </div>
                              </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
@stop
@section('script')
<!-- <script src="../node_modules/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/js/hs.dropzone.js"></script>
<script>
  $(document).on('ready', function () {
    // initialization of dropzone file attach module
    $('.dropzone-custom').each(function () {
      var dropzone = $.HSCore.components.HSDropzone.init('#' + $(this).attr('id'));
    });
  });
</script> -->
@ensection