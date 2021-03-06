@extends('layouts.app')

@section('content')


<div class="container registrationContainer mt-5">
    <img class="background-img" src="{{ asset('images\caste.jpg') }}" alt="header-background">
    <div class="overlay-container"></div>
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                    <a class="navbar-brand " href="#page-top"><img class="" src="{{ asset('images\logo.png') }}" alt="logo"> <span class="logo-text pr-2">CSAS</span></a>
                    <p class="h3 text-light">Registration Form</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    {{-- <div class="bg-light text-center  py-2"><h3>Personal Information</h3></div> --}}

                    {{-- full name --}}
                    <div class="row mb-3 mt-3 border-bottom pb-3 ">
                        <div class="border-bottom "><h5>Full Name</h5></div>
                        <div class="row">
                            <div class="col-6">
                                <label for="lname" class="col-md-4 col-form-label text-md-start">{{ __(' Last Name') }}</label>
                                <div class="">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="fname" class="col-md-4 col-form-label text-md-start">{{ __(' First Name') }}</label>

                                <div class="">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="mname" class="col-md-4 col-form-label text-md-start">{{ __(' Middle Name') }}</label>

                                <div class="">
                                    <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" >

                                    @error('mname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="suffix" class="col-md-4 col-form-label text-md-start">{{ __('Suffix') }}</label>

                                <div class="">
                                    <input id="suffix" type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ old('suffix') }}" >

                                    @error('suffix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                       {{-- gender --}}

                    <div class="row mb-3 border-bottom pb-3">
                        <div class="border-bottom ">
                            <h5>Gender and Day of Birth</h5>
                        </div>
                        <div class="row">
                            <div class="col-3 mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-start">{{ __('Gender') }}</label>

                                <div class="">
                                <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" aria-label="Default select example" required autofocus>
                                <option  value="">Choose One</option>

                                <option  value="Male">Male</option>
                                <option  value="Female">Female</option>
                                <option  value="Female">Prefer not to mention</option>
                                </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="bday" class="col-md-4 col-form-label text-md-start">{{ __('Birth Date') }}</label>

                                <div class="">
                                    <input id="bday" type="date" class="form-control @error('bday') is-invalid @enderror" name="bday" value="{{ old('bday') }}" required autocomplete="bday">

                                    @error('bday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- address --}}
                    <div class="row mb-3 border-bottom pb-3">
                        <div class="border-bottom ">
                            <h5>Address</h5>
                        </div>
                        <div class="col-6">
                            <label for="region" class="col-md-4 col-form-label text-md-start">{{ __('Region') }}</label>

                            <div class="">
                            <select id="region" name="region" class="form-control form-select @error('region') is-invalid @enderror" aria-label="Default select example" required autocomplete="region" autofocus>
                            <option value="">Choose One</option>
                            @foreach($regions as $region)
                            <option data-id="{{$region->regCode}}" value="{{$region->regCode}}">{{$region->regDesc}}</option>
                           @endforeach
                            </select>
                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="provSelect" class="col-6 mb-3 d-none">
                            <label for="province" class="col-md-4 col-form-label text-md-start">{{ __('Province') }}</label>

                            <div class="col-md-6">
                            <select id="province" name="province" class="form-control form-select @error('province') is-invalid @enderror" aria-label="Default select example" required autocomplete="region" autofocus>


                            <option value="">Choose One</option>

                            </select>
                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="munSelect" class="col-6 mb-3 d-none">
                            <label for="municipality" class="col-md-4 col-form-label text-md-start">{{ __('Municipality') }}</label>

                            <div class="col-md-6">
                            <select id="municipality" name="municipality" class="form-control form-select @error('municipality') is-invalid @enderror" aria-label="Default select example" required autofocus>
                            <option value="">Choose One</option>

                            </select>
                                @error('municipality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="brgySelect" class="col-6 mb-3 d-none">
                            <label for="brgy" class="col-md-4 col-form-label text-md-start">{{ __('Barangay') }}</label>

                            <div class="col-md-6">
                            <select id="brgy" name="brgy" class="form-control form-select @error('brgy') is-invalid @enderror" aria-label="Default select example" required autofocus>
                            <option value="">Choose One</option>

                            </select>
                                @error('brgy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="house" class=" col-6 mb-3 d-none">
                            <label for="house" class="col-md-4 col-form-label text-md-start">{{ __('House and Street Number') }}</label>

                            <div class="col-md-6">
                                <input id="house" type="text" class="form-control @error('house') is-invalid @enderror" name="house" value="" required autofocus>

                                @error('house')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                          {{-- School information --}}
                          <div class="row mb-3 border-bottom pb-3">
                            <div class="border-bottom ">
                                <h5>School Information</h5>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="course" class="col-md-4 col-form-label text-md-start">{{ __('Course') }}</label>

                                    <div class="">
                                        <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" required >

                                        @error('course')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="school" class="col-md-4 col-form-label text-md-start">{{ __('School Name') }}</label>

                                    <div class="">
                                    <select id="school" name="school" class="form-control form-select @error('course') is-invalid @enderror" aria-label="Default select example" required autofocus>
                                    <option  value="">Choose one</option>
                                    @foreach($schools as $school)
                                    <option  value="{{$school->id}}">{{$school->name}}</option>
                                   @endforeach
                                    </select>
                                        @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                            {{-- Household Income --}}
                            <div class="row mb-3 border-bottom pb-3">
                                <div class="border-bottom ">
                                    <h5>Household Income</h5>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="income" class="col-md-4 col-form-label text-md-start">{{ __('Monthly Income') }}</label>

                                        <div class="">
                                            <input id="income" type="number" class="form-control @error('income') is-invalid @enderror" name="income" value="{{ old('income') }}" required >

                                            @error('income')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                                  {{-- Account Credentials --}}
                                  <div class="row mb-3 border-bottom pb-3">
                                    <div class="border-bottom ">
                                        <h5>Account Credentials</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                                            <div class="">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                                            <div class="">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                            <div class="">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0 mt-3">
                                        <div class=" justify-content-end d-flex">
                                            <button type="submit" class="btn btn-primary rounded-0 px-3 ">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    regionClick();
    provinceClick();
    municipalityClick();
    brgyClick();

    function regionClick(){
        $('#region').on('change',(event) => {
            var regcode=event.target.value;
            var code=$('#region').attr("data-id")
            console.log(code);
            $('#provSelect').removeClass('d-none');
            $('#provSelect').addClass('d-show');
            $.ajax({
           url: "register/province",
           type:"GET",
           data:{
               regcode: regcode
           },
           success:function(data){
                var $el = $("#province");
                $el.empty(); // remove old options
                $el.append($("<option value=''>Choose One</option>"));
                $.each(data, function(key,value) {
                console.log(value);
                $el.append($("<option></option>")
                    .attr("value", value['provCode']).text(value['provDesc']));
                });
            },
           error: function(error) {
            console.log(error);
           }
          });
        });
    };

    function provinceClick(){
        $('#province').on('change',(event) => {
            var regcode=event.target.value;
            $('#munSelect').removeClass('d-none');
            $('#munSelect').addClass('d-show');
            $.ajax({
           url: "register/municipality",
           type:"GET",
           data:{
               regcode: regcode
           },
           success:function(data){
                var $el = $("#municipality");
                $el.empty(); // remove old options
                $el.append($("<option value=''>Choose One</option>"));
                $.each(data, function(key,value) {
                console.log(value);
                $el.append($("<option></option>")
                    .attr("value", value['citymunCode']).text(value['citymunDesc']));
                });
            },
           error: function(error) {
            console.log(error);
           }
          });
        });
    };

    function municipalityClick(){
        $('#municipality').on('change',(event) => {
            var regcode=event.target.value;
            $('#brgySelect').removeClass('d-none');
            $('#brgySelect').addClass('d-show');
            $.ajax({
           url: "register/brgy",
           type:"GET",
           data:{
               regcode: regcode
           },
           success:function(data){
                var $el = $("#brgy");
                $el.empty(); // remove old options
                $el.append($("<option value=''>Choose One</option>"));
                $.each(data, function(key,value) {
                console.log(value);
                $el.append($("<option></option>")
                    .attr("value", value['brgyCode']).text(value['brgyDesc']));
                });
            },
           error: function(error) {
            console.log(error);
           }
          });
        });
    };

    function brgyClick(){
        $('#brgy').on('change',(event) => {
            console.log('test');
            $('#house').removeClass('d-none');
            $('#house').addClass('d-show');

        });
    }





</script>
@endsection



