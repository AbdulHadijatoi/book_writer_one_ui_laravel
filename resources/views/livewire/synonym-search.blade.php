<div class="content">

    <div class="row justify-content-end">

        <div class="col-lg-12 mb-4">
            <form action="bd_search.html" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search synonym..."
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
        <div class="row  justify-content-end">
            <div class="col-lg-5" style="z-index:1; position: absolute;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Search Results
                        </h3>


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


                        {{-- @if (strlen($search) >= 3 && !count($result))
                            <div class="d-flex align-items-center px-3 py-2 font-normal">No results found.</div>
                        @endif --}}
                    </div>
                </div>

            </div>
        </div>

    @endif
</div>
