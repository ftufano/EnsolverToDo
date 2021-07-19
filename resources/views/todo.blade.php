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
                  <span class="cm-span-a-display mr-2 d-none d-lg-inline text-gray-600 small">
                    
                    @if (Session::has('userName'))

                      {{ Session::get('userName') }}
                        
                    @endif

                  </span>
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
                  <h1 class="h2 mb-2 text-gray-800">@lang('To-Do Summary')</h1>
                  <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-sliders-h fa-sm text-white-400"></i> @lang('Actions')
                      </button>
                      <div class="dropdown-menu shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                          <a href="" class="dropdown-item" 
                          data-toggle="modal" data-target="#addToDoModal">
                              <i class="fas fa-clipboard-list fa-sm text-gray-400"></i> @lang('New To-Do')
                          </a>
                          <a href="" class="dropdown-item" 
                          data-toggle="modal" data-target="#addFolderModal">
                              <i class="fas fa-folder-plus fa-sm text-gray-400"></i> @lang('New Folder')
                          </a>
                      </div>
                  </div>
              </div>

              
              @if(Session::has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show">
                  {{ Session::get('successMsg') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @elseif (Session::has('errorSession'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ Session::get('errorSession') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @endif

              <div class="row">

                @if (count($folders) > 0)

                  <div class="col-lg-6">

                    @for ($i = 0; $i < count($folders); $i+=2)

                    {{-- Dropdown Card Example --}}
                    <div class="card shadow mb-4">
                      {{-- Card Header - Dropdown --}}
                      <div
                          class="card-header 
                          @if($folders[$i]->name == 'Folderless To-Dos')
                            cm-div-cstl
                          @endif
                          
                          py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-white" id="folderName">{{ $folders[$i]->name }}</h6>

                          @if($folders[$i]->name != 'Folderless To-Dos')
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">@lang('Options:')</div>
                                    <input type="hidden" name="folder_name" id="fldrId" value="{{ $folders[$i]->id }}">
                                    <a href="" class="dropdown-item dlt-fldr" data-toggle="modal" data-target="#folderDeleteModal">
                                        <i class="fas fa-folder-minus fa-sm text-gray-400"></i> @lang('Delete Folder')
                                    </a>
                                </div>
                            </div>
                          @endif

                      </div>
                      {{-- Card Body --}}
                      <div class="card-body">

                        @if (count($toDos) > 0) 
                        
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
                                  @foreach($toDos as $toDo)
                                    @if($folders[$i]->id == $toDo->folder_id)
                                      <tr>
                                        <form method="POST" action="{{ route('updateStatus') }}">
                                          @csrf
                                          <td class="cm-tbl-dsp" id="toDoId">
                                            <input type="hidden" name="id" id="toDoSttsID" value="{{ $toDo->id }}">
                                            <input type="hidden" name="folder_name" id="toDoFldrNm" value="{{ $toDo->folder_id }}">
                                          </td>
                                          <td id="toDoStatus">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="status" value="{{ $toDo->status }}" onclick="statusCheck(this)" aria-label="..."
                                              @if ($toDo->status == '1')
                                                checked> Completed!
                                              @else
                                                > Incomplete
                                              @endif
                                            </div>
                                          </td>
                                        </form>
                                        <td id="toDoDesc">{{ $toDo->description }}</td>
                                        <td class="d-flex justify-content-center">
                                          <a class="cm-a-mrg edt-todo" href="" data-toggle="modal" data-target="#editToDoModal">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                          <a class="cm-a-mrg dlt-todo" href="" data-toggle="modal" data-target="#toDoDeleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                          </a>
                                        </td>
                                      </tr>
                                    @endif
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                        @else
                          @lang('There are no To-Dos created')
                        @endif
                      </div>
                    </div>

                    @endfor

                  </div>

                  <div class="col-lg-6">

                    @for ($i = 1; $i < count($folders); $i+=2)

                    {{-- Dropdown Card Example --}}
                    <div class="card shadow mb-4">
                    {{-- Card Header - Dropdown --}}
                    <div
                        class="card-header 
                        @if($folders[$i]->name == 'Folderless To-Dos')
                          cm-div-cstl
                        @endif
                        
                        py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white" id="folderName">{{ $folders[$i]->name }}</h6>

                        @if($folders[$i]->name != 'Folderless To-Dos')
                          <div class="dropdown no-arrow">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                  aria-labelledby="dropdownMenuLink">
                                  <div class="dropdown-header">@lang('Options:')</div>
                                  <input type="hidden" name="folder_name" id="fldrId" value="{{ $folders[$i]->id }}">
                                  <a href="" class="dropdown-item dlt-fldr" data-toggle="modal" data-target="#folderDeleteModal">
                                      <i class="fas fa-folder-minus fa-sm text-gray-400"></i> @lang('Delete Folder')
                                  </a>
                              </div>
                          </div>
                        @endif

                    </div>
                    {{-- Card Body --}}
                    <div class="card-body">

                      @if (count($toDos) > 0) 
                      
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
                                  @foreach($toDos as $toDo)
                                    @if($folders[$i]->id == $toDo->folder_id)
                                      <tr>
                                        <form method="POST" action="{{ route('updateStatus') }}">
                                          @csrf
                                          <td class="cm-tbl-dsp" id="toDoId">
                                            <input type="hidden" name="id" id="toDoSttsID" value="{{ $toDo->id }}">
                                            <input type="hidden" name="folder_name" id="toDoFldrNm" value="{{ $toDo->folder_id }}">
                                          </td>
                                          <td id="toDoStatus">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="status" value="{{ $toDo->status }}" onclick="statusCheck(this)" aria-label="..."
                                              @if ($toDo->status == '1')
                                                checked> Completed!
                                              @else
                                                > Incomplete
                                              @endif
                                            </div>
                                          </td>
                                        </form>
                                        <td id="toDoDesc">{{ $toDo->description }}</td>
                                        <td class="d-flex justify-content-center">
                                          <a class="cm-a-mrg edt-todo" href="" data-toggle="modal" data-target="#editToDoModal">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                          <a class="cm-a-mrg dlt-todo" href="" data-toggle="modal" data-target="#toDoDeleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                          </a>
                                        </td>
                                      </tr>
                                    @endif
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                      @else
                        @lang('There are no To-Dos created')
                      @endif
                    </div>
                  </div>

                  @endfor

                  </div>
                
                @else
                  <h1 class="h1 mb-2 text-gray-800 cm-h1-mrg">@lang('There are no folders created, Please the defaul folder with the specific name "Folderless To-Dos"')</h1>
                @endif

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

    {{-- Add To-Do Modal --}}
    <div class="modal fade" id="addToDoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('New To-Do')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="fAddToDo" action="{{ route('createToDo') }}">        
              @csrf
              
              <select class="form-control form-control-user" id="selectFldrID" name="folder_id" hidden>
                  
                @foreach($folders as $folder)

                  <option value="{{ $folder->id }}">{{ $folder->id }}</option> 
                    
                @endforeach

              </select>

              <div class="form-group">
                  <label for="inputToDoDesc">@lang('Description')</label>
                  <textarea class="form-control form-control-user" id="inputToDoDesc" name="description"
                      rows="3" placeholder="@lang('Describe your To-Do here...')" required></textarea>
              </div>
              <div class="form-group">
                <label for="inputFldrName">@lang('Folder')</label>
                <select class="form-control form-control-user" id="selectFldrName" name="folder_name">
                  
                  @foreach($folders as $folder)

                    <option value="{{ $folder->id }}">{{ $folder->name }}</option> 
                      
                  @endforeach

                </select>
              </div>
              <button type="submit" class="btn btn-primary">@lang('Accept')</button>
              <button type="cancel" class="btn btn-cancel" data-dismiss="modal">@lang('Cancel')</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Edit To-Do Modal --}}
    <div class="modal fade" id="editToDoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('New To-Do')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="fEditToDo" action="{{ route('updateToDo') }}">        
              @csrf

              <input type="hidden" name="id" id="inputEditId">
              
              <select class="form-control form-control-user" id="edtSlctFldrID" name="folder_id" hidden>
                  
                @foreach($folders as $folder)

                  <option value="{{ $folder->id }}">{{ $folder->id }}</option> 
                    
                @endforeach

              </select>

              <div class="form-group">
                  <label for="inputEditToDoDesc">@lang('Description')</label>
                  <textarea class="form-control form-control-user" id="inputEditToDoDesc" name="description"
                      rows="3" placeholder="@lang('Describe your To-Do here...')" required></textarea>
              </div>
              <div class="form-group">
                <label for="inputFldrName">@lang('Folder')</label>
                <select class="form-control form-control-user" id="edtSlctFldrName" name="folder_name">
                  
                  @foreach($folders as $folder)

                    <option value="{{ $folder->id }}">{{ $folder->name }}</option> 
                      
                  @endforeach

                </select>
              </div>
              <button type="submit" class="btn btn-primary">@lang('Accept')</button>
              <button type="cancel" class="btn btn-cancel" data-dismiss="modal">@lang('Cancel')</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- To-Do Delete Modal--}}
  <div class="modal fade" id="toDoDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('Delete User')</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="toDoDeleteModalDiv"></div>
        <div class="modal-body">
          <form method="POST" action="{{ route('deleteToDo') }}">
            @csrf
            <input type="hidden" name="id" id="inputTDDltId">
            
            <div class="modal-footer">
              <button class="btn btn-cancel" type="button" data-dismiss="modal">@lang('Cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('Delete')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    {{-- Add Folder Modal --}}
    <div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('New Folder')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="fAddToDo" action="{{ route('createFolder') }}">        
              @csrf
              <div class="form-group">
                  <label for="inputTFoldName">@lang('Description')</label>
                  <input type="text" class="form-control form-control-user" id="inputTFoldName" name="fname"
                    placeholder="@lang('Name your folder here...')" autocomplete="off" required>
              </div>
              <button type="submit" class="btn btn-primary">@lang('Accept')</button>
              <button type="cancel" class="btn btn-cancel" data-dismiss="modal">@lang('Cancel')</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Folder Delete Modal--}}
  <div class="modal fade" id="folderDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('Delete Folder')</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="folderDeleteModalDiv"></div>
        <div class="modal-body">
          <form method="POST" action="{{ route('deleteFolder') }}">
            @csrf
            <input type="hidden" name="id" id="inputFDltId">
            
            <div class="modal-footer">
              <button class="btn btn-cancel" type="button" data-dismiss="modal">@lang('Cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('Delete')</button>
            </div>
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
    <script src="js/to-do.js"></script>

  </body>

</html>
