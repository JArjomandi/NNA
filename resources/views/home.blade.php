@extends('master')
@section('content')
    <section class="breadcrumbs">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Latest articles</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <b style="color: #cb161f; background-color: #b6d4fe; font-size: 20px">[{{ \App\Models\Article::query()->count() }} Networks registered!]</b>
            </div>

        </div>
    </section>
    <div class="container-fluid">
        <form action="{{ route('home') }}">
            <div class="row mb-3 mt-3">
                <div class="col-4">
                    <input name="search" type="text" class="form-control" id="search" placeholder="U-net, or Kaiming He, or 2015, etc..." value="{{ request('search') }}">
                </div>
                {{-- add select for sort by year asc and desc--}}
                <div class="col-2">
                    <select name="sort" class="form-control" id="sort">
                        <option value="">Sort by:</option>
                        <option value="alphabet_desc" @if(request('sort') == 'alphabet_desc') selected @endif>Sort by Alphabet desc</option>
                        <option value="alphabet_asc" @if(request('sort') == 'alphabet_asc') selected @endif>Sort by Alphabet asc</option>
                        <option value="year_desc" @if(request('sort') == 'year_desc') selected @endif>Sort by year desc</option>
                        <option value="year_asc" @if(request('sort') == 'year_asc') selected @endif>Sort by year asc</option>
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Network name</th>
                            <th style="width: 15px">Categories</th>
                            <th>Tags</th>
                            <th>Paper Title</th>
                            <th>Authors</th>
                            <th>Year</th>
                            <th>Conference/journal </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->network_name }}</td>
                                <td>
                                    @foreach(explode(',', $article->categories) as $item)
                                        <a href="{{ route('home', ['category' => ($item)]) }}">{{ mb_substr($item,0,7) }}</a>@if(!$loop->last),<br>@endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach(explode(',', $article->tags) as $item)
                                        <a href="{{ route('home', ['tag' => ($item)]) }}">{{ mb_substr($item, 0, 20) }}</a>@if(!$loop->last),<br>@endif
                                    @endforeach
                                </td>
                                <td>
                                    <b>{{ $article->paper_title }}</b>
                                    <br>
                                    [<a href="{{ $article->paper_doi }}">Doi</a>]
                                    [<a href="{{ $article->google_scholar }}">Google scholar</a>]
                                    [<a href="{{ $article->link_to_paper }}">PDF</a>]
                                    [<a href="{{ route('update-form', $article->id) }}"><b class="text-danger">Request edit</b></a>]
                                </td>
                                <td>
                                    @foreach(explode(',', $article->authors) as $item)
                                        <a href="{{ route('home', ['author' => ($item)]) }}">{{ $item }}</a>@if(!$loop->last),<br>@endif
                                    @endforeach
                                </td>
                                <td>{{ $article->year }}</td>
                                <td>{{ $article->conference }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
