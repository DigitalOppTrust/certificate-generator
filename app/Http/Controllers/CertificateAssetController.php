<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateAssetRequest;
use App\Http\Requests\UpdateCertificateAssetRequest;
use App\Models\CertificateAsset;

class CertificateAssetController extends Controller
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
     * @param  \App\Http\Requests\StoreCertificateAssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateAssetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateAsset  $certificateAsset
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateAsset $certificateAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateAsset  $certificateAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateAsset $certificateAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateAssetRequest  $request
     * @param  \App\Models\CertificateAsset  $certificateAsset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateAssetRequest $request, CertificateAsset $certificateAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateAsset  $certificateAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateAsset $certificateAsset)
    {
        //
    }
}
