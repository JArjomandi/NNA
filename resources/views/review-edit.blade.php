@extends('master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>@if(isset($edit_request)) Update {{ $edit_request->network_name }} @else Register @endif </h2>
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
            <form action="@if(isset($edit_request)) {{ route('accept-edit-request', encrypt($edit_request->id)) }} @endif" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="network_name" class="form-label">Network Name</label>
                <input value="{{ @$edit_request->network_name }}" type="text" class="form-control" id="network_name" placeholder="Enter Network Name" name="network_name">
            </div>
            <div class="mb-3 mt-3">
                <label for="paper_title" class="form-label">Paper Title</label>
                <input value="{{ @$edit_request->paper_title }}" type="text" class="form-control" id="paper_title" placeholder="Enter Paper Title" name="paper_title">
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Categories (Comma seperated)</label>
                <input value="{{ @$edit_request->categories }}" type="text" class="form-control" id="categories" placeholder="Enter Categories" name="categories">
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (Comma seperated)</label>
                <input value="{{ @$edit_request->tags }}" type="text" class="form-control" id="tags" placeholder="Enter Tags" name="tags">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input value="{{ @$edit_request->year }}" type="text" class="form-control" id="year" placeholder="Enter Year" name="year">
            </div>
            <div class="mb-3">
                <label for="paper_doi" class="form-label">Paper DOI</label>
                <input value="{{ @$edit_request->paper_doi }}" required type="text" class="form-control" id="paper_doi" placeholder="Enter Paper DOI (Example: https://doi.org/10.48550/arXiv.2005.03191)" name="paper_doi">
            </div>
            <div class="mb-3">
                <label for="link_to_paper" class="form-label">Link to Paper</label>
                <input value="{{ @$edit_request->link_to_paper }}" type="text" class="form-control" id="link_to_paper" placeholder="Enter Link to Paper" name="link_to_paper">
            </div>
            <div class="mb-3">
                <label for="authors" class="form-label">Authors (Comma seperated)</label>
                <input value="{{ @$edit_request->authors }}" type="text" class="form-control" id="authors" placeholder="Enter Authors" name="authors">
            </div>
            <div class="mb-3">
                <label for="google_scholar" class="form-label">Google Scholar</label>
                <input value="{{ @$edit_request->google_scholar }}" type="text" class="form-control" id="google_scholar" placeholder="Enter Google Scholar (Example: https://scholar.google.com/scholar...)" name="google_scholar">
            </div>

            <div class="mb-3">
                <label for="conference" class="form-label">Conference</label>
                <input value="{{ @$edit_request->conference }}" type="text" class="form-control" id="conference" placeholder="Enter Conference" name="conference">
            </div>
            <button type="submit" class="btn btn-primary">Confirm and publish</button>
            </form>
        </div>
    </section>
@endsection

