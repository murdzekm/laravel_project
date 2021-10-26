@extends('layout.app')

@section('content')
    <!-- Portfolio Section-->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
    </svg>
    <section class="masthead page-section portfolio" id="portfolio">

        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                        <use xlink:href="#info-fill"/>
                    </svg>
                    {{session()->get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dane klienta</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>


            <div class="row align-items-center">
                <div class="col-6 m-lg-5">
                    <p>{{ $customer->name }}</p>
                    <p>{{ $customer->address }}</p>
                    <p>{{ $customer->nip }}</p>
                </div>

            </div>

            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista faktur
                powiązanych</h2>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numer faktury</th>
                    <th scope="col">Data</th>
                    <th scope="col">Kwota</th>
                    <th scope="col">Klient</th>
                    <th scope="col">Operacje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer->invoices as $invoice)
                    <tr>
                        <th scope="row">{{$invoice->id}}</th>
                        <td>{{$invoice->number}}</td>
                        <td>{{$invoice->date}}</td>
                        <td>{{$invoice->total}}</td>
                        <td>{{$invoice->customer->name}}</td>
                        <td><a href="{{ route('invoices.edit', ['id'=> $invoice->id]) }}"
                               class="btn btn-warning btn-outline-secondary">Edytuj</a>
                            <form method="POST" action="{{ route('invoices.delete', ['id'=> $invoice->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="btn btn-danger btn-outline-dark">Usuń
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </section>
@endsection
