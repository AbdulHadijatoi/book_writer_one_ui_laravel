@extends('layouts.backend')

@section('title',$note->title ?? "Note")
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
                <h3 class="block-title">@if(isset($note)) {{$note->title ?? "Note Title"}} @else Note @endif</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <form class="row items-push" id="updateForm" action="{{route('notes.update',$note->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="col-xl-12 m-auto">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="@if(isset($note)) {{$note->title ?? ""}} @endif">
                      <label for="title">Title</label>
                      @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                    <div class="form-floating mb-4">
                      <textarea class="form-control" id="note" name="note" style="height: 500px" placeholder="Note">@if(isset($note)) {{$note->note ?? ""}} @endif</textarea>
                      <label for="note">Note</label>
                      @if ($errors->has('note'))
                        <span class="text-danger">{{ $errors->first('note') }}</span>
                      @endif
                    </div>
                  </div>
                </form>

                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-between">
                    <form id="deleteForm" action="{{route('notes.destroy',$note->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                    <button type="button" onclick="document.getElementById('updateForm').submit();" class="btn btn-primary">Update</button>
                  </div>
                </div>

                <br/>
              </div>
            </div>
        </div>
    </div>
@endsection
