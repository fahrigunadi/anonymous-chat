<?php

namespace App\Http\Controllers;

use App\Models\GroupChat;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GroupChatController extends Controller
{
    public function ajaxChat(): JsonResponse
    {
        $lastChatId = GroupChat::orderBy('id', 'desc')->first()?->id;
        $chats = GroupChat::get(['browser_id', 'message'])->toArray();
        $chats = array_slice($chats, -10);

        return response()->json([
            'status' => 'Success',
            'chats' => $chats,
            'count_chat' => count($chats),
            'last_chat_id' => $lastChatId
        ]);
    }

    public function ajaxNewChat(Request $request): JsonResponse
    {
        $chats = GroupChat::where('id', '>', $request->last_chat_id)->get();

        return response()->json([
            'status' => 'Success',
            'chats' => $chats,
            'count_chat' => $chats->count(),
            'last_chat_id' => GroupChat::orderBy('id', 'desc')->first()?->id
        ]);
    }

    public function ajaxStoreChat(Request $request): JsonResponse
    {
        GroupChat::create([
            'browser_id' => $request->browser_id,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'Success',
        ]);
    }
}
