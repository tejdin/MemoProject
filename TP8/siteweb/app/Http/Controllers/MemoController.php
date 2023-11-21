<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function createMemo(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $memo = new Memo();
        $memo->title = $title;
        $memo->content = $content;
        $memo->save();
        return to_route('account');
    }
    public function showMemos()
    {
        $memo= new Memo();
        $memos = $memo->all();
        return view('memolist', ['memos' => $memos]);
    }

}
