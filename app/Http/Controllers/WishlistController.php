<?php

namespace App\Http\Controllers;

use App\Models\OffreStage;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($offreStageId)
    {
        $user = Auth::user();
        $exists = Wishlist::where('user_id', $user->id)->where('offre_stage_id', $offreStageId)->exists();

        if (!$exists) {
            $wishlist = new Wishlist();
            $wishlist->user_id = $user->id;
            $wishlist->offre_stage_id = $offreStageId;
            $wishlist->save();
        }

        return back()->with('success', 'Added to wishlist.');
    }
    public function index()
    {
        $userId = auth()->id(); // Get the authenticated user's ID
        $wishlistItems = Wishlist::where('user_id', $userId)
            ->with('offreStage') // Assuming 'offreStage' is the relationship on the Wishlist model
            ->paginate(10); // Paginate with 10 items per page

        return view('wishlist.index', compact('wishlistItems'));
    }
    public function removeFromWishlist($offreStageId)
    {
        $user = Auth::user();

        // Check if the item exists in the user's wishlist before attempting to remove it
        $exists = Wishlist::where('user_id', $user->id)
            ->where('offre_stage_id', $offreStageId)
            ->exists();

        if ($exists) {
            // Remove the item from the wishlist
            Wishlist::where('user_id', $user->id)
                ->where('offre_stage_id', $offreStageId)
                ->delete();
        }

        return back()->with('success', 'Removed from wishlist.');
    }





    // public function removeFromWishlist($offreStageId)
    // {
    //     $user = Auth::user();
    //     $user->wishlistedOffres()->detach($offreStageId);

    //     return back()->with('success', 'Removed from wishlist.');
    // }
}
