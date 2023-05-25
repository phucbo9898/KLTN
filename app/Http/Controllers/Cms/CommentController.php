<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(RatingRepository $ratingRepo)
    {
        $this->ratingRepo = $ratingRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = $this->ratingRepo->all();

        return view('cms.comment.index', compact('ratings'));
    }

    public function action($action,$id){
        if($action){
            $rating = Rating::find($id);
            switch ($action) {
                case 'delete':
                    $product = Rating::find($id)->product;
                    $product->total_star -= $rating->number;
                    $product->number_of_reviewers -= 1;
                    $product->save();
                    $rating->delete();
                    return redirect()->route('admin.comment.index');
                    break;
            }
        }
        return redirect()->back();
    }
}
