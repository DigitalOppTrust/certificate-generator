<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssuanceRequest;
use App\Http\Requests\UpdateIssuanceRequest;
use App\Models\Issuance;

class IssuanceController extends Controller
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
     * @param  \App\Http\Requests\StoreIssuanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssuanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function show(Issuance $issuance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function edit(Issuance $issuance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIssuanceRequest  $request
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssuanceRequest $request, Issuance $issuance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issuance $issuance)
    {
        //
    }
}
