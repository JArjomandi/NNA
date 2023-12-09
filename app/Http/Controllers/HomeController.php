<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\EditRequest;
use App\Models\Subscribe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index ( Request $request ) {
        $articles = Article::query()
                           ->where('pending' , false)
                           ->when($request->has('sort') , function ( Builder $query ) use ( $request ) {
                               if ( $request->sort == 'alphabet_asc' ) {
                                   return $query->orderBy('network_name');
                               }
                               if ( $request->sort == 'alphabet_desc' ) {
                                   return $query->orderByDesc('network_name');
                               }
                               if ( $request->sort == 'year_asc' ) {
                                   return $query->orderBy('year');
                               }
                               if ( $request->sort == 'year_desc' ) {
                                   return $query->orderByDesc('year');
                               }
                               else {
                                   return $query->orderByDesc('id');
                               }
                           })
                           ->when($request->has('search') , function ( $query ) use ( $request ) {
                               return $query->where(function ( $subQuery ) use ( $request ) {
                                   $subQuery->where('network_name' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('categories' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('tags' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('year' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('paper_doi' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('link_to_paper' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('conference' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('paper_title' , 'like' , '%' . $request->search . '%')
                                            ->orWhere('authors' , 'like' , '%' . $request->search . '%');
                               });
                           })
                           ->when($request->has('tag') , function ( $query ) use ( $request ) {
                               return $query->where(function ( $subQuery ) use ( $request ) {
                                   $subQuery->where('tags' , 'like' , '%' . $request->tag . '%');
                               });
                           })
                           ->when($request->has('category') , function ( $query ) use ( $request ) {
                               return $query->where(function ( $subQuery ) use ( $request ) {
                                   $subQuery->where('categories' , 'like' , '%' . $request->category . '%');
                               });
                           })
                           ->when($request->has('author') , function ( $query ) use ( $request ) {
                               return $query->where(function ( $subQuery ) use ( $request ) {
                                   $subQuery->where('authors' , 'like' , '%' . $request->author . '%');
                               });
                           });
        $articles = $articles->orderByDesc('id')
                             ->take(100)
                             ->get();

        return view('home' , compact('articles'));
    }

    public function registerForm ( Request $request ) {
        return view('register');
    }

    public function register ( Request $request ) {
        $request->validate([
                               'paper_doi' => [ 'required' ] ,
                           ]);
        $secret = '6Lem-ucoAAAAAFqjdUFmCvjMf_4brlzjxjds65gR';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $request->get("g-recaptcha-response"));
        $responseData = json_decode($verifyResponse);
        if ( !$responseData->success ) {
            abort(400);
        }
        $article = new Article();
        $article->pending = true;
        $article->network_name = $request->network_name;
        $article->paper_title = $request->paper_title;
        $article->categories = $request->categories;
        $article->tags = $request->tags;
        $article->year = $request->year;
        $article->paper_doi = $request->paper_doi;
        $article->link_to_paper = $request->link_to_paper;
        $article->authors = $request->authors;
        $article->google_scholar = $request->google_scholar;
        $article->conference = $request->conference;
        $article->save();
        mail('Netarchipedia@gmail.com' , 'New Request' , "Click here: " . route('review-register-request' , encrypt($article->id)));

        return redirect()
            ->back()
            ->with('success' , "Your request has been submitted and will be published after the administrator's review.");
    }

    public function newsletterForm () {
        return view('newsletter');
    }

    public function newsletter ( Request $request ) {
        $request->validate([
                               'email' => [
                                   'required' ,
                                   'email' ,
                               ] ,
                           ]);
        $secret = '6Lem-ucoAAAAAFqjdUFmCvjMf_4brlzjxjds65gR';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $request->get("g-recaptcha-response"));
        $responseData = json_decode($verifyResponse);
        if ( !$responseData->success ) {
            abort(400);
        }
        Subscribe::query()
                 ->firstOrCreate([
                                     'email' => $request->get('email') ,
                                 ]);
        mail('Netarchipedia@gmail.com' , 'New subscribe' , $request->get('email'));

        return redirect()
            ->back()
            ->with('success' , "Your request has been submitted!");
    }

    public function updateForm ( Request $request , $id ) {
        $article = Article::query()
                          ->findOrFail($id);

        return view('register' , compact('article'));
    }

    public function update ( Request $request , $id ) {
        $article = Article::query()
                          ->findOrFail($id);
        $request->validate([
                               'paper_doi' => [ 'required' ] ,
                           ]);
        $secret = '6Lem-ucoAAAAAFqjdUFmCvjMf_4brlzjxjds65gR';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $request->get("g-recaptcha-response"));
        $responseData = json_decode($verifyResponse);
        if ( !$responseData->success ) {
            abort(400);
        }
        $edit_request = new EditRequest();
        $edit_request->article_id = $article->id;
        $edit_request->network_name = $request->network_name;
        $edit_request->paper_title = $request->paper_title;
        $edit_request->categories = $request->categories;
        $edit_request->tags = $request->tags;
        $edit_request->year = $request->year;
        $edit_request->paper_doi = $request->paper_doi;
        $edit_request->link_to_paper = $request->link_to_paper;
        $edit_request->authors = $request->authors;
        $edit_request->google_scholar = $request->google_scholar;
        $edit_request->conference = $request->conference;
        $edit_request->save();
        mail('Netarchipedia@gmail.com' , 'Edit Request' , "Click here: " . route('review-edit-request' , encrypt($edit_request->id)));

        return redirect()
            ->back()
            ->with('success' , "Your edit request has been submitted and will be published after the administrator's review.");
    }

    public function reviewRegisterRequest ( $token ) {
        $id = decrypt($token);
        $article = Article::query()
                          ->findOrFail($id);
        $similar_article_ids = [];
        foreach ( Article::query()
                         ->where('id' , '!=' , $id)
                         ->get() as $a ) {
            $percent = 0;
            similar_text($a->network_name , $article->network_name, $percent);
            if ( $percent > 55 ) {
                $similar_article_ids[] = $a->id;
            }
        }
        $similar_articles = Article::query()
                                   ->whereIn('id' , $similar_article_ids)
                                   ->get();

        return view('review-register' , compact('article' , 'similar_articles'));
    }

    public function acceptRegisterRequest ( $token ) {
        $id = decrypt($token);
        $article = Article::query()
                          ->findOrFail($id);
        $article->pending = false;
        $article->save();

        return redirect()->route('home');
    }

    public function rejectRegisterRequest ( $token ) {
        $id = decrypt($token);
        $article = Article::query()
                          ->findOrFail($id);
        $article->pending = true;
        $article->save();

        return redirect()->route('home');
    }

    public function reviewEditRequest ( $token ) {
        $id = decrypt($token);
        $edit_request = EditRequest::query()
                                   ->findOrFail($id);

        return view('review-edit' , compact('edit_request'));
    }

    public function acceptEditRequest ( $token ) {
        $id = decrypt($token);
        $edit_request = EditRequest::findOrFail($id);
        $edit_request->accept();

        return redirect()->route('home');
    }

    public function rejectEditRequest ( $token ) {
        $id = decrypt($token);
        $article = EditRequest::query()
                              ->findOrFail($id);

        return redirect()->route('home');
    }
}
