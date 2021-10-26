@extends('layout.app')

@section('content')


    <!-- Contact Section-->
    <section class="masthead page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz klienta {{ $customer->id }}</h2>
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
                    <form action="{{route('customers.update', ['klienci'=> $customer->id])}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        {{ csrf_field() }}
                            @method('PUT')
                        <!-- Invoice number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" value="{{ $customer->name }}"
                                   placeholder="Nazwa klienta"
                                   data-sb-validations="required"/>
                            <label >Numer faktury</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">Podaj nazwę klienta.</div>
                        </div>
                        <!-- Date address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="address" name="address" type="text" placeholder="Adres" value="{{ $customer->address }}"
                                   data-sb-validations="required"/>
                            <label>Adres</label>
                            <div class="invalid-feedback" data-sb-feedback="address:required">Podaj adres klienta.
                            </div>

                        </div>
                        <!-- Total cost input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nip" name="nip" type="text" placeholder="NIP" value="{{ $customer->nip }}"
                                   data-sb-validations="required"/>
                            <label>NIP</label>
                            <div class="invalid-feedback" data-sb-feedback="nip:required">Podaj NIP.
                            </div>
                        </div>


                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz dane klienta</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
