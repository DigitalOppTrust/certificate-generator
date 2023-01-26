<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateUserRequest;
use App\Http\Requests\UpdateCertificateUserRequest;
use App\Models\CertificateUser;

class CertificateUserController extends Controller
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
     * @param  \App\Http\Requests\StoreCertificateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateUserRequest  $request
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateUserRequest $request, CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateUser $certificateUser)
    {
        //
    }
}
