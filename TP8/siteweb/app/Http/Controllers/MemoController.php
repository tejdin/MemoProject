<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function createMemo(Request $request)
    {
        try {


        $title = $request->input('title');
        $content = $request->input('content');
        $memo = new Memo();
        $memo->title = $title;
        $memo->content = $content;
        $memo->save();
        return view('formmemo', ['message' => 'Memo added']);
        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }
    }
    public function showMemos()
    {
        try {
            $memo= new Memo();
            $memos = $memo->all();
            return view('showmemos', ['memos' => $memos]);
        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }

    }

}
