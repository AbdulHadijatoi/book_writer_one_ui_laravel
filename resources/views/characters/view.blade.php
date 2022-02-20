@extends('layouts.backend')

@section('title','Character1')
@section('content')

    <div class="content content-boxed">
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
          <h3 class="block-title">{{$character->f_name ?? ''}} {{$character->l_name ?? ''}}</h3>
        </div>
        <div class="block-content">
          <form action="{{route('characters.update',$character->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row push">
              <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-between ">
                <div class="col-lg-3 d-flex flex-column align-items-lg-start align-items-center justify-content-center justify-content-lg-between flex-lg-row">
                  <div class="mb-4 mb-lg-0">
                    {{-- <img width="200" style="cursor: pointer" src="{{asset("storage/characters/$character->avatar")}}" alt="" onclick="document.getElementById('character_avatar').click();"> --}}
                    @if(isset($character->avatar))
                      <div class="h-full" style="border: 2px solid grey;"><img width="200" style="cursor: pointer" src="{{asset("storage/characters/$character->avatar")}}" alt="" onclick="document.getElementById('character_avatar').click();"></div>
                    @else
                      <div class="h-full" style="border: 2px solid grey;"><img width="200" style="cursor: pointer" src="{{asset("storage/characters/avatar.png")}}" alt="" onclick="document.getElementById('character_avatar').click();"></div>
                    @endif
                  </div>

                  <div class="position-absolute invisible">
                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                    <input class="form-control" type="file" name="avatar" id="character_avatar">
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Firstname" value="{{$character->f_name ?? ''}}">
                    <label for="f_name">Firstname</label>
                    @if ($errors->has('f_name'))
                      <span class="text-danger">{{ $errors->first('f_name') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Lastname" value="{{$character->l_name ?? ''}}">
                    <label for="l_name">Lastname</label>
                    @if ($errors->has('l_name'))
                      <span class="text-danger">{{ $errors->first('l_name') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <select class="form-select" id="gender" name="gender" aria-label="gender">
                      <option selected>Select Gender</option>
                      <option value="male" @if(isset($character) && $character->gender == 'male') {{'selected'}} @endif>Male</option>
                      <option value="female" @if(isset($character) && $character->gender == 'female') {{'selected'}} @endif>Female</option>
                      <option value="other" @if(isset($character) && $character->gender == 'other') {{'selected'}} @endif>Other</option>
                    </select>
                    <label for="gender">Gender</label>
                    @if ($errors->has('gender'))
                      <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                  </div>
                  <div class="form-floating mb-4">
                    <input type="number" class="form-control" id="age" name="age" min="1" placeholder="Age" value="{{$character->age ?? ''}}">
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
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-between">

                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="physical_description" name="physical_description" style="height: 200px" placeholder="Physical description">{{$character->physical_description ?? ''}}</textarea>
                        <label for="physical_description">Physical description</label>
                        @if ($errors->has('physical_description'))
                          <span class="text-danger">{{ $errors->first('physical_description') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="summery" name="summery" style="height: 200px" placeholder="Summery">{{$character->summery ?? ''}}</textarea>
                        <label for="summery">Summery</label>
                        @if ($errors->has('summery'))
                          <span class="text-danger">{{ $errors->first('summery') }}</span>
                        @endif
                      </div>
                    </div>

                  </div>
                </div>
                
                <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                <div class="row push">
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-center">
                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="skills" name="skills" style="height: 200px" placeholder="Skills">{{$character->skills ?? ''}}</textarea>
                        <label for="skills">Skills</label>
                        @if ($errors->has('skills'))
                          <span class="text-danger">{{ $errors->first('skills') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="history" name="history" style="height: 200px" placeholder="History and origins">{{$character->history ?? ''}}</textarea>
                        <label for="history">History and origins</label>
                        @if ($errors->has('history'))
                          <span class="text-danger">{{ $errors->first('history') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div role="separator" class="dropdown-divider m-0 mb-4"></div>
                <div class="row push">
                  <div class="col-lg-12 d-flex flex-column flex-lg-row justify-content-lg-center">
                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="evolution" name="evolution" style="height: 200px" placeholder="Evolution during the story">{{$character->evolution ?? ''}}</textarea>
                        <label for="evolution">Evolution during the story</label>
                        @if ($errors->has('evolution'))
                          <span class="text-danger">{{ $errors->first('evolution') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="mb-4 mt-2 col-lg-6 p-lg-3">
                      <div class="form-floating">
                        <textarea class="form-control" id="motivation" name="motivation" style="height: 200px" placeholder="Motivations place in the story">{{$character->motivation ?? ''}}</textarea>
                        <label for="motivation">Motivations place in the story</label>
                        @if ($errors->has('motivation'))
                          <span class="text-danger">{{ $errors->first('motivation') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                
                <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                <div class="row push p-lg-3">
                  <div class="col-lg-12">
                    <div class="form-floating">
                      <textarea class="form-control" id="additional_information" name="additional_information" style="height: 200px" placeholder="Additional Information">{{$character->additional_information ?? ''}}</textarea>
                      <label for="additional_information">Additional information</label>
                      @if ($errors->has('additional_information'))
                        <span class="text-danger">{{ $errors->first('additional_information') }}</span>
                      @endif
                    </div>    
                  </div>
                </div>
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-between">
                    
                    <button type="button" onclick="document.getElementById('deleteForm').submit();" class="btn btn-warning btn_add_scene">Delete</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>
      <form id="deleteForm" action="{{route('characters.destroy',$character->id)}}" method="post">
        @csrf
        @method('delete')
      </form>
    </div>

@endsection
