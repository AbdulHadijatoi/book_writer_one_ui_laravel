@extends('layouts.backend')

@section('title',$t_universe->name)
@section('content')
{{-- Name, Description, Rules and Limits, Technical Terms/Jargon, Miscellaneous Information --}}
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
     
      <form id="str_chapter_form" class="js-validation" action="{{route('technology.update',$t_universe->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">{{$t_universe->name ?? ""}}</h3>
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
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$t_universe->name ?? ""}}" required>
                          <label for="name">Name</label>
                          @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                        
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="description" name="description" style="height: 200px" placeholder="Description">{{$t_universe->description ?? ""}}</textarea>
                          <label for="description">Description</label>
                          @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="rules_and_limits" name="rules_and_limits" style="height: 200px" placeholder="Rules and limits">{{$t_universe->rules_and_limits ?? ""}}</textarea>
                            <label for="rules_and_limits">Rules and Limits</label>
                            @if ($errors->has('rules_and_limits'))
                              <span class="text-danger">{{ $errors->first('rules_and_limits') }}</span>
                            @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="technical_terms_jargons" name="technical_terms_jargons" style="height: 200px" placeholder="Technical Terms/Jargon">{{$t_universe->technical_terms_jargons ?? ""}}</textarea>
                            <label for="technical_terms_jargons">Technical Terms/Jargon</label>
                            @if ($errors->has('technical_terms_jargons'))
                              <span class="text-danger">{{ $errors->first('technical_terms_jargons') }}</span>
                            @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="miscellaneous_information" name="miscellaneous_information" style="height: 200px" placeholder="Miscellaneous information">{{$t_universe->miscellaneous_information ?? ""}}</textarea>
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
        <form id="deleteForm" action="{{route('technology.destroy',$t_universe->id)}}" method="post">
          @csrf
          @method('delete')
        </form>
    </div>
@endsection

