<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Review;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->feed_reviews()->orderBy('created_at', 'asc')->paginate(100);

            $data = [
                'user' => $user,
                'reviews' => $reviews,
            ];
        }
        return view('shops.show', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->reviews()->create([
            'content' => $request->content,
            'shop_id' =>$request->shop_id,
        ]);

        return redirect()->back();
    }
        
        public function destroy($id)
    {
        $review = \App\Review::find($id);

        if (\Auth::user()->id === $review->user_id) {
            $review->delete();
        }
        return redirect()->back();
    }
}
