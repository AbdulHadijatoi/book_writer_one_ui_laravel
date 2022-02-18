@extends('layouts.backend')

@section('title','Sources')
@section('content')

    <div class="content">
        <form class="js-validation" action="{{route('bookinfo.index')}}" method="POST">
          @csrf
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Sources</h3>
              </div>
              <br/>
              <div class="block-content block-content-full">
                <div class="row items-push">
                  <div class="col-xl-12 m-auto">
                    <div class="form-floating mb-4">
                      <textarea class="form-control" id="sources" name="sources" style="height: 500px" placeholder="Sources"></textarea>
                      <label for="sources">Sources</label>
                      @if ($errors->has('sources'))
                        <span class="text-danger">{{ $errors->first('sources') }}</span>
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
