@extends('layouts.backend')

@section('title','Structure')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Structure
                    </h1>
                    {{-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                      plan du récit (Storyboard basically)
                    </h2> --}}
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Structure
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
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Structure: plan du récit (Storyboard basically)</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <div class="row items-push">
                  <div class="col-xl-12 m-auto">
                    <div class="mb-4">
                      <label class="form-label" for="structure">Structure <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="structure" name="structure" rows="20" placeholder="Structure (storyboard)"></textarea>
                      @if ($errors->has('structure'))
                        <span class="text-danger">{{ $errors->first('structure') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- END Advanced -->

                <!-- Submit -->
                <div class="row items-push">
                  <div class="col-xl-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-alt-primary">Save</button>
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
