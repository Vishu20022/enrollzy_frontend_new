<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityLike;
use App\Models\CommunityReply;
use App\Models\CommunityQuestion;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function toggleLike(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string|in:question,reply',
        ]);

        $userId = Auth::id();
        $likableType = $request->type == 'question' ? CommunityQuestion::class : CommunityReply::class;
        $likableId = $request->id;

        $like = CommunityLike::where('user_id', $userId)
            ->where('likable_type', $likableType)
            ->where('likable_id', $likableId)
            ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            CommunityLike::create([
                'user_id' => $userId,
                'likable_type' => $likableType,
                'likable_id' => $likableId,
            ]);
            $liked = true;
        }

        $count = CommunityLike::where('likable_type', $likableType)
            ->where('likable_id', $likableId)
            ->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'count' => $count
        ]);
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:community_questions,id',
            'parent_id' => 'nullable|exists:community_replies,id',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'question_id' => $request->question_id,
            'parent_id' => $request->parent_id,
            'content' => $request->content,
            'status' => 'pending',
            'is_active' => true,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '_reply.' . $request->image->extension();
            $request->image->move(public_path('images/community/replies'), $imageName);
            $data['image'] = 'images/community/replies/' . $imageName;
        }

        $reply = CommunityReply::create($data);

        return response()->json([
            'success' => true,
            'reply' => $reply->load('user'),
            'message' => 'Reply posted successfully. It is now awaiting admin approval.'
        ]);
    }
}
