@extends('layout.app')

@section('content')


    <!-- Contact Section-->
    <section class="masthead page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz fakturę {{ $invoice->id }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
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
                    <form action="{{route('invoices.update', ['id'=> $invoice->id])}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        {{ csrf_field() }}
                            @method('PUT')
                        <!-- Invoice number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="number" name="number" type="text" value="{{ $invoice->number }}"
                                   placeholder="Numer faktury"
                                   data-sb-validations="required"/>
                            <label for="number">Numer faktury</label>
                            <div class="invalid-feedback" data-sb-feedback="number:required">Podaj numer faktury.</div>
                        </div>
                        <!-- Date address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="date" name="date" type="text" placeholder="Data wystawienia" value="{{ $invoice->date }}"
                                   data-sb-validations="required"/>
                            <label>Data wystawienia</label>
                            <div class="invalid-feedback" data-sb-feedback="date:required">Podaj datę wystawienia.
                            </div>

                        </div>
                        <!-- Total cost input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="total" name="total" type="text" placeholder="Kwota" value="{{ $invoice->total }}"
                                   data-sb-validations="required"/>
                            <label>Kwota</label>
                            <div class="invalid-feedback" data-sb-feedback="total:required">Podaj kwotę.
                            </div>
                        </div>


                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz fakturę</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
