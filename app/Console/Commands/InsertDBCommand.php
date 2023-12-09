<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class InsertDBCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle () {
        Article::query()
               ->truncate();
        $items = file_get_contents(asset('assets/db.json'));
        $items = json_decode($items , true);
       // dd($items[0]);
        foreach ( $items as $item ) {
            Article::query()
                   ->create([
                                'network_name' => $item[ 'Network name' ] ,
                                'categories' => $item[ 'Category' ] ,
                                'tags' => $item[ 'Tags' ] ,
                                'paper_title' => $item[ 'Paper Title' ] ,
                                'authors' => $item[ 'Authors' ] ,
                                'paper_doi' => $item[ 'Paper DOI ' ] ,
                                'link_to_paper' => $item[ 'PDF' ] ,
                                'google_scholar' => $item[ 'Google Scholar' ] ,
                                'year' => $item[ 'Year' ] ,
                                'conference' => $item[ 'c' ] ,
                            ]);
        }

        return Command::SUCCESS;
    }
}
