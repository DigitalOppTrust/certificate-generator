<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFieldRequest;
use App\Http\Requests\UpdateUserFieldRequest;
use App\Models\UserField;

class UserFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserFieldRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserField  $userField
     * @return \Illuminate\Http\Response
     */
    public function show(UserField $userField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserField  $userField
     * @return \Illuminate\Http\Response
     */
    public function edit(UserField $userField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserFieldRequest  $request
     * @param  \App\Models\UserField  $userField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFieldRequest $request, UserField $userField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserField  $userField
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserField $userField)
    {
        //
    }
}
