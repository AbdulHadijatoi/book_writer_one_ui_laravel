<div class="content position-relative">

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="bd_search.html" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" onblur="document.getElementById('synonym_result_container').style.visibility = 'hidden';" onfocus="document.getElementById('synonym_result_container').style.visibility = 'visible';" placeholder="Search synonym..."
                        wire:model.debounce.300ms="search">
                    <span class="input-group-text">
                        <i wire:target='search' wire:loading.remove class="fa fa-fw fa-search"></i>
                        <div wire:target='search' wire:loading class="spinner-border spinner-border-sm text-primary"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </span>
                </div>
            </form>
        </div>
    </div>


    @if ($result)

    <div id="synonym_result_container" class="row position-absolute" style="max-width: 300px">
      <div class="col-12">
        <div class="block">
          <div class="block-header">
            <h3 class="block-title">Search Results</h3>
          </div>
          <div class="block-content">
            <div style="text-transform:uppercase;"
                class="px-3 py-2 text-xs font-weight-bold text-white uppercase bg-primary">
                {{ $result->type ?? 'No match found!'}}
            </div>
            <ul style="padding:0!important;">
                <li class="d-flex align-items-center px-2 py-2 font-normal no-underline"
                    style="text-decoration: dotted !important;">
                    <a href="#">
                        <div>{{ $result->synonym ?? '' }}</div>
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    
        
    @endif
</div>
