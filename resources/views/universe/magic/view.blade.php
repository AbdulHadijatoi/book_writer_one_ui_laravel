@extends('layouts.backend')

@section('title','Magic1')
@section('content')
    <div class="content">

@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <p class="mb-0">
            {{ session()->get('success') }}
          </p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if(session()->has('failed'))
        <div class="alert alert-warning alert-dismissible" role="alert">
          <p class="mb-0">
            {{ session()->get('failed') }}
          </p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
     
      <form id="str_chapter_form" class="js-validation" action="{{route('magic.update',$m_universe->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Magic1</h3>
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
                            <textarea class="form-control" id="rules_and_limits" name="rules_and_limits" style="height: 200px" placeholder="Rules and limits"></textarea>
                            <label for="rules_and_limits">Rules and Limits</label>
                            @if ($errors->has('rules_and_limits'))
                              <span class="text-danger">{{ $errors->first('rules_and_limits') }}</span>
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
                    <div class="row items-push">
                      <div class="col-xl-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-warning btn_add_scene" onclick="document.getElementById('deleteForm').submit();">Delete</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form id="deleteForm" action="{{route('magic.destroy',$m_universe->id)}}" method="post">
        @csrf
        @method('delete')
      </form>
    </div>
@endsection

