<?php

namespace App\Http\Controllers;

use App\Platform;
use App\User;
use App\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        $this->middleware('auth.RegisteredUser')->except(['index', 'create', 'store', 'edit', 'update', 'destroy', 'confirm']);
        $this->middleware('auth.Administrator')->except(['index', 'create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = auth()->user();
        if ($auth_user) {
            $user = User::find($auth_user->id);
        } else {
            $user = null;
        }
        $titles = Title::getAllTitles();
        if (\Request::is('api/*')) {
            return response()->json($titles->get(), 200);
            exit();
        }

        if (request('query')) {
            $titles = $this->search()->paginate(5);
        } else {
            if ($user) {
                if ($user->hasAnyRole('registeredUser')) {
                    $titles = Title::getApprovedTitles()->paginate(5);
                } else {
                    $titles = $titles->paginate(5);
                }
            } else {
                $titles = Title::getApprovedTitles()->paginate(5);
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
        $auth_user = auth()->user();
        $user = User::find($auth_user->id);
        if ($user->hasAnyRole('registeredUser')) {
            $titles = Title::filterApprovedTitles($value);
        } else {
            $titles = Title::filterAllTitles($value);
        }
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
        $auth_user = auth()->user();
        $user = User::find($auth_user->id);
        if ($user->hasAnyRole('registeredUser')) {
            $state = 0;
        } else {
            $state = 1;
        }
        $review = Title::firstOrCreate(([
            'name' => $request->name,
            'edition' => $request->edition,
            'platform_id' => $request->platform_id,
            'state' => $state,
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
        $platforms = Platform::all();
        return view('titles.edit', compact('title', 'platforms'));
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
        $title->update([
            'name' => $request->name,
            'edition' => $request->edition,
            'platform_id' => $request->platform_id,
            'state' => $request->state,
        ]);
        return view('titles.success');
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
