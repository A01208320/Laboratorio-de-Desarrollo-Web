<?php

namespace App\Http\Controllers;

use App\Platform;
use App\User;
use App\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = auth()->user();
        $user = User::find($auth_user->id);
        $titles = Title::getAllTitles();
        if (\Request::is('api/*')) {
            return response()->json($titles->get(), 200);
            exit();
        }
        if (request('query')) {
            $titles = $this->search()->paginate(5);
        } else {
            if ($user->hasAnyRole('registeredUser')) {
                $titles = Title::getApprovedTitles()->paginate(5);
            } else {
                $titles = $titles->paginate(5);
            }
        }
        return view('titles.index', compact('titles'));
    }


    public function search()
    {
        $value = request('query');
        if ($value == 'Aprobado' || $value == 'aprobado') {
            $value = 1;
        } else if ($value == 'Pendiente' || $value == 'pendiente') {
            $value = 0;
        }
        $titles = Title::filterTitles($value);
        return $titles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platforms = Platform::all();
        return view('titles.create', compact('platforms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTitle();
        $review = Title::firstOrCreate(([
            'name' => $request->name,
            'edition' => $request->edition,
            'platform_id' => $request->platform_id,
        ]));
        return view('titles.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        //
    }

    public function confirm(Title $title)
    {
        return view('titles.confirm', compact('title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        Title::destroy($title->id);
        return view('titles.success');
    }

    public function validateTitle()
    {
        $rules = [
            'name' => ['required'],
            'edition' => ['required'],
            'platform_id' => ['required'],

        ];
        $custom_messages = [
            'name.required' => 'Proporciona un nombre.',
        ];
        return request()->validate($rules, $custom_messages);
    }
}
