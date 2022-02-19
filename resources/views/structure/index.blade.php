@extends('layouts.backend')

@section('title','Structure')
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
     
      
        <form class="js-validation" action="{{route('structure.store')}}" method="POST">
          @csrf
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Structure: plan du récit (Storyboard basically)</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <div class="row items-push">
                  <div class="col-xl-12 m-auto">
                    <div class="form-floating mb-4">
                      <textarea class="form-control" id="structure" name="structure" style="height: 600px" placeholder="Structure (storyboard)">{{$structure->structure ?? ''}}</textarea>
                      <label for="structure">Structure</label>
                      @if ($errors->has('structure'))
                        <span class="text-danger">{{ $errors->first('structure') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
                <br/>
              </div>
            </div>
          </form>
        </div>
    </div>
@endsection
