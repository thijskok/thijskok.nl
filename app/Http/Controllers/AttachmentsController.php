<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentsController extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  Request  $request
     *
     * @return false|string
     */
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('files');

        return url($path);
    }
}
