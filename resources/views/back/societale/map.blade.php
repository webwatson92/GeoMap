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
                height: 400px;
            }
        </style>
@endsection

@section('content')
        <div id="maCarte"></div>
        <div>
            @foreach($plantations as $plant)
                <input type="hidden" id="latitude" value="{{$plant->latitude}}" name="latitude">
                <input type="hidden" id="longitude"  value="{{$plant->latitude}}" name="longitude">
            @endforeach
        </div>
@stop     
@section('script')
  <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
        <script>
            // On initialise la carte
            var btn = document.getElementById("loadplaces");
            /*window.addEventListener("load", function () {
                var lat = $("#latitude").val({{$plant->latitude}});
                var lng = $("#longitude").val({{$plant->latitude}});
                alert(lat+" ok "+lng);
            });*/
            let carte = L.map('maCarte').setView([{{$plant->latitude}}, {{$plant->longitude}}], {{config('leaflet.detail_zoom_level')}});
            
            // On charge les "tuiles"
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20
            }).addTo(carte)

            // creation d'un marker deplacable
          var marker = L.marker([{{$plant->latitude}}, {{$plant->longitude}}], {
            draggable: true
          }).addTo(carte);

          // recuperation de la position du marker
          // quand il est deplacé
          marker.on("dragend", function (evt) {
            var pos = evt.target.getLatLng();
            //txt.value = pos.lat + "," + pos.lng;
          });

          // quand on clique on affiche toi les mouvement
          // lol
          btn.addEventListener("click", function () {
            // le contenu de ceci je le deplace
            // je le met dans une function plus bas
            alert("Est desormais fait automatiquement !");
          });

          // ici on charge les marker quand la page
          // a fini de charger
          window.addEventListener("load", function () {
            loadMarkers();
            //alert("toto");
          });

          function loadMarkers() {
                fetch("http://localhost:8000/api/mag-societariat/listes-plantation")
                  .then(function (res) {
                    return res.json();
                  })
                  .then(function (result) {
                    var places = result.data;
                    console.log(places);

                    for (var i = 0; i < places.length; i++) {
                      L.marker([
                        parseFloat(places[i].latitude),
                        parseFloat(places[i].longitude)
                      ])
                        .bindPopup(places[i].lieu)
                        .addTo(carte);
                    }
                  });
          }

        </script>
@endsection