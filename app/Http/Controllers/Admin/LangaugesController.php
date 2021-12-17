<?php

namespace App\Http\Controllers\Admin;
use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use Illuminate\Support\Facades\DB;


class LangaugesController extends Controller
{
    public function index()
    {
        $Languages = Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index',compact('Languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request)
    {

        try {
            Language::create($request->except(['_token']));
            return redirect() -> route('admin.language')->with(['success' => 'تم إدخال البيانات بالنجاح']);
        } catch (\Exeption $ex) {
            return redirect() -> route('admin.language')->with(['error' => '  هناك خطأ ما يرجا المحاول مرة أخرى']);
        }
    }


    public function edit($id)
    {
        $Language = Language::select()->find($id);
        if (!$Language) {
            return redirect() -> route('admin.language') -> with(['error'=> 'هذه اللغة غير موجودة']);
        }
        return view('admin.languages.edit',compact('Language'));

    }

    public function updated(LanguageRequest $request , $id)
    {

        try {
            $Language = Language::find($id);
            if (!$Language) {
                return redirect() -> route('admin.language.edit',$id) -> with(['error'=> 'هذه اللغة غير موجودة']);
            }

            if (!$request -> has('active')) {
                $request -> request -> add(['active'=> 0]);
            }

            $Language->update($request->except(['_token']));
            return redirect() -> route('admin.language')->with(['success' => 'تم تجديث البيانات بالنجاح']);
        } catch (\Exception $ex) {
            return redirect() -> route('admin.language')->with(['error' => '  هناك خطأ ما يرجا المحاول مرة أخرى']);
        }
    }

    public function destroy($id)
    {
        try {
            $Language = Language::find($id);
            if (!$Language) {
                return redirect() -> route('admin.language',$id) -> with(['error'=> 'هذه اللغة غير موجودة']);
            }
            $Language -> delete();
            return redirect() -> route('admin.language')->with(['success' => 'تم حذف البيانات بالنجاح']);
        } catch (\Exeption $ex) {
            return redirect() -> route('admin.language')->with(['error' => '  هناك خطأ ما يرجا المحاول مرة أخرى']);
        }
    }

}
