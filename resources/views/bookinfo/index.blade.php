@extends('layouts.backend')

@section('title','Basic Information')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Book information
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                      Enter basic information about your book.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">BookWriter</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Book
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
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
     
        <form class="js-validation" action="{{route('bookinfo.store')}}" method="POST">
          @csrf
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Basic information about your book</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <div class="row items-push">
                  {{-- Titre Auteur Genre Themes --}}
                  <div class="col-xl-12 m-auto">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$bookInfo->title ?? ''}}">
                      <label for="title">Title</label>
                      @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      @endif
                    </div>

                    <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="{{$bookInfo->author ?? ''}}">
                      <label for="author">Author</label>
                      @if ($errors->has('author'))
                        <span class="text-danger">{{ $errors->first('author') }}</span>
                      @endif
                    </div>
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre" value="{{$bookInfo->genre ?? ''}}">
                      <label for="genre">Genre</label>
                      @if ($errors->has('genre'))
                        <span class="text-danger">{{ $errors->first('genre') }}</span>
                      @endif
                    </div>

                    <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="themes" name="themes" placeholder="Themes" value="{{$bookInfo->themes ?? ''}}">
                      <label for="themes">Themes</label>
                      @if ($errors->has('themes'))
                        <span class="text-danger">{{ $errors->first('themes') }}</span>
                      @endif
                    </div>

                    <div role="separator" class="dropdown-divider m-0 mb-4"></div>

                    <div class="form-floating mb-4">
                      <textarea class="form-control" id="summery" name="summery" style="height: 200px" placeholder="Summery">{{$bookInfo->summery ?? ''}}</textarea>
                      <label for="summery">Summery</label>
                      @if ($errors->has('summery'))
                        <span class="text-danger">{{ $errors->first('summery') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- END Advanced -->

                <!-- Submit -->
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
                <!-- END Submit -->
                <br/>
              </div>
            </div>
          </form>
          <!-- jQuery Validation -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
