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
                        <div class="col-sm-8 offset-2">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Liste des coopératives</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <div class="row">
                                     <a href="{{route('magso_add_coop')}}"><i class="ace-icon fa fa-user-edit bigger-120"></i></a>
                                </div>
                                        <table id="example2" class="table table-bordered table-hover">
                                          <thead>
                                                                    <tr>
                                                                       <th>Intitulé</th>
                                                                        <th>Responsable</th>
                                                                        <th>Contact</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                          </thead>
                                          <tbody>
                                                                    @foreach($coop as $cp)
                                                                    <tr>
                                                                            <td>{{$cp->intitule}}</td>
                                                                            <td>{{$cp->responsable}}</td>
                                                                            <td>{{$cp->contact}}</td>
                                                                            <td>
                                                                                <a href="{{route('magso_add_coop')}}"><i class="ace-icon fa fa-user-edit bigger-120"></i></a>

                                                                                <a href="{{route('magso_mod_coop.show', $cp)}}"><i class="fas fa-edit"></i></a> 
                                                                                <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')" href="{{route('coop.delete', $cp)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                            </td>
                                                                    </tr>
                                                                    @endforeach
                                          </tbody>
                                        </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                    </div>
                   
                </div>
@stop