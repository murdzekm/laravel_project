@extends('layout.app')

@section('content')


    <!-- Contact Section-->
    <section class="masthead page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dodaj fakturę</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
            <!-- Contact Section Form-->

            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form action="{{route('invoices.store')}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        {{ csrf_field() }}
                        <!-- Invoice number input-->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Wybierz klienta</label>
                                <select name="customer" class="form-select" id="inputGroupSelect01">
                                    <option selected>Wybierz...</option>
                                    @foreach(\App\Models\Customer::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="number" name="number" type="text"
                                   placeholder="Numer faktury"
                                   data-sb-validations="required"/>
                            <label for="number">Numer faktury</label>
                            <div class="invalid-feedback" data-sb-feedback="number:required">Podaj numer faktury.</div>
                        </div>
                        <!-- Date address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="date" name="date" type="date" placeholder="Data wystawienia"
                                   data-sb-validations="required"/>
                            <label>Data wystawienia</label>
                            <div class="invalid-feedback" data-sb-feedback="date:required">Podaj datę wystawienia.
                            </div>

                        </div>
                        <!-- Total cost input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="total" name="total" type="text" placeholder="Kwota"
                                   data-sb-validations="required"/>
                            <label>Kwota</label>
                            <div class="invalid-feedback" data-sb-feedback="total:required">Podaj kwotę.
                            </div>
                        </div>


                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Dodaj fakturę</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
