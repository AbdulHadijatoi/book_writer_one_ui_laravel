@extends('layouts.backend')

@section('title','Structure')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
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
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
      <form class="js-validation" action="{{route('bookinfo.index')}}" method="POST">
        @csrf
        <!-- Interactive Options -->
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Chapter Card</h3>
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

                        <div class="items-push mb-4 m-auto col-xl-10 d-flex justify-content-between">
                          {{-- <div class="col-xl-12"> --}}
                            <div>
                              <label class="form-label" for="chapter_type">Chapter Type <span class="text-danger">*</span></label>
                              <select class="js-select2 form-select" id="chapter_type" name="chapter_type" style="width: 100%;" data-placeholder="Chapter Type">
                                <option selected disabled>Chapter Type</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="Normal Chapter">Normal Chapter</option>
                                <option value="Interlude">Interlude</option>
                                <option value="Prologue">Prologue</option>
                                <option value="Epilogue">Epilogue</option>
                              </select>
                            </div>

                            <div>
                              <label class="form-label" for="chapter_number">Number of the chapter <span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="chapter_number" name="chapter_number" placeholder="Chapter number" min="1">
                              @if ($errors->has('chapter_number'))
                                <span class="text-danger">{{ $errors->first('chapter_number') }}</span>
                              @endif
                            </div>

                            <div>
                              <label class="form-label" for="chapter_position">Position of the chapter in the book<span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="chapter_position" name="chapter_position" placeholder="Chapter position" min="1">
                              @if ($errors->has('chapter_position'))
                                <span class="text-danger">{{ $errors->first('chapter_position') }}</span>
                              @endif
                            </div>
                          {{-- </div> --}}
                        </div>

                        <div class="mb-4">
                          <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                          @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="chapter_location">Location <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="chapter_location" name="chapter_location" placeholder="Location">
                          @if ($errors->has('chapter_location'))
                            <span class="text-danger">{{ $errors->first('chapter_location') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0"></div>

                        <div class="mb-6 mt-5">
                          <label class="form-label" for="chapter_characters">Characters <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="chapter_characters" name="chapter_characters" rows="5" placeholder="Characters"></textarea>
                          @if ($errors->has('chapter_characters'))
                            <span class="text-danger">{{ $errors->first('chapter_characters') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0"></div>

                        <div class="mb-6 mt-5">
                          <label class="form-label" for="abstract">Abstract <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="abstract" name="abstract" rows="5" placeholder="Abstract"></textarea>
                          @if ($errors->has('abstract'))
                            <span class="text-danger">{{ $errors->first('abstract') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0"></div>

                        <div class="mb-6 mt-5">
                          <label class="form-label" for="chapter_issues">Issues and place in the story <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="issues_place" name="chapter_issues" rows="5" placeholder="Enjeux et place dans le recit"></textarea>
                          @if ($errors->has('chapter_issues'))
                            <span class="text-danger">{{ $errors->first('chapter_issues') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <!-- END Advanced -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Interactive Options -->
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Scene</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
              </div>
              <div class="block-content">
                <div class="block block-rounded">
                  <div class="block-content block-content-full">
                    <div class="row items-push">
                      <div class="col-xl-12 m-auto">

                        <div class="items-push mb-4 m-auto col-xl-10 d-flex justify-content-center">
                            <div>
                              <label class="form-label" for="scene_number">Scene number<span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="scene_number" name="scene_number" placeholder="Scene number" min="1">
                              @if ($errors->has('scene_number'))
                                <span class="text-danger">{{ $errors->first('scene_number') }}</span>
                              @endif
                            </div>
                        </div>

                        <div class="mb-4">
                          <label class="form-label" for="scene_location">Location <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="scene_location" name="scene_location" placeholder="Scene Location">
                          @if ($errors->has('scene_location'))
                            <span class="text-danger">{{ $errors->first('scene_location') }}</span>
                          @endif
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="scene_characters">Characters <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="scene_characters" name="scene_characters" placeholder="Characters">
                          @if ($errors->has('scene_characters'))
                            <span class="text-danger">{{ $errors->first('scene_characters') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0"></div>

                        <div class="mb-6 mt-5">
                          <label class="form-label" for="scene_issues">Issues and place in the story <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="scene_issues" name="scene_issues" rows="5" placeholder="Enjeux et place dans le recit"></textarea>
                          @if ($errors->has('scene_issues'))
                            <span class="text-danger">{{ $errors->first('scene_issues') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0"></div>

                        <div class="mb-6 mt-5">
                          <label class="form-label" for="scene_abstract">Abstract <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="scene_abstract" name="scene_abstract" rows="5" placeholder="Abstract"></textarea>
                          @if ($errors->has('scene_abstract'))
                            <span class="text-danger">{{ $errors->first('scene_abstract') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <!-- END Advanced -->
    
                    <!-- Submit -->
                    <div class="row items-push">
                      <div class="col-xl-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-alt-primary">New Scene</button>
                        <button type="submit" class="btn btn-alt-primary">Delete</button>
                        <button type="submit" class="btn btn-alt-primary">Save</button>
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
