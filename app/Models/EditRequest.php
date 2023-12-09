<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditRequest extends Model
{
    protected $guarded = [];

    public function accept(){
        $article = Article::query()->findOrFail($this->article_id);
        $article->network_name = $this->network_name;
        $article->paper_title = $this->paper_title;
        $article->categories = $this->categories;
        $article->tags = $this->tags;
        $article->year = $this->year;
        $article->paper_doi = $this->paper_doi;
        $article->link_to_paper = $this->link_to_paper;
        $article->authors = $this->authors;
        $article->google_scholar = $this->google_scholar;
        $article->bibtex = $this->bibtex;
        $article->conference = $this->conference;
        $article->save();
    }
}
