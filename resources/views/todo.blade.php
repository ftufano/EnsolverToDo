<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@lang('webtags.app_title')</title>

  {{-- Favicon --}}
  <link rel="icon" type="image/png" href="assets/img/favicon_caelumdev.ico"/>

  {{-- Custom fonts for this template --}}
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  {{-- Custom styles for this template--}}
    <link href="css/b-css.min.css" rel="stylesheet">
    <link href="css/cm-css.css" rel="stylesheet">

</head>

<body id="page-top">

  {{-- Page Wrapper --}}
  <div class="cm-divw-h" id="wrapper">

    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">

      {{-- Main Content --}}
      <div id="content">

        {{-- Topbar --}}
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <div class="sidebar-brand-icon">
            <img class="cm-img-h-lmrg" src="assets/img/caelum_logo.png"></img>
          </div>
          <div class="sidebar-brand-icon">
            <h1 class="h4 mb-2 text-gray-800 cm-h1-ltmrg">@lang('To-Do App')</h1>
          </div>

          {{-- Topbar Navbar --}}
          <ul class="navbar-nav ml-auto">

            {{-- Nav Item - User Information --}}
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="cm-span-a-display mr-2 d-none d-lg-inline text-gray-600 small">@yield('username')</span>
                <i class="fas fa-user"></i>
              </a>
              {{-- Dropdown - User Information --}}
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  @lang('Logout')
                </a>
              </div>
            </li>

          </ul>

        </nav>
        {{-- End of Topbar --}}

        {{-- Begin Page Content --}}
        <div class="container-fluid">

          {{-- Page Heading --}}
            <div class="d-sm-flex align-items-center justify-content-around mb-4">
                <h1 class="h3 mb-2 text-gray-800">@lang('To-Do Summary')</h1>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sliders-h fa-sm text-white-400"></i> @lang('Actions')
                    </button>
                    <div class="dropdown-menu shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a href="" class="dropdown-item" 
                        data-toggle="modal" data-target="#addDateModal">
                            <i class="fas fa-calendar-plus fa-sm text-gray-400"></i> @lang('New Period')
                        </a>
                        <a href="" class="dropdown-item" 
                        data-toggle="modal" data-target="#addQuotaModal">
                            <i class="fas fa-cart-plus fa-sm text-gray-400"></i> @lang('Period Quotas')
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">

                   {{-- Dropdown Card Example --}}
                   <div class="card shadow mb-4">
                    {{-- Card Header - Dropdown --}}
                    <div
                        class="card-header cm-div-cstl py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">@lang('Folderless To-Dos')</h6>
                    </div>
                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">       
                              <thead>
                                <tr>
                                  <th class="cm-tbl-dsp">ID</th>
                                  <th>@lang('Completation')</th>
                                  <th>@lang('Description')</th>
                                  <th>@lang('Actions')</th>
                                </tr>
                              </thead>
                              <tbody>
                              {{-- @if (count($users) > 0) 
                              
                                @foreach($users as $user) --}}
                                  <tr>
                                    <td class="cm-tbl-dsp" id="userId">1</td>
                                    <td id="userName">sin compl</td>
                                    <td id="userEmail">hacer la cama</td>
                                    <td class="d-flex justify-content-center">
                                      <a class="cm-a-mrg edt-usr edt-int-tel" href="" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-user-edit"></i>
                                      </a>
                                      <a class="cm-a-mrg dlt-usr" href="" data-toggle="modal" data-target="#userDeleteModal">
                                        <i class="fas fa-user-times"></i>
                                      </a>
                                    </td>
                                  </tr>
                                {{-- @endforeach --}}
                              </tbody>
                              {{-- @else
                                <tr>
                                  <td>@lang('There are no users registered')<td>
                                </tr>
                              @endif --}}
                            </table>
                          </div>
                    </div>
                </div>

                    {{-- Dropdown Card Example --}}
                    <div class="card shadow mb-4">
                        {{-- Card Header - Dropdown --}}
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-white">2- Dropdown Card Example</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        {{-- Card Body --}}
                        <div class="card-body">
                            Dropdown menus can be placed in the card header in order to extend the functionality
                            of a basic card. In this dropdownn the card header in order to extend the functionality
                            of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                            icon in the card header can bedasdasdffasff clicked on in order to toggle a dropdown menu.
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    {{-- Dropdown Card Example --}}
                    <div class="card shadow mb-4">
                        {{-- Card Header - Dropdown --}}
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-white">3- Dropdown Card Example</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        {{-- Card Body --}}
                        <div class="card-body">
                            Dropdown menus can be placed in the card header in order to extend the functionality
                            of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                            icon in the card header can be clicked on in order to toggle a dropdown menu.
                        </div>
                    </div>

                    {{-- Dropdown Card Example --}}
                    <div class="card shadow mb-4">
                        {{-- Card Header - Dropdown --}}
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-white">4- Dropdown Card Example</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        {{-- Card Body --}}
                        <div class="card-body">
                            Dropdown menus can be placed in te clicked on in order to toggle a dropdown menu.
                        </div>
                    </div>

                </div>

            </div>

        </div>
        {{-- End Of Page Content --}}

      </div>
      {{-- End of Main Content --}}

      {{-- Footer --}}
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>@lang('Web Site Developed By:') @lang('webtags.author')</a></span>
                </div>
            </div>
        </footer>
      {{-- End of Footer --}}

    </div>
    {{-- End of Content Wrapper --}}

  </div>
  {{-- End of Page Wrapper --}}

  {{-- Scroll to Top Button--}}
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    {{-- Add Date Modal --}}
    <div class="modal fade" id="addDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('New Period')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{-- route('createSeason') --}}">
                @csrf
                <div class="form-group">
                <label for="inputAddType">@lang('Period Type')</label>
                <select class="form-control form-control-user" id="inputAddType" name="type">
                    <option>@lang('Air')</option>
                    <option>@lang('Sea')</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="inputAddStart">@lang('Start Date')</label>
                    <input type="date" class="form-control form-control-user" id="inputAddStart" name="start_date"
                    placeholder="@lang('Start Date')" onkeydown="return false" required>
                </div>
                <div class="form-group">
                <label for="inputAddEnd">@lang('End Date')</label>
                <input type="date" class="form-control form-control-user" id="inputAddEnd" name="end_date"
                    placeholder="@lang('End Date')" onkeydown="return false" required>
                    <input type="date" class="form-control form-control-user" id="inputRAddEnd" name="end_r_date"
                    placeholder="@lang('End Date')" onkeydown="return false" required hidden>
                </div>
                <div class="form-group">
                <label for="inputAddShip">@lang('Shipment Date')</label>
                <input type="date" class="form-control form-control-user" id="inputAddShip" name="shipment_date"
                    placeholder="@lang('Shipment Date')" onkeydown="return false" required>
                </div>
                
                <button type="submit" class="btn btn-primary" onclick="validAddDates()">@lang('Accept')</button>
                <button type="cancel" class="btn btn-cancel" data-dismiss="modal">@lang('Cancel')</button>
            </form>
            </div>
        </div>
        </div>
    </div>

  {{-- Logout Modal--}}
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('Ready to Leave?')</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">@lang('Are you sure you want to Logout?')</div>
        <div class="modal-footer">
          <button class="btn btn-cancel" type="button" data-dismiss="modal">@lang('Cancel')</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">@lang('Logout')</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Bootstrap core JavaScript--}}
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  {{-- Core plugin JavaScript--}}
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  {{-- Custom scripts for all pages--}}
  <script src="js/b-js.min.js"></script>

</body>

</html>
