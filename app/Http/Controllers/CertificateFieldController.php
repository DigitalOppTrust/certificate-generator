<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateFieldRequest;
use App\Http\Requests\UpdateCertificateFieldRequest;
use App\Models\CertificateField;

class CertificateFieldController extends Controller
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
     * @param  \App\Http\Requests\StoreCertificateFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateFieldRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateField  $certificateField
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateField $certificateField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateField  $certificateField
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateField $certificateField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateFieldRequest  $request
     * @param  \App\Models\CertificateField  $certificateField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateFieldRequest $request, CertificateField $certificateField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateField  $certificateField
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateField $certificateField)
    {
        //
    }
}
