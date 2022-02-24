@extends('layouts.backend')

@section('title','Structure')
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
     
        {{-- Myths and Legends --}}
        @if(isset($ml_universes) && $ml_universes != null && count($ml_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Myths and Legends</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($ml_universes as $ml_universe)
                    @if (isset($ml_universe->title)) <h2>{{$ml_universe->title}}</h2> @endif
                    @if (isset($ml_universe->name)) <h2>{{$ml_universe->name}}</h2> @endif
                    @if (isset($ml_universe->description)) <p><h4>Description</h4>{{$ml_universe->description}}</p> @endif
                    @if (isset($ml_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$ml_universe->origins_and_location}}</p> @endif
                    @if (isset($ml_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$ml_universe->miscellaneous_information}}</p> @endif
                    @if (isset($ml_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$ml_universe->rules_and_limits}}</p> @endif
                    @if (isset($ml_universe->content)) <p><h4>Description</h4>{{$ml_universe->content}}</p> @endif
                    @if (isset($ml_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$ml_universe->technical_terms_jargons}}</p> @endif
                    <br/>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- Civilization --}}
        @if(isset($c_universes) && $c_universes != null && count($c_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Civilization</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($c_universes as $c_universe)
                      @if (isset($c_universe->title)) <h2>{{$c_universe->title}}</h2> @endif
                      @if (isset($c_universe->name)) <h2>{{$c_universe->name}}</h2> @endif
                      @if (isset($c_universe->description)) <p><h4>Description</h4>{{$c_universe->description}}</p> @endif
                      @if (isset($c_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$c_universe->origins_and_location}}</p> @endif
                      @if (isset($c_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$c_universe->miscellaneous_information}}</p> @endif
                      @if (isset($c_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$c_universe->rules_and_limits}}</p> @endif
                      @if (isset($c_universe->content)) <p><h4>Description</h4>{{$c_universe->content}}</p> @endif
                      @if (isset($c_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$c_universe->technical_terms_jargons}}</p> @endif
                      <br/>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- Bestiary --}}
        @if(isset($b_universes) && $b_universes != null && count($b_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Bestiary</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($b_universes as $b_universe)
                      @if (isset($b_universe->title)) <h2>{{$b_universe->title}}</h2> @endif
                      @if (isset($b_universe->name)) <h2>{{$b_universe->name}}</h2> @endif
                      @if (isset($b_universe->description)) <p><h4>Description</h4>{{$b_universe->description}}</p> @endif
                      @if (isset($b_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$b_universe->origins_and_location}}</p> @endif
                      @if (isset($b_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$b_universe->miscellaneous_information}}</p> @endif
                      @if (isset($b_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$b_universe->rules_and_limits}}</p> @endif
                      @if (isset($b_universe->content)) <p><h4>Description</h4>{{$b_universe->content}}</p> @endif
                      @if (isset($b_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$b_universe->technical_terms_jargons}}</p> @endif
                      <br/>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- Magic --}}
        @if(isset($m_universes) && $m_universes != null && count($m_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Magic</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($m_universes as $m_universe)
                      @if (isset($m_universe->title)) <h2>{{$m_universe->title}}</h2> @endif
                      @if (isset($m_universe->name)) <h2>{{$m_universe->name}}</h2> @endif
                      @if (isset($m_universe->description)) <p><h4>Description</h4>{{$m_universe->description}}</p> @endif
                      @if (isset($m_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$m_universe->origins_and_location}}</p> @endif
                      @if (isset($m_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$m_universe->miscellaneous_information}}</p> @endif
                      @if (isset($m_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$m_universe->rules_and_limits}}</p> @endif
                      @if (isset($m_universe->content)) <p><h4>Description</h4>{{$m_universe->content}}</p> @endif
                      @if (isset($m_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$m_universe->technical_terms_jargons}}</p> @endif
                      <br/>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- Technology --}}
        @if(isset($t_universes) && $t_universes != null && count($t_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Technology</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($t_universes as $t_universe)
                      @if (isset($t_universe->title)) <h2>{{$t_universe->title}}</h2> @endif
                      @if (isset($t_universe->name)) <h2>{{$t_universe->name}}</h2> @endif
                      @if (isset($t_universe->description)) <p><h4>Description</h4>{{$t_universe->description}}</p> @endif
                      @if (isset($t_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$t_universe->origins_and_location}}</p> @endif
                      @if (isset($t_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$t_universe->miscellaneous_information}}</p> @endif
                      @if (isset($t_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$t_universe->rules_and_limits}}</p> @endif
                      @if (isset($t_universe->content)) <p><h4>Description</h4>{{$t_universe->content}}</p> @endif
                      @if (isset($t_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$t_universe->technical_terms_jargons}}</p> @endif
                      <br/>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- Other --}}
        @if(isset($o_universes) && $o_universes != null && count($o_universes)>0)
          <div class="row">
            <div class="col-md-12">
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Other</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  @foreach ($o_universes as $o_universe)
                      @if (isset($o_universe->title)) <h2>{{$o_universe->title}}</h2> @endif
                      @if (isset($o_universe->name)) <h2>{{$o_universe->name}}</h2> @endif
                      @if (isset($o_universe->description)) <p><h4>Description</h4>{{$o_universe->description}}</p> @endif
                      @if (isset($o_universe->origins_and_location)) <p><h4>Origins And Locations</h4>{{$o_universe->origins_and_location}}</p> @endif
                      @if (isset($o_universe->miscellaneous_information)) <p><h4>Miscellaneous Information</h4>{{$o_universe->miscellaneous_information}}</p> @endif
                      @if (isset($o_universe->rules_and_limits)) <p><h4>Rules and Limits</h4>{{$o_universe->rules_and_limits}}</p> @endif
                      @if (isset($o_universe->content)) <p><h4>Description</h4>{{$o_universe->content}}</p> @endif
                      @if (isset($o_universe->technical_terms_jargons)) <p><h4>Technical Terms Jargons</h4>{{$o_universe->technical_terms_jargons}}</p> @endif
                      <br/>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        @endif

    </div>

@endsection

