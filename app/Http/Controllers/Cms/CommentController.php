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
}
