<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticlesContent;
use App\Models\SeriesType;
use App\Models\ArticleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index($id)
    {
        $seriesType = SeriesType::findOrFail($id);
        $article = Article::where('series_type_id', $seriesType->id)->get();
        $articleType = ArticleType::all();

        // if(Auth::user()->admin == 1) {
            return view('Home.Articles', ([
                'seriesType' => SeriesType::findOrFail($id),
                'article' => $article,
                'articleType' => $articleType
            ]));
        // } else {
        //     return redirect(url("/"));
        // }
    }

    public function create()
    {
        if(Auth::user()->admin == 1) {
            return view('Articles.articleTitleCreate',([
                'seriesTypeID' => SeriesType::all(),
                'articleType' => ArticleType::all()
            ]));
        } else {
            return redirect(url("/"));
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->admin == 1) {
            $article = Article::create([
                'article_title' => $request->article_title,
                'article_type_id' => $request->article_type,
                'series_type_id' => $request->section_type
            ]);

            if($article)
                return redirect(url('articles/craete'))->with('success', 'Successfully added');
            else
            return redirect(url('articles/craete'))->with('failed', 'failed to add');
        } else {
            return redirect("/");
        }
    }

    public function typeCreate()
    {
        if(Auth::user()->admin == 1) {
            return view('Articles.articlesTypeCreate');
        } else {
            return redirect("/");
        }
    }

    public function storeType(Request $request)
    {
        if(Auth::user()->admin == 1) {
            $article = ArticleType::create([
                'articleType' => $request->article_type,
            ]);

            if($article)
                return redirect(url('articles/typeCreate'))->with('success', 'Successfully added');
            else
            return redirect(url('articles/typeCreate'))->with('failed', 'failed to add');
        } else {
            return redirect("/");
        }
    }

    public function article_menu()
    {
        return view('Articles.menuArticle', ([
            'series' => SeriesType::select(['seriestype', 'id'])->get()
        ]));
    }

    public function article_show($id)
    {
        $series_type_id = SeriesType::findOrFail($id);

        return view('Articles.articleList', ([
            'article' => Article::where('series_type_id', $series_type_id->id)->get()
        ]));
    }

    public function article_content($id)
    {
        return view('Articles.articleContent', ([
            'article' => ArticlesContent::where('article_id', $id)->get(),
            'articleTitleID' => $id
        ]));
    }

    public function article_create($id)
    {
        return view('Articles.articleContentCreate', ([
            'articleId' => $id
        ]));
    }

    public function article_content_store(Request $request)
    {
        //storing iamage
        if($request->article_image){
            $filename = time() . '_' . $request->file('article_image')->getClientOriginalName();
            $file = $request->file('article_image');
            $tmpFilePath = public_path().'/asset/images/';
            $file = $file->move($tmpFilePath, $filename);
            $image = 'asset/images/'.$filename;
        } elseif($request->image == null) {
            $image = $request->image;
        }


        $article = ArticlesContent::create([
            'heading' => $request->article_type,
            'image_path' => $image,
            'article_id' => $request->articleId,
            'description' => $request->article_description
        ]);

        if($article)
            return redirect()->back()->with('success', 'Successfully added');
        else
            return redirect()->back()->with('failed', 'failed to add');
    }

    public function delete_article_title($id)
    {
        $article_title = Article::findOrFail($id);
        $article_content = ArticlesContent::where('article_id', $article_title->id)->get();

        foreach ($article_content as $ac) {
            unlink(public_path().('/').$ac->image_path);
            $ac->delete();
        }
        $article_title->delete();

        return redirect()->back();
    }

    public function delete_article_content($id)
    {
        $articleContent = ArticlesContent::findOrFail($id);
        unlink(public_path().('/').$articleContent->image_path);
        $articleContent->delete();

        return redirect()->back();
    }

    public function edit_article_content($id)
    {
        return view('Articles.articleEdit', ([
            'article' => ArticlesContent::findOrFail($id)
        ]));
    }

    public function update_article_content(Request $request)
    {
        $at = ArticlesContent::findOrFail($request->id);
        //storing iamage
        if($request->article_image){
            unlink(public_path().('/').$at->image_path);
            $filename = time() . '_' . $request->file('article_image')->getClientOriginalName();
            $file = $request->file('article_image');
            $tmpFilePath = public_path().'/asset/images/';
            $file = $file->move($tmpFilePath, $filename);
            $image = 'asset/images/'.$filename;
        } elseif($request->image == null) {
            $image = $at->image_path;
        }

        $article = ArticlesContent::updateOrCreate([
            'article_id' => $request->articleId,
        ], [
            'heading' => $request->article_type,
            'image_path' => $image,
            'description' => $request->article_description
        ]);

        if($article)
            return redirect()->back()->with('success', 'Successfully updated');
        else
            return redirect()->back()->with('failed', 'failed to update');
    }

    public function article_show_article($id)
    {
        $articleTypeId = Article::findOrFail($id)->article_type_id;

        return view('Home.Articles_show', ([
            'articleType' => ArticleType::findOrFail($articleTypeId),
            'articleContent' => ArticlesContent::where('article_id', $id)->get()
        ]));
    }

    public function article_type_show()
    {
        return view('Articles.articleTypeShow', ([
            'articleTypes' => ArticleType::all()
        ]));
    }

    // public function article_type_delete($id)
    // {
    //     $articleType = ArticleType::findOrFail($id);
    //     $article = Article::where('article_type_id', $articleType->id)->get();
    //     // dd($article);
    //     foreach ($article as $art) {
    //         // dd($art);
    //         $art->delete();
    //     }
    //     $articleType->delete();
    //     return redirect()->back();
    // }
}
