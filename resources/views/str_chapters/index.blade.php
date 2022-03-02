@extends('layouts.backend')

@section('title','Chapter Structure')
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
     
       
      <form id="str_chapter_form" class="js-validation" action="{{route('str_chapters.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Chapter Structure</h3>
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
                        <div class="items-push mb-4 m-auto col-xl-11 d-flex justify-content-between flex-column flex-lg-row">
                            <div>
                              <label class="form-label" for="">Chapter Type<span class="text-danger">*</span></label>
                              <select class="js-select2 form-select" id="chapter_type_id" name="chapter_type_id" style="width: 100%;" data-placeholder="Chapter Type" required>
                                <option selected disabled>Chapter Type</option>
                                <option value="1">Normal Chapter</option>
                                <option value="2">Interlude</option>
                                <option value="3">Prologue</option>
                                <option value="4">Epilogue</option>
                              </select>
                              @if ($errors->has('chapter_type_id'))
                                <span class="text-danger">{{ $errors->first('chapter_type_id') }}</span>
                              @endif
                            </div>

                            <div>
                              <label class="form-label" for="chapter_number">Number of the chapter <span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="chapter_number" name="chapter_number" placeholder="Chapter number" min="1" required>
                              @if ($errors->has('chapter_number'))
                                <span class="text-danger">{{ $errors->first('chapter_number') }}</span>
                              @endif
                            </div>

                            <div>
                              <label class="form-label" for="chapter_position">Position of the chapter in the book<span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="chapter_position" name="chapter_position" placeholder="Chapter position" min="1" required>
                              @if ($errors->has('chapter_position'))
                                <span class="text-danger">{{ $errors->first('chapter_position') }}</span>
                              @endif
                            </div>
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="chapter_title" name="chapter_title" placeholder="Chapter Title">
                          <label for="chapter_title">Title</label>
                          @if ($errors->has('chapter_title'))
                            <span class="text-danger">{{ $errors->first('chapter_title') }}</span>
                          @endif
                        </div>
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="chapter_location" name="chapter_location" placeholder="Scene Location">
                          <label for="chapter_location">Chapter Location</label>
                          @if ($errors->has('chapter_location'))
                            <span class="text-danger">{{ $errors->first('chapter_location') }}</span>
                          @endif
                        </div>

                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                        
                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="chapter_characters" name="chapter_characters" style="height: 200px" placeholder="Characters"></textarea>
                          <label for="chapter_characters">Characters</label>
                          @if ($errors->has('chapter_characters'))
                          <span class="text-danger">{{ $errors->first('chapter_characters') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="chapter_abstract" name="chapter_abstract" style="height: 200px" placeholder="Abstract"></textarea>
                          <label for="chapter_abstract">Abstract</label>
                          @if ($errors->has('chapter_abstract'))
                            <span class="text-danger">{{ $errors->first('chapter_abstract') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="chapter_issues" name="chapter_issues" style="height: 200px" placeholder="Enjeux et place dans le recit"></textarea>
                          <label for="chapter_issues">Issues and place in the story</label>
                          @if ($errors->has('chapter_issues'))
                            <span class="text-danger">{{ $errors->first('chapter_issues') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="row1" class="row">
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
                        <div class="items-push m-auto col-xl-12 d-flex justify-content-center">
                          <div>
                            <label class="form-label" for="scene_number">Scene number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="scene_number" name="scene_number[]" placeholder="Scene number" min="1" required>
                            @if ($errors->has('scene_number'))
                              <span class="text-danger">{{ $errors->first('scene_number') }}</span>
                            @endif
                          </div>
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="scene_location" name="scene_location[]" placeholder="Scene Location">
                          <label for="scene_location">Location</label>
                          @if ($errors->has('scene_location'))
                            <span class="text-danger">{{ $errors->first('scene_location') }}</span>
                          @endif
                        </div>
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" id="scene_characters" name="scene_characters[]" placeholder="Scene Characters">
                          <label for="scene_characters">Characters</label>
                          @if ($errors->has('scene_characters'))
                            <span class="text-danger">{{ $errors->first('scene_characters') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="scene_issues" name="scene_issues[]" style="height: 200px" placeholder="Enjeux et place dans le recit"></textarea>
                          <label for="scene_issues">Issues and place in the story</label>
                          @if ($errors->has('scene_issues'))
                            <span class="text-danger">{{ $errors->first('scene_issues') }}</span>
                          @endif
                        </div>
                        
                        <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                        <div class="form-floating mb-4">
                          <textarea class="form-control" id="scene_abstract" name="scene_abstract[]" style="height: 200px" placeholder="Abstract"></textarea>
                          <label for="scene_abstract">Abstract</label>
                          @if ($errors->has('scene_abstract'))
                            <span class="text-danger">{{ $errors->first('scene_abstract') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row items-push">
                      <div class="col-xl-12 m-auto d-flex justify-content-between">
                        <button type="button" id="btn_addScene" class="btn btn-success btn_add_scene" onclick="addScene()">New Scene</button>
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
    </div>

@section('js_after')

<script type="text/javascript">   
    // var postURL = "<?php echo url('addmore'); ?>";
    var i=1;


    // $('#btn_addScene').click(function(){  
        //  i++;  
        //  $('#str_chapter_form').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    //      $('#str_chapter_form').append('<div id="row'+i+'" class="row"> <div class="col-md-12"> <div class="block block-rounded"> <div class="block-header block-header-default"> <h3 class="block-title">Scene</h3> <div class="block-options"> <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button> <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button> </div> </div> <div class="block-content"> <div class="block block-rounded"> <div class="block-content block-content-full"> <div class="row items-push"> <div class="col-xl-12 m-auto"> <div class="items-push mb-4 m-auto col-xl-12 d-flex justify-content-center">  <div> <label class="form-label" for="scene_number'+i+'">Scene number<span class="text-danger">*</span></label> <input type="number" class="form-control" id="scene_number'+i+'" name="scene_number[]" placeholder="Scene number" min="1"> @if ($errors->has("scene_number")) <span class="text-danger">{{ $errors->first("scene_number") }}</span> @endif  </div> </div> <div class="form-floating mb-4">  <input type="text" class="form-control" id="scene_location'+i+'" name="scene_location[]" placeholder="Scene Location">  <label for="scene_location'+i+'">Location</label>  @if ($errors->has("scene_location")) <span class="text-danger">{{ $errors->first("scene_location") }}</span>  @endif </div> <div class="form-floating mb-4">  <input type="text" class="form-control" id="scene_characters'+i+'" name="scene_characters[]" placeholder="Scene Characters">  <label for="scene_characters'+i+'">Characters</label>  @if ($errors->has("scene_characters")) <span class="text-danger">{{ $errors->first("scene_characters") }}</span>  @endif </div> <div class="form-floating mb-4">  <textarea class="form-control" id="scene_issues'+i+'" name="scene_issues[]" style="height: 200px" placeholder="Enjeux et place dans le recit"></textarea>  <label for="scene_issues'+i+'">Issues and place in the story</label>  @if ($errors->has("scene_issues")) <span class="text-danger">{{ $errors->first("scene_issues") }}</span>  @endif </div> <div class="form-floating mb-4">  <textarea class="form-control" id="scene_abstract'+i+'" name="scene_abstract[]" style="height: 200px" placeholder="Abstract"></textarea>  <label for="scene_abstract'+i+'">Abstract</label>  @if ($errors->has("scene_abstract")) <span class="text-danger">{{ $errors->first("scene_abstract") }}</span>  @endif </div> </div> </div> <div class="row items-push"> <div class="col-xl-12 m-auto d-flex justify-content-between"> <button type="button" id="btn_addScene'+i+'" class="btn btn-success btn_add_scene">New Scene</button> <button type="button" id="'+i+'" class="btn btn-primary btn_remove_scene">Delete</button> <button type="submit" class="btn btn-primary">Save</button> </div> </div> </div> </div> </div> </div> </div> </div>');  
    // });  

    

    function addScene(){  
      i++;  
      let newScene = document.createElement("div");
      newScene.innerHTML = '<div id="row'+i+'" class="row"> <div class="col-md-12"> <div class="block block-rounded"> <div class="block-header block-header-default"> <h3 class="block-title">Scene</h3> <div class="block-options"> <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button> <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button> </div> </div> <div class="block-content"> <div class="block block-rounded"> <div class="block-content block-content-full"> <div class="row items-push"> <div class="col-xl-12 m-auto"> <div class="items-push m-auto col-xl-12 d-flex justify-content-center">  <div> <label class="form-label" for="scene_number'+i+'">Scene number<span class="text-danger">*</span></label> <input type="number" class="form-control" id="scene_number'+i+'" name="scene_number[]" placeholder="Scene number" min="1" required> @if ($errors->has("scene_number")) <span class="text-danger">{{ $errors->first("scene_number") }}</span> @endif  </div> </div> <div role="separator" class="dropdown-divider m-0 mb-4"></div> <div class="form-floating mb-4">  <input type="text" class="form-control" id="scene_location'+i+'" name="scene_location[]" placeholder="Scene Location">  <label for="scene_location'+i+'">Location</label>  @if ($errors->has("scene_location")) <span class="text-danger">{{ $errors->first("scene_location") }}</span>  @endif </div> <div class="form-floating mb-4">  <input type="text" class="form-control" id="scene_characters'+i+'" name="scene_characters[]" placeholder="Scene Characters">  <label for="scene_characters'+i+'">Characters</label>  @if ($errors->has("scene_characters")) <span class="text-danger">{{ $errors->first("scene_characters") }}</span>  @endif </div> <div role="separator" class="dropdown-divider m-0 mb-4"></div> <div class="form-floating mb-4">  <textarea class="form-control" id="scene_issues'+i+'" name="scene_issues[]" style="height: 200px" placeholder="Enjeux et place dans le recit"></textarea>  <label for="scene_issues'+i+'">Issues and place in the story</label>  @if ($errors->has("scene_issues")) <span class="text-danger">{{ $errors->first("scene_issues") }}</span>  @endif </div> <div role="separator" class="dropdown-divider m-0 mb-4"></div> <div class="form-floating mb-4">  <textarea class="form-control" id="scene_abstract'+i+'" name="scene_abstract[]" style="height: 200px" placeholder="Abstract"></textarea>  <label for="scene_abstract'+i+'">Abstract</label>  @if ($errors->has("scene_abstract")) <span class="text-danger">{{ $errors->first("scene_abstract") }}</span>  @endif </div> </div> </div> <div class="row items-push"> <div class="col-xl-12 m-auto d-flex justify-content-between"> <button type="button" id="btn_addScene'+i+'" class="btn btn-success btn_add_scene"  onclick="addScene()">New Scene</button> <button type="button" id="'+i+'" class="btn btn-warning btn_remove_scene" onclick="removeScene(this)">Delete</button> <button type="submit" class="btn btn-primary">Save</button> </div> </div> </div> </div> </div> </div> </div> </div>';
      document.getElementById('str_chapter_form').appendChild(newScene);
      // reloadRepeatableBlocks();
    } 


    function removeScene(elem){  
      var button_id = elem.id;   
      document.getElementById('row'+button_id+'').remove(); 
    }


    // $.ajaxSetup({
    //     headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });


    // $('#submit').click(function(){            
    //      $.ajax({  
    //           url:postURL,  
    //           method:"POST",  
    //           data:$('#add_name').serialize(),
    //           type:'json',
    //           success:function(data)  
    //           {
    //               if(data.error){
    //                   printErrorMsg(data.error);
    //               }else{
    //                   i=1;
    //                   $('.dynamic-added').remove();
    //                   $('#add_name')[0].reset();
    //                   $(".print-success-msg").find("ul").html('');
    //                   $(".print-success-msg").css('display','block');
    //                   $(".print-error-msg").css('display','none');
    //                   $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
    //               }
    //           }  
    //      });  
    // });  


    // function printErrorMsg (msg) {
    //    $(".print-error-msg").find("ul").html('');
    //    $(".print-error-msg").css('display','block');
    //    $(".print-success-msg").css('display','none');
    //    $.each( msg, function( key, value ) {
    //       $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    //    });
    // }

    function reloadRepeatableBlocks() {
      var _this = this;

      var mode = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'init';
      var block = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var self = this; // Helper variables

      var elBlock, btnFullscreen, btnContentToggle; // Set default icons for fullscreen and content toggle buttons

      var iconBase = 'si';
      var iconFullscreen = 'si-size-fullscreen';
      var iconFullscreenActive = 'si-size-actual';
      var iconContent = 'si-arrow-up';
      var iconContentActive = 'si-arrow-down'; // API with object literals

      var blockAPI = {
        init: function init() {
          // Auto add the default toggle icons to fullscreen and content toggle buttons
          document.querySelectorAll('[data-toggle="block-option"][data-action="fullscreen_toggle"]').forEach(function (btn) {
            btn.innerHTML = '<i class="' + iconBase + ' ' + (btn.closest('.block').classList.contains('block-mode-fullscreen') ? iconFullscreenActive : iconFullscreen) + '"></i>';
          });
          document.querySelectorAll('[data-toggle="block-option"][data-action="content_toggle"]').forEach(function (btn) {
            btn.innerHTML = '<i class="' + iconBase + ' ' + (btn.closest('.block').classList.contains('block-mode-hidden') ? iconContentActive : iconContent) + '"></i>';
          }); // Call blocks API on option button click

          document.querySelectorAll('[data-toggle="block-option"]').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
              _this.reloadRepeatableBlocks(btn.dataset.action, btn.closest('.block'));
            });
          });
        },
        fullscreen_toggle: function fullscreen_toggle() {
          elBlock.classList.remove('block-mode-pinned');
          elBlock.classList.toggle('block-mode-fullscreen'); // Update block option icon

          if (btnFullscreen) {
            if (elBlock.classList.contains('block-mode-fullscreen')) {
              btnFullscreen && btnFullscreen.querySelector('i').classList.replace(iconFullscreen, iconFullscreenActive);
            } else {
              btnFullscreen && btnFullscreen.querySelector('i').classList.replace(iconFullscreenActive, iconFullscreen);
            }
          }
        },
        fullscreen_on: function fullscreen_on() {
          elBlock.classList.remove('block-mode-pinned');
          elBlock.classList.add('block-mode-fullscreen'); // Update block option icon

          btnFullscreen && btnFullscreen.querySelector('i').classList.replace(iconFullscreen, iconFullscreenActive);
        },
        fullscreen_off: function fullscreen_off() {
          elBlock.classList.remove('block-mode-fullscreen'); // Update block option icon

          btnFullscreen && btnFullscreen.querySelector('i').classList.replace(iconFullscreenActive, iconFullscreen);
        },
        content_toggle: function content_toggle() {
          elBlock.classList.toggle('block-mode-hidden'); // Update block option icon

          if (btnContentToggle) {
            if (elBlock.classList.contains('block-mode-hidden')) {
              btnContentToggle.querySelector('i').classList.replace(iconContent, iconContentActive);
            } else {
              btnContentToggle.querySelector('i').classList.replace(iconContentActive, iconContent);
            }
          }
        },
        content_hide: function content_hide() {
          elBlock.classList.add('block-mode-hidden'); // Update block option icon

          btnContentToggle && btnContentToggle.querySelector('i').classList.replace(iconContent, iconContentActive);
        },
        content_show: function content_show() {
          elBlock.classList.remove('block-mode-hidden'); // Update block option icon

          btnContentToggle && btnContentToggle.querySelector('i').classList.replace(iconContentActive, iconContent);
        },
        state_toggle: function state_toggle() {
          elBlock.classList.toggle('block-mode-loading'); // Return block to normal state if the demostration mode is on in the refresh option button - data-action-mode="demo"

          if (elBlock.querySelector('[data-toggle="block-option"][data-action="state_toggle"][data-action-mode="demo"]')) {
            setTimeout(function () {
              elBlock.classList.remove('block-mode-loading');
            }, 2000);
          }
        },
        state_loading: function state_loading() {
          elBlock.classList.add('block-mode-loading');
        },
        state_normal: function state_normal() {
          elBlock.classList.remove('block-mode-loading');
        },
        pinned_toggle: function pinned_toggle() {
          elBlock.classList.remove('block-mode-fullscreen');
          elBlock.classList.toggle('block-mode-pinned');
        },
        pinned_on: function pinned_on() {
          elBlock.classList.remove('block-mode-fullscreen');
          elBlock.classList.add('block-mode-pinned');
        },
        pinned_off: function pinned_off() {
          elBlock.classList.remove('block-mode-pinned');
        },
        close: function close() {
          elBlock.classList.add('d-none');
        },
        open: function open() {
          elBlock.classList.remove('d-none');
        }
      };

      if (mode === 'init') {
        // Call Block API
        blockAPI[mode]();
      } else {
        // Get block element
        elBlock = block instanceof Element ? block : document.querySelector("".concat(block)); // If element exists, procceed with block functionality

        if (elBlock) {
          // Get block option buttons if exist (need them to update their icons)
          btnFullscreen = elBlock.querySelector('[data-toggle="block-option"][data-action="fullscreen_toggle"]');
          btnContentToggle = elBlock.querySelector('[data-toggle="block-option"][data-action="content_toggle"]'); // Call Block API

          if (blockAPI[mode]) {
            blockAPI[mode]();
          }
        }
      }
    }
</script>

@endsection

@endsection

