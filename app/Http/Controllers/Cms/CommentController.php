<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    private $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function index()
    {
        $ratings = $this->ratingRepository->get();

        return view('cms.comment.index', compact('ratings'));
    }

    public function action($action,$id){
        try {
            if($action){
                $rating = Rating::find($id);
                $product = $rating->product;
                $product->total_star -= $rating->number;
                $product->number_of_reviewers -= 1;
                $product->save();
                $rating->delete();
                return redirect()->route('admin.comment.index');
            }
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
