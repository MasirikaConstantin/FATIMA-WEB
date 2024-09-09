<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;

class LiveStreamController extends Controller
{
    // L'administrateur lance le direct
    public function startStream(Request $request)
    {
        $stream = Stream::firstOrNew(['id' => 1]);  // On suppose un seul flux
        $stream->status = 'live';
        $stream->started_at = now();
        $stream->save();

        return response()->json(['message' => 'Live stream started']);
    }

    // L'administrateur arrête le direct
    public function stopStream(Request $request)
    {
        $stream = Stream::find(1);  // Flux unique
        if ($stream) {
            $stream->status = 'offline';
            $stream->save();
        }

        return response()->json(['message' => 'Live stream stopped']);
    }

    // Vérifier si un direct est en cours
    public function checkStreamStatus()
    {
        $stream = Stream::find(1);  // Flux unique
        return response()->json([
            'status' => $stream ? $stream->status : 'offline'
        ]);
    }
}

