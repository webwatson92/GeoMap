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
@section('style')

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <!-- CSS -->
        <style>
            body{
                margin:0
            }
            #maCarte{
                height: 80vh;
            }
        </style>
@endsection

@section('content')
       <div class="row">
           <div class="col-sm-6">
                <div id="maCarte"></div>
           </div>
           <div class="col-sm-6">
                <form method="POST" autocomplete="on" action="{{ route('magso_mod_plant.update', $plantation) }}">
                      @csrf {{ method_field('PUT') }}
                        <div>
                                <div class="card card-primary">
                                   <div class="card-header text-center">
                                        <h3 class="" style="text-align: center;">Modification</h3>
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
                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="code" value="{{old('code') ?? $plantation->code}}"  autofocus>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date" placeholder="date" value="{{old('date') ?? $plantation->date}}" required autofocus>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Spéculation</label>
                                    <select name="speculation_id" class="form-control" :value="old('speculation')" autofocus>                              
                                        @foreach($spec as $pl)
                                        <option value="{{ $pl->id }}">{{ $pl->nom }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="longitude" name="longitude" class="form-control" id="longitude" placeholder="longitude" value="{{old('longitude') ?? $plantation->longitude}}" required autofocus>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="latitude" name="latitude" class="form-control" id="latitude" placeholder="latitude" value="{{old('latitude') ?? $plantation->latitude}}" required autofocus>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="lieu">Lieu</label>
                            <input type="lieu" name="lieu" class="form-control" id="lieu" placeholder="lieu" value="{{old('lieu') ?? $plantation->lieu}}" required autofocus>
                          </div>
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                    <label>Choisir le membre</label>
                                <select name="member_id" class="form-control" :value="old('member_id')" autofocus>
                                    @foreach($members as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} {{ $u->prenom }}</option>
                                    @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label>Choisir l'utilisateur</label>
                                <select name="user_id" class="form-control" :value="old('user_id')" autofocus>
                                    @foreach($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} {{ $u->prenom }}</option>
                                    @endforeach
                                </select>
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
                                        <a href="{{route('magso_plant_list')}}" class="btn-warning" style="text-align: right;border-radius: 25px;padding: 10px;">Précédent</a>
                                  </div>
                              </div>
                    </form>
           </div>
       </div>

@stop     
@section('script')
  <!-- Fichiers Javascript -->
         <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
        <script>
            //Initialisation du marqueur icon
            var greenIcon = L.icon({
                iconUrl: 'leaf-green.png',
                shadowUrl: 'leaf-shadow.png',

                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            // On initialise la carte
            var carte = L.map('maCarte').setView([7.539989, -5.547080], 13);
            
            // On charge les "tuiles"
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20
            }).addTo(carte);
            //marker
            function updateMarker(lat, lng){
                marker 
                .setLatLng([lat, lng])
                .bindPopup('Your location : ' + marker.getLatLng().toString())
                .openPopup();
                return false;
            }
            
            var marker = L.marker([ {{config('leaflet.map_center_latitude')}}, {{config('leaflet.map_center_longitude')}} ], {
                draggable: true
            }, {icon: greenIcon}).addTo(carte);

            carte.on('click', function(e){
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lat.toString().substring(0, 15);
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                updateMarker(latitude, longitude);
            });

            var updateMarkerByInputs = function(){
                 return updateMarker( $('#latitude').val(), $('#longitude').val() );
            }
            $('#latitude').on('input', updateMarkerByInputs);
            $('#longitude').on('input', updateMarkerByInputs);
        </script>
@endsection