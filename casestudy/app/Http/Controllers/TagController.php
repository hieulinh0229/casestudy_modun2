<?php

namespace App\Http\Controllers;
use App\Like;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use http\Env\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

class TagController extends Controller
{
    public function getIndex()
    {
        $tags = Tag::paginate(10);
        return view('tag.list', compact('tags'));
    }

    public function showAdd()
    {
        return view('tag.create');
    }

    public function update(Request $request)
    {
        $tags = new Tag();

        $tags->descryption = $request->input('descryption');
        $tags->kind = $request->input('kind');

        $tags->save();

        Session::flash('success', 'Ban da them moi thanh cong');

        return redirect()->route('Tag.list');
    }
    public function destroy($id){
        $data = Tag::find($id);
        $data->delete();
        Session::flash('success', 'Xóa thành công');

        return redirect()->route('Tag.list');
    }
    public function editShow($id){
        $tag = Tag::find($id);
        return view('tag.edit', compact('tag'));
    }
    public function edit(Request $request ,$id){

            $tags = Tag::find($id);
            $tags->descryption = $request->input('descryption');
            $tags->kind = $request->input('kind');

            $tags->save();

            Session::flash('success', 'Ban da thay doi thanh cong');

            return redirect()->route('Tag.list');
    }
}
