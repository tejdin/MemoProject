<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Session;
use App\Models\MyUser;

class MemoController extends Controller
{
    public function createMemo(Request $request)
    {
        if (!$request->has(['title', 'content'])) {
            return to_route('formmemo')->with('error', 'Invalid memo');
        }

        try {
        $title = $request->input('title');
        $content = $request->input('content');
        $isitpublic = $request->input('isitpublic');
        $User = session('user');
        $memo = new Memo();
        if ($request->has('isitpublic')) {
            $memo->is_public = $isitpublic;
        }
        $memo->title = $title;
        $memo->content = $content;


        $memo->user()->associate($User);
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

            $User = session('user');
            $memos = $User->memos()->get();
            return view('memolist', ['memos' => $memos]);

        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }


    }

    public function showPublicMemos()
    {
        try {

            $memos = Memo::where('is_public', 'public')->orderBy('created_at', 'desc')->get();
            return view('home', ['memos' => $memos]);

        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }



    }

    public function DeleteMemo(Request $request)
    {
        try {
            $id = $request->input('id');
            $memo = Memo::find($id);
            $memo->delete();
            return to_route('home')->with('message', 'Memo deleted');
        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }
    }

    public function updateShowView(Request $request)
    {
        try {
            $memo = Memo::find($request->input('id'));
            return view('formupdatememo', ['memo' => $memo]);
        }
        catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }
    }
    public function UpdateMemo(Request $request)
    {
        try {
            $id = $request->input('id');
            $title = $request->input('title');
            $content = $request->input('content');
            $memo = Memo::find($id);
            $memo->title = $title;
            $memo->content = $content;
            $memo->save();
            return to_route('home')->with('message', 'Memo updated');
        } catch (\Exception $e) {
            return to_route('account')->with('error', $e->getMessage());
        }
    }
        public function updateStatus(Request $request)
        {
            try {
                $id = $request->input('id');
                $memo = Memo::find($id);
                if($memo->is_public == 'public') {
                    $memo->is_public = 'private';
                }
                else {
                    $memo->is_public = 'public';
                }
                $memo->save();
                return to_route('home')->with('message', 'Memo updated');
            }
            catch (\Exception $e) {
                return to_route('account')->with('error', $e->getMessage());
            }
        }

        public function showOneMemo(Request $request)
        {
            try {
                $id = $request->input('id');
                $memo = Memo::find($id);
                return view('memoView', ['memo' => $memo]);
            }
            catch (\Exception $e) {
                return to_route('account')->with('error', $e->getMessage());
            }
        }


}
