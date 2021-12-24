@extends('partials/layouts')
 @section('style') 
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-set/style.css') }}">
    <style>
        .date{
            display: inline-block;
        }
    </style>
 @stop
@section('content')
     <script src="//unpkg.com/alpinejs" defer></script>
     <div class="container">

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-sm-3">              
                        </div>
                        <div class="col-sm-9">
                            <div class="row new-caisse" style="margin:3vh">
                                <div class="col-sm-6 col-md-12 col-lg-12 col-xs-6">
                                       
                                </div>
                                <div class="col-sm-6 col-xs-6"></div>
                            </div>
                            <div class="row new-caisse" style="margin:3vh">
                                <div class="col-sm-4">
                                  <a href="{{route('magso_add_member') }}" class="btn btn-primary">Créer un utilisateur</a>
                                </div>
                                <div class="col-sm-8">
                                     
                                </div>
                            </div>
                            <div class="row">
                                <table id="dtMaterialDesignExample" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                              <th class="table-column-pl-0">Nom & Prénom</th>
                                              <th>Email</th>
                                              <th>Coopérative</th>
                                              <th>Situation Matrimoniale</th>
                                              <th>Lieu</th>
                                              <th>Rôle</th>
                                              <th>Adhésion</th>
                                              <th>Action</th>  
                                      </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($members as $user)
                                            <tr>
                                                <td class="table-column-pr-0">
                                                    <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="usersDataCheck1">
                                                      <label class="custom-control-label" for="usersDataCheck1"></label>
                                                    </div>
                                                  </td>
                                                  <td class="table-column-pl-0">
                                                    <a class="d-flex align-items-center" href="{{route('magso_mod_member.show', $user)}}">
                                                      <div class="avatar avatar-circle">
                                                        <img class="avatar-img" style="height:40px;width: 40px;border-radius:70%; " src="{{asset('public/img/photo')}}/{{$user->profile_photo_path }}" alt="Profil de {{Auth::user()->name}}">
                                                      </div>
                                                      <div class="ml-3">
                                                        <span class="d-block h5 text-hover-primary mb-0">{{$user->name}} {{$user->prenom}}<i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                                        <span class="d-block font-size-sm text-body"></span>
                                                      </div>
                                                    </a>
                                                  </td>
                                                  
                                                  <td>{{$user->email}}</td>
                                                  <td>{{$user->cooperative}}</td>
                                                  <td>{{$user->situation_mat}}</td>
                                                  <td>{{$user->Lieu}}</td>
                                                  <td>{{$user->role}}</td>
                                                  <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td> <td>
                                                                        <a href="{{route('magso_mod_member.show', $user)}}"><i class="fas fa-edit"></i></a>
                                                                        <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')" href="{{route('users.delete', $user)}}"><i style="color:red" class="fas fa-trash-alt"></i></a></a>
                                                  </td>   
                                            </tr>      
                                        @endforeach  
                                    </tbody>
                                  </table>
                                  {{ $users->links() }}
                            </div>
                        </div>
                        <div class="">
                        </div>
                    </div>
                   
      </div>
@stop
@section('script') 
    <!-- JS Front -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>
    <script>
        // Material Design example tableau
        $(document).ready(function () {
          $('#dtMaterialDesignExample').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
          $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
          });
          $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Search");
            $this.removeClass('form-control-sm');
          });
          $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
          $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
          $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
          //$('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
         // $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
          $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
        });
    </script>
    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
 @stop