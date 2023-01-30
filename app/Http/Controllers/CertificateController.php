<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Inertia\Inertia;

class CertificateController extends Controller
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
     * @param  \App\Http\Requests\StoreCertificateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function upsert(Certificate $certificate = null)
    {
        if (!$certificate) {
            $certificate = new Certificate();
        }

        $certificate->user_id = auth()->user()->id;
        $certificate->name = request('name');
        $certificate->save();

        return redirect()->route('certificate.upsert', ['certificate' => $certificate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return Inertia::render('Certificate/Setup', [
            'certificate' => $certificate,
        ]);
    }

    public function showBuilder(Certificate $certificate)
    {
        return Inertia::render('Certificate/Builder', [
            'certificate' => $certificate,
        ]);
    }

    public function showPreview(Certificate $certificate, User $user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }

        $search = [
            '{{firstname}}',
            '{{lastname}}',
        ];
        $replace = [
            $user->firstname,
            $user->lastname,
        ];
        return str_replace($search, $replace, $certificate->html);
    }

    public function builderUpdate(Certificate $certificate)
    {
        $certificate->html = request('html');
        $certificate->save();

        return redirect()->route('certificate.builder', ['certificate' => $certificate]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateRequest  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
