@extends('layouts.backend')

@section('title','Illustrations')
@section('css_after')
  <link rel="stylesheet" href="{{asset('js/plugins/magnific-popup/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection
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
     
      <!-- Dropzone (functionality is auto initialized by the plugin itself in js/plugins/dropzone/dropzone.min.js) -->
      <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">You can upload your pictures here</h3>
        </div>
        <div class="block-content block-content-full">
          <div class="row">
            <div class="m-auto">
              <form class="d-flex flex-column align-items-center" action="{{route('illustrations.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image_name">
                <br/>
                <input id="btn_submit_form" class="btn btn-primary" type="submit" value="Upload">

              </form>
            </div>
          </div>
        </div>
      </div>
      
      <h2 class="content-heading">Your Uploaded Pictures</h2>
      <div class="row g-sm items-push js-gallery push">
        
        @if(isset($pictures))
          @foreach ($pictures as $picture)
            <form id="form{{$picture->id}}" action="{{route('illustrations.destroy',$picture->id)}}" method="POST" class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
              @csrf
              @method('delete')
              <div class="options-container fx-item-rotate-r">
                <img class="img-fluid options-item" src='{{asset("storage/illustrations/$picture->image_name")}}' alt="">
                <div class="options-overlay bg-black-75">
                  <div class="options-overlay-content">
                    <a class="btn btn-sm btn-primary img-lightbox" href="{{asset("storage/illustrations/$picture->image_name")}}">
                      <i class="fa fa-search-plus me-1"></i> View
                    </a>
                    <a class="btn btn-sm btn-warning" href="javascript:void(0)" onclick="document.getElementById('form{{$picture->id}}').submit();">
                      <i class="fa fa-trash me-1"></i> Delete
                    </a>
                  </div>
                </div>
              </div>
            </form>
          @endforeach
        @endif
        
        
        
      </div>
    </div>

    @section('js_after')
        <script src="{{asset('js/lib/jquery.min.js')}}"></script>
    
        <script src="{{asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        {{-- <script src="{{ asset('js/plugins/dropzone/min/dropzone.min.js') }}"></script> --}}
    
        <script>One.helpersOnLoad(['jq-magnific-popup']);</script>
        {{-- <script>
            Dropzone.options.imageUploadForm = { // camelized version of the `id`
              paramName: "images", // The name that will be used to transfer the file
              maxFilesize: 2, // MB
              accept: function(file, done) {
                  document.getElementById('btn_submit_form').style.display = "block";
                  console.log('ready!!');
              }
            };
        </script> --}}
    @endsection
@endsection