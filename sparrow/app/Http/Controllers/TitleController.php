<?php

namespace App\Http\Controllers;

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
        $titles = Title::getAllTitles();
        if (\Request::is('api/*')) {
            return response()->json($titles->get(), 200);
            exit();
        }
        if (request('query')) {
            $titles = $this->search()->paginate(5);
        } else {
            $titles = $titles->paginate(5);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
    }
}
