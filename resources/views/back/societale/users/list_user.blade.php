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
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-set/style.css') }}">
 @stop
@section('content')
     <script src="//unpkg.com/alpinejs" defer></script>
     <div class="container">

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Card -->
                            <div class="card">
                              <!-- Header -->
                              <div class="card-header">
                                <div class="row justify-content-between align-items-center flex-grow-1">
                                  <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                                    <form>
                                      <!-- Search -->
                                      <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <i class="tio-search"></i>
                                          </div>
                                        </div>
                                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                      </div>
                                      <!-- End Search -->
                                    </form>
                                  </div>

                                  <div class="col-sm-6">
                                    <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                                      <!-- Datatable Info -->
                                      <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                                        <div class="d-flex align-items-center">
                                          <span class="font-size-sm mr-3">
                                            <span id="datatableCounter">0</span>
                                            Selected
                                          </span>
                                          <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                            <i class="tio-delete-outlined"></i> Delete
                                          </a>
                                        </div>
                                      </div>
                                      <!-- End Datatable Info -->

                                      <!-- Unfold 
                                      <div class="hs-unfold mr-2">
                                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                                           data-hs-unfold-options='{
                                             "target": "#usersExportDropdown",
                                             "type": "css-animation"
                                           }'>
                                          <i class="tio-download-to mr-1"></i> Export
                                        </a>
                                       </div>
                                      </div>-->
                                      <!-- End Unfold -->

                                      <!-- Unfold -->
                                      <div class="hs-unfold card">
                                        <a class="js-hs-unfold-invoker btn btn-sm btn-white" href="{{route('magso_add_list') }}">
                                                   <i class="fas fa-plus-circle"></i> Créer un compte membre 
                                              </a>
                                        <div id="usersFilterDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right dropdown-card card-dropdown-filter-centered" style="min-width: 22rem;">
                                          <!-- Card -->
                                          <div class="card">
                                            <div class="card-header">
                                              <h5 class="card-header-title" sr-only>Filter users</h5>

                                              <!-- Toggle Button -->
                                              <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-secondary ml-2" href="javascript:;"
                                                 data-hs-unfold-options='{
                                                  "target": "#usersFilterDropdown",
                                                  "type": "css-animation",
                                                  "smartPositionOff": true
                                                 }'>
                                                <i class="tio-clear tio-lg"></i>
                                              </a>
                                              <!-- End Toggle Button -->
                                              
                                            </div>

                                            <div class="card-body">
                                              <form>
                                                <div class="form-group">
                                                  <small class="text-cap mb-2">Role</small>

                                                  <div class="form-row">
                                                    <div class="col">
                                                      <!-- Checkbox -->
                                                      <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="usersFilerCheck1" checked>
                                                        <label class="custom-control-label" for="usersFilerCheck1">All</label>
                                                      </div>
                                                      <!-- End Checkbox -->
                                                    </div>

                                                    <div class="col">
                                                      <!-- Checkbox -->
                                                      <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="usersFilerCheck2">
                                                        <label class="custom-control-label" for="usersFilerCheck2">Employee</label>
                                                      </div>
                                                      <!-- End Checkbox -->
                                                    </div>
                                                  </div>
                                                  <!-- End Row -->
                                                </div>

                                                <div class="form-row">
                                                  <div class="col-sm form-group">
                                                    <small class="text-cap mb-2">Position</small>

                                                    <!-- Select -->
                                                    <select class="js-select2-custom js-datatable-filter"
                                                            data-target-column-index="2"
                                                            data-hs-select2-options='{
                                                              "minimumResultsForSearch": "Infinity"
                                                            }'>
                                                      <option value="">Any</option>
                                                      <option value="Accountant">Accountant</option>
                                                      <option value="Co-founder">Co-founder</option>
                                                      <option value="Designer">Designer</option>
                                                      <option value="Developer">Developer</option>
                                                      <option value="Director">Director</option>
                                                    </select>
                                                    <!-- End Select -->
                                                  </div>

                                                  <div class="col-sm form-group">
                                                    <small class="text-cap mb-2">Status</small>

                                                    <!-- Select -->
                                                    <select class="js-select2-custom js-datatable-filter"
                                                            data-target-column-index="4"
                                                            data-hs-select2-options='{
                                                              "minimumResultsForSearch": "Infinity"
                                                            }'>
                                                      <option value="">Any status</option>
                                                      <option value="Active" data-option-template='<span class="legend-indicator bg-success"></span>Active'>Active</option>
                                                      <option value="Pending" data-option-template='<span class="legend-indicator bg-warning"></span>Pending'>Pending</option>
                                                      <option value="Suspended" data-option-template='<span class="legend-indicator bg-danger"></span>Suspended'>Suspended</option>
                                                    </select>
                                                    <!-- End Select -->
                                                  </div>

                                                  <div class="col-12 form-group">
                                                    <small class="text-cap mb-2">Location</small>

                                                    <!-- Select -->
                                                    <select class="js-select2-custom js-datatable-filter"
                                                            data-target-column-index="3"
                                                            data-hs-select2-options='{
                                                              "searchInputPlaceholder": "Search a country"
                                                            }'>
                                                      <option label="empty"></option>
                                                      
                                                      <option value="WF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="{{asset("assets/vendor/flag-icon-css/flags/1x1/wf.svg") }}" alt="Wallis and Futuna Flag" /><span class="text-truncate">Wallis and Futuna</span></span>'>Wallis and Futuna</option>
                                                      <option value="EH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="assets/vendor/flag-icon-css/flags/1x1/eh.svg" alt="Western Sahara Flag" /><span class="text-truncate">Western Sahara</span></span>'>Western Sahara</option>
                                                      <option value="YE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="assets/vendor/flag-icon-css/flags/1x1/ye.svg" alt="Yemen Flag" /><span class="text-truncate">Yemen</span></span>'>Yemen</option>
                                                      <option value="ZM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="assets/vendor/flag-icon-css/flags/1x1/zm.svg" alt="Zambia Flag" /><span class="text-truncate">Zambia</span></span>'>Zambia</option>
                                                      <option value="ZW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="assets/vendor/flag-icon-css/flags/1x1/zw.svg" alt="Zimbabwe Flag" /><span class="text-truncate">Zimbabwe</span></span>'>Zimbabwe</option>
                                                    </select>
                                                    <!-- End Select -->
                                                  </div>
                                                </div>
                                                <!-- End Row -->

                                                <a class="js-hs-unfold-invoker btn btn-block btn-primary" href="javascript:;"
                                                   data-hs-unfold-options='{
                                                    "target": "#usersFilterDropdown",
                                                    "type": "css-animation",
                                                    "smartPositionOff": true
                                                   }'>Apply</a>
                                              </form>
                                            </div>
                                          </div>
                                          <!-- End Card -->
                                        </div>
                                      </div>
                                      <!-- End Unfold -->
                                    </div>
                                  </div>
                                </div>
                                <!-- End Row -->
                              </div>
                              <!-- End Header -->

                              <!-- Table -->
                              <div class="table-responsive datatable-custom">
                                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                       data-hs-datatables-options='{
                                         "columnDefs": [{
                                            "targets": [0, 7],
                                            "orderable": false
                                          }],
                                         "order": [],
                                         "info": {
                                           "totalQty": "#datatableWithPaginationInfoTotalQty"
                                         },
                                         "search": "#datatableSearch",
                                         "entries": "#datatableEntries",
                                         "pageLength": 15,
                                         "isResponsive": false,
                                         "isShowPaging": false,
                                         "pagination": "datatablePagination"
                                       }'>
                                  <thead class="thead-light">
                                    <tr>
                                      <th class="table-column-pr-0">
                                        <div class="custom-control custom-checkbox">
                                          <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                          <label class="custom-control-label" for="datatableCheckAll"></label>
                                        </div>
                                      </th>
                                      <th class="table-column-pl-0">Nom</th>
                                      <th>Email</th>
                                      <th>Rôle</th>
                                      <th>Date de création</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                   @foreach($users as $user)
                                    <tr>
                                      <td class="table-column-pr-0">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="usersDataCheck1">
                                          <label class="custom-control-label" for="usersDataCheck1"></label>
                                        </div>
                                      </td>
                                      <td class="table-column-pl-0">
                                        <a class="d-flex align-items-center" href="{{route('magso_mod_list.show', $user)}}">
                                          <div class="avatar avatar-circle">
                                            <img class="avatar-img" style="height:40px;width: 40px;border-radius:70%; " src="{{asset('img/photo')}}/{{$user->profile_photo_path }}" alt="Profil de {{Auth::user()->name}}">
                                          </div>
                                          <div class="ml-3">
                                            <span class="d-block h5 text-hover-primary mb-0">{{$user->name}} {{$user->prenom}}<i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                            <span class="d-block font-size-sm text-body"></span>
                                          </div>
                                        </a>
                                      </td>
                                      
                                      <td>{{$user->email}}</td>
                                      <td>{{$user->role}}</td>
                                      <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                                      <td>
                                        <div id="editUserPopover">
                                          <a class="btn btn-sm btn-white" href="{{route('magso_mod_list.show', $user)}}">
                                            <i class="fas fa-pen-square"></i> 
                                          </a>
                                          <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')" class="btn btn-sm btn-white" href="{{route('users.delete', $user)}}"><i style="color:red" class="fa fa-trash" aria-hidden="true"></i> 
                                          </a>
                                        </div>
                                      </td>
                                    </tr>  
                                   @endforeach                                  
                                  </tbody>
                                </table>
                              </div>
                              <!-- End Table -->

                              <!-- Footer -->
                              <div class="card-footer">
                                <!-- Pagination -->
                                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                                  <div class="col-sm mb-2 mb-sm-0">
                                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                       {{ $users->links() }}
                                    </div>
                                  </div>

                                  <div class="col-sm-auto">
                                    <div class="d-flex justify-content-center justify-content-sm-end">
                                      <!-- Pagination -->
                                      <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Pagination -->
                              </div>
                              <!-- End Footer -->
                            </div>
                    <!-- End Card -->
                    </div>
                   
      </div>
