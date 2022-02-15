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
                            <a class="link-fx" href="javascript:void(0)">App</a>
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
        <form class="js-validation" action="be_forms_validation.html" method="POST">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Validation Form</h3>
              </div>
              <div class="block-content block-content-full">
                <!-- Regular -->
                <h2 class="content-heading border-bottom mb-4 pb-2">Regular</h2>
                <div class="row items-push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                      Username, email and password validation made easy for your login/register forms
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="val-username">Username <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-email">Email <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-password">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                    </div>
                  </div>
                </div>
                <!-- END Regular -->

                <!-- Advanced -->
                <h2 class="content-heading border-bottom mb-4 pb-2">Advanced</h2>
                <div class="row items-push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                      You can easily validate any kind of data you like either it is in a normal input, a textarea or a select box
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="val-suggestions">Suggestions <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="What would you like to see?"></textarea>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-skill">Best Skill <span class="text-danger">*</span></label>
                      <select class="form-select" id="val-skill" name="val-skill">
                        <option value="">Please select</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="angular">Angular</option>
                        <option value="react">React</option>
                        <option value="vuejs">Vue.js</option>
                        <option value="ruby">Ruby</option>
                        <option value="php">PHP</option>
                        <option value="asp">ASP.NET</option>
                        <option value="python">Python</option>
                        <option value="mysql">MySQL</option>
                      </select>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-currency">Currency <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-currency" name="val-currency" placeholder="$21.60">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-website">Website <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-website" name="val-website" placeholder="http://example.com">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-phoneus">Phone (US) <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-phoneus" name="val-phoneus" placeholder="212-999-0000">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-digits">Digits <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="5">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-number">Number <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-number" name="val-number" placeholder="5.0">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-range">Range [1, 5] <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="val-range" name="val-range" placeholder="4">
                    </div>
                    <div class="mb-4">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Terms &amp; Conditions</a> <span class="text-danger">*</span>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="val-terms" name="val-terms">
                        <label class="form-check-label" for="val-terms">I agree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END Advanced -->

                <!-- Third Party Plugins -->
                <h2 class="content-heading border-bottom mb-4 pb-2">Third Party Plugins</h2>
                <div class="row items-push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                      Check out how easy it is to enable the validation on third party plugins such as Select2
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="val-select2">Select2 <span class="text-danger">*</span></label>
                      <select class="js-select2 form-select" id="val-select2" name="val-select2" style="width: 100%;" data-placeholder="Choose one..">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="angular">Angular</option>
                        <option value="react">React</option>
                        <option value="vuejs">Vue.js</option>
                        <option value="ruby">Ruby</option>
                        <option value="php">PHP</option>
                        <option value="asp">ASP.NET</option>
                        <option value="python">Python</option>
                        <option value="mysql">MySQL</option>
                      </select>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="val-select2-multiple">Select2 Multiple <span class="text-danger">*</span></label>
                      <select class="js-select2 form-select" id="val-select2-multiple" name="val-select2-multiple" style="width: 100%;" data-placeholder="Choose at least two.." multiple>
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="angular">Angular</option>
                        <option value="react">React</option>
                        <option value="vuejs">Vue.js</option>
                        <option value="ruby">Ruby</option>
                        <option value="php">PHP</option>
                        <option value="asp">ASP.NET</option>
                        <option value="python">Python</option>
                        <option value="mysql">MySQL</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- END Third Party Plugins -->

                <!-- Submit -->
                <div class="row items-push">
                  <div class="col-lg-7 offset-lg-4">
                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                  </div>
                </div>
                <!-- END Submit -->
              </div>
            </div>
          </form>
          <!-- jQuery Validation -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
