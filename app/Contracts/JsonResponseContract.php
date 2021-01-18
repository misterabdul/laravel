<?php

namespace App\Contracts;

class JsonResponseContract
{
    /**
     * Handle JSON formatting output.
     * 
     * @param string $message
     * @param int $status
     * @param string|array|object $content
     */
    public function json(string $message = '', $status = 200, $content = [])
    {
        return response()->json([
            'message' => $message,
            'content' => $content
        ], $status);
    }
}
