@extends('layouts.backend')

@section('title','{{$geography->place_name ?? "Geography"}}')
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
     

        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">{{$geography->place_name ?? ""}}</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
              </div>
              <div class="block-content">
                <div class="block block-rounded">
                  <br/>
                  <div class="block-content block-content-full">
                    <form id="updateForm" class="row items-push" action="{{route('geography.update',$geography->id)}}" method="POST">
                      @csrf
                      @method('PUT')
              
                      <div class="col-xl-12 m-auto">
                        
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="place_name" name="place_name" value="{{$geography->place_name ?? ""}}" placeholder="Place name">
                          <label for="place_name">@if(isset($geography)) {{$geography->place_name}} @endif</label>
                          @if ($errors->has('place_name'))
                            <span class="text-danger">{{ $errors->first('place_name') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <select class="form-select" id="category" name="category" aria-label="Category">
                            <option selected>Select a category</option>
                            <option @if(isset($geography) && $geography->category_id == 1) {{'selected'}} @endif>One</option>
                            <option @if(isset($geography) && $geography->category_id == 2) {{'selected'}} @endif>Two</option>
                            <option @if(isset($geography) && $geography->category_id == 3) {{'selected'}} @endif>Three</option>
                          </select>
                          <label for="category">Category</label>
                          @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                        
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="description" name="description" style="height: 200px" placeholder="Description">{{$geography->description ?? ""}}</textarea>
                          <label for="description">Description</label>
                          @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="additional_information" name="additional_information" style="height: 200px" placeholder="Additional Information">{{$geography->additional_information ?? ""}}</textarea>
                            <label for="additional_information">Additional information</label>
                            @if ($errors->has('additional_information'))
                              <span class="text-danger">{{ $errors->first('additional_information') }}</span>
                            @endif
                        </div>
                        
                      </div>
                    </form>

                    <div class="row items-push">
                      <div class="col-xl-12 d-flex justify-content-between">
                        <form id="deleteForm" action="{{route('geography.destroy',$geography->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-warning btn_add_scene">Delete</button>
                        </form>
                        <button type="button" onclick="document.getElementById('updateForm').submit();" class="btn btn-primary">Update</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

@endsection

