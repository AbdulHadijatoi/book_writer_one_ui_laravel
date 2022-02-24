@extends('layouts.backend')

@section('title',$chapter->chapter_title)
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
     
        
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">{{$chapter->chapter_title ?? ''}}</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <form class="row items-push" id="updateForm" action="{{route('chapters.update',$chapter->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="col-xl-12 m-auto">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="chapter_title" name="chapter_title" placeholder="Title" value="{{$chapter->chapter_title ?? ''}}" required>
                      <label for="chapter_title">Title</label>
                      @if ($errors->has('chapter_title'))
                        <span class="text-danger">{{ $errors->first('chapter_title') }}</span>
                      @endif
                    </div>

                    <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                    <div class="items-push m-auto col-xl-12 d-flex justify-content-between flex-column flex-lg-row">
                      <div>
                        <label class="form-label" for="">Chapter Type<span class="text-danger">*</span></label>
                        <select class="js-select2 form-select" id="chapter_type_id" name="chapter_type_id" style="width: 100%;" data-placeholder="Chapter Type" required>
                          <option selected disabled>Chapter Type</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          <option value="1" @if(isset($chapter) && $chapter->chapter_type_id == 1) {{'selected'}} @endif>Normal Chapter</option>
                          <option value="2" @if(isset($chapter) && $chapter->chapter_type_id == 2) {{'selected'}} @endif>Interlude</option>
                          <option value="3" @if(isset($chapter) && $chapter->chapter_type_id == 3) {{'selected'}} @endif>Prologue</option>
                          <option value="4" @if(isset($chapter) && $chapter->chapter_type_id == 4) {{'selected'}} @endif>Epilogue</option>
                        </select>
                      </div>

                      <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                      <div>
                        <label class="form-label" for="chapter_number">Number of the chapter <span class="text-danger">*</span></label>
                        <input type="chapter_number" class="form-control" id="chapter_number" name="chapter_number" placeholder="Chapter number" min="1" value="{{$chapter->chapter_number ?? ''}}" required>
                        @if ($errors->has('chapter_number'))
                          <span class="text-danger">{{ $errors->first('chapter_number') }}</span>
                        @endif
                      </div>

                      <div>
                        <label class="form-label" for="chapter_position">Position of the chapter in the book<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="chapter_position" name="chapter_position" placeholder="Chapter position" min="1" value="{{$chapter->chapter_position ?? ''}}" required>
                        @if ($errors->has('chapter_position'))
                          <span class="text-danger">{{ $errors->first('chapter_position') }}</span>
                        @endif
                      </div>
                  </div>

                  <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                    <div class="form-floating mb-4">
                      <textarea class="form-control" id="chapter_content" name="chapter_content" style="height: 600px" placeholder="Content">{{$chapter->chapter_content ?? ''}}</textarea>
                      <label for="chapter_content">Content</label>
                      @if ($errors->has('chapter_content'))
                        <span class="text-danger">{{ $errors->first('chapter_content') }}</span>
                      @endif
                    </div>
                  </div>
                </form>

                <!-- Submit -->
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-between">
                    <form id="deleteForm" action="{{route('chapters.destroy',$chapter->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-warning btn_add_scene">Delete</button>
                    </form>
                    <button type="button" onclick="document.getElementById('updateForm').submit();" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <!-- END Submit -->
                <br/>
              </div>
            </div>
        </div>
    </div>
@endsection