@stop
@section('script') 
    <!-- JS Front -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>

    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // ONLY DEV
        
          if (window.localStorage.getItem('hs-builder-popover') === null) {
            $('#builderPopover').popover('show');

            $(document).on('click', '#closeBuilderPopover' , function() {
              window.localStorage.setItem('hs-builder-popover', true);
              $('#builderPopover').popover('dispose');
            });
          } else {
            $('#builderPopover').on('show.bs.popover', function () {
              return false
            });
          }
        
        // END ONLY DEV

        $('.js-navbar-vertical-aside-toggle-invoker').click(function () {
          $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
        });

        
          // initialization of mega menu
          var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
            desktop: {
              position: 'left'
            }
          }).init();
        

        // initialization of navbar vertical navigation
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

        // initialization of tooltip in navbar vertical menu
        $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

        $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
          if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
            return false;
          }
        });

        // initialization of unfold
        $('.js-hs-unfold-invoker').each(function () {
          var unfold = new HSUnfold($(this)).init();
        });

        // initialization of form search
        $('.js-form-search').each(function () {
          new HSFormSearch($(this)).init()
        });

        // initialization of Show Password
        $('.js-toggle-password').each(function () {
          new HSTogglePassword(this).init()
        });

        // initialization of file attach
        $('.js-file-attach').each(function () {
          var customFile = new HSFileAttach($(this)).init();
        });

        // initialization of tabs
        $('.js-tabs-to-dropdown').each(function () {
          var transformTabsToBtn = new HSTransformTabsToBtn($(this)).init();
        });

        // initialization of step form
        $('.js-step-form').each(function () {
          var stepForm = new HSStepForm($(this), {
            finish: function() {
              $("#addUserStepFormProgress").hide();
              $("#addUserStepFormContent").hide();
              $("#successMessageContent").show();
            }
          }).init();
        });

        // initialization of masked input
        $('.js-masked-input').each(function () {
          var mask = $.HSCore.components.HSMask.init($(this));
        });

        // initialization of select2
        $('.js-select2-custom').each(function () {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // initialization of counters
        $('.js-counter').each(function() {
          var counter = new HSCounter($(this)).init();
        });

        // initialization of datatables
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'copy',
              className: 'd-none'
            },
            {
              extend: 'excel',
              className: 'd-none'
            },
            {
              extend: 'csv',
              className: 'd-none'
            },
            {
              extend: 'pdf',
              className: 'd-none'
            },
            {
              extend: 'print',
              className: 'd-none'
            },
          ],
          select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]',
            classMap: {
              checkAll: '#datatableCheckAll',
              counter: '#datatableCounter',
              counterInfo: '#datatableCounterInfo'
            }
          },
          language: {
            zeroRecords: '<div class="text-center p-4">' +
                '<img class="mb-3" src="./assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                '<p class="mb-0">No data to show</p>' +
                '</div>'
          }
        });

        $('#export-copy').click(function() {
          datatable.button('.buttons-copy').trigger()
        });

        $('#export-excel').click(function() {
          datatable.button('.buttons-excel').trigger()
        });

        $('#export-csv').click(function() {
          datatable.button('.buttons-csv').trigger()
        });

        $('#export-pdf').click(function() {
          datatable.button('.buttons-pdf').trigger()
        });

        $('#export-print').click(function() {
          datatable.button('.buttons-print').trigger()
        });

        $('.js-datatable-filter').on('change', function() {
          var $this = $(this),
            elVal = $this.val(),
            targetColumnIndex = $this.data('target-column-index');

          datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('mouseup', function (e) {
          var $input = $(this),
            oldValue = $input.val();

          if (oldValue == "") return;

          setTimeout(function(){
            var newValue = $input.val();

            if (newValue == ""){
              // Gotcha
              datatable.search('').draw();
            }
          }, 1);
        });

        // initialization of quick view popover
        $('#editUserPopover').popover('show');

        $(document).on('click', '#closeEditUserPopover' , function() {
          $('#editUserPopover').popover('dispose');
        });

        $('#editUserModal').on('show.bs.modal', function() {
          $('#editUserPopover').popover('dispose');
        });
      });
    </script>

    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
 @stop