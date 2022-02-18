@extends('layouts.backend')

@section('title','Characters')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">
      <!-- User Profile -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Character</h3>
        </div>
        <div class="block-content">
          <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
            @csrf
            <div class="row push">
              <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-between ">
                <div class="col-lg-3 d-flex flex-column align-items-lg-start align-items-center justify-content-center justify-content-lg-between flex-lg-row">
                  <div class="mb-4 mb-lg-0">
                    <img width="200" style="cursor: pointer" src="{{asset('media/avatars/avatar.png')}}" alt="" onclick="document.getElementById('character_avatar').click();">
                  </div>

                  <div class="position-absolute invisible">
                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                    <input class="form-control" type="file" name="avatar" id="character_avatar">
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Firstname">
                    <label for="f_name">Firstname</label>
                    @if ($errors->has('f_name'))
                      <span class="text-danger">{{ $errors->first('f_name') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Lastname">
                    <label for="l_name">Lastname</label>
                    @if ($errors->has('l_name'))
                      <span class="text-danger">{{ $errors->first('l_name') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <select class="form-select" id="gender" name="gender" aria-label="gender">
                      <option selected>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                    <label for="gender">Gender</label>
                    @if ($errors->has('age'))
                      <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                    <label for="age">Age</label>
                    @if ($errors->has('age'))
                      <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                  </div>
                </div>
              </div>









              <div class="col-lg-12">
                <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                <div class="row push">
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-center">
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="physical_description" name="physical_description" style="height: 200px" placeholder="Physical description"></textarea>
                      <label for="physical_description">Physical description</label>
                      @if ($errors->has('physical_description'))
                        <span class="text-danger">{{ $errors->first('physical_description') }}</span>
                      @endif
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="summery" name="summery" style="height: 200px" placeholder="Summery"></textarea>
                      <label for="summery">Personality</label>
                      @if ($errors->has('summery'))
                        <span class="text-danger">{{ $errors->first('summery') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                <div class="row push">
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-center">
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="skills" name="skills" style="height: 200px" placeholder="Skills"></textarea>
                      <label for="skills">Skills</label>
                      @if ($errors->has('skills'))
                        <span class="text-danger">{{ $errors->first('skills') }}</span>
                      @endif
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="history" name="history" style="height: 200px" placeholder="History and origins"></textarea>
                      <label for="history">History and origins</label>
                      @if ($errors->has('history'))
                        <span class="text-danger">{{ $errors->first('history') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                <div class="row push">
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-center">
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="evolution" name="evolution" style="height: 200px" placeholder="Evolution during the story"></textarea>
                      <label for="evolution">Evolution during the story</label>
                      @if ($errors->has('evolution'))
                        <span class="text-danger">{{ $errors->first('evolution') }}</span>
                      @endif
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="form-floating mb-4 mt-2 col-lg-5">
                      <textarea class="form-control" id="motivation" name="motivation" style="height: 200px" placeholder="Motivations place in the story"></textarea>
                      <label for="motivation">Motivations place in the story</label>
                      @if ($errors->has('motivation'))
                        <span class="text-danger">{{ $errors->first('motivation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                <div class="row push">
                  <div class="col-lg-12">
                    <div class="form-floating">
                      <textarea class="form-control" id="additional_information" name="additional_information" style="height: 200px" placeholder="Additional Information"></textarea>
                      <label for="additional_information">Additional information</label>
                      @if ($errors->has('additional_information'))
                        <span class="text-danger">{{ $errors->first('additional_information') }}</span>
                      @endif
                    </div>    
                  </div>
                </div>

                <!-- Submit -->
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-warning btn_add_scene">Delete</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
                <!-- END Submit -->
                
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- END User Profile -->

      
    </div>
    <!-- END Page Content -->

@endsection
