@extends('layouts.backend')

@section('title','Universe')
@section('content')
    <!-- Hero -->
    {{-- <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                      Chapters Structure
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                      Storyboard chapter by chapter basically
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Str. Chapter
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
      <form id="str_chapter_form" class="js-validation" action="{{route('bookinfo.index')}}" method="POST">
        @csrf
        Name, Description, , ,

        <!-- Interactive Options -->
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Universe</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
              </div>
              <div class="block-content">
                <div class="block block-rounded">
                  <br/>
                  <div class="block-content block-content-full">
                    <div class="row items-push">
                      <div class="col-xl-12 m-auto">
                        
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                          <label for="name">Name</label>
                          @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                        
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="description" name="description" style="height: 200px" placeholder="Description"></textarea>
                          <label for="description">Description</label>
                          @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="origins_and_location" name="origins_and_location" style="height: 200px" placeholder="Origins and location"></textarea>
                            <label for="origins_and_location">Origins and location</label>
                            @if ($errors->has('origins_and_location'))
                              <span class="text-danger">{{ $errors->first('origins_and_location') }}</span>
                            @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="miscellaneous_information" name="miscellaneous_information" style="height: 200px" placeholder="Miscellaneous information"></textarea>
                            <label for="miscellaneous_information">Miscellaneous information</label>
                            @if ($errors->has('miscellaneous_information'))
                              <span class="text-danger">{{ $errors->first('miscellaneous_information') }}</span>
                            @endif
                        </div>
                        
                      </div>
                    </div>

                     <!-- Submit -->
                    <div class="row items-push">
                      <div class="col-xl-12 d-flex justify-content-between">

                        <button type="button" class="btn btn-primary btn_add_scene">Delete</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                    <!-- END Submit -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Form --> 
    </div>
    <!-- END Page Content -->

@endsection

