@extends('master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Newsletter</h2>
            </div>

        </div>
    </section>
    <section class="inner-page">
        <div class="container">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{ route('newsletter') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="network_name" class="form-label">Email</label>
                <input value="" type="email" class="form-control" id="email" placeholder="Enter Network Email" name="email">
            </div>
             <div class="form-group m-form__group">
                    <div class="g-recaptcha-wrapper">
                        <div class="g-recaptcha" data-sitekey="6Lem-ucoAAAAAB3YP9VUs09e1f7ZC9l4Q1wLEswS"></div>
                    </div>
             </div><button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection

