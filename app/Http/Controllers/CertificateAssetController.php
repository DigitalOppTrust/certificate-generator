<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateAssetRequest;
use App\Http\Requests\UpdateCertificateAssetRequest;
use App\Models\Certificate;
use App\Models\CertificateAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CertificateAssetController extends Controller
{

    public function store(Certificate $certificate, Request $request)
    {
        // validate the image
        $validatedData = $request->validate([
            'asset' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // store the image
        $originalName = request()->asset->getClientOriginalName();
        $fullPath = storage_path('app/public/certificates/' . $certificate->uuid . '/assets');

        $assetName = $originalName . '.' . request()->asset->getClientOriginalExtension();

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true);
        }

        $request->asset->storeAs('public/certificates/' . $certificate->uuid . '/assets', $assetName);

        // save the image path to the database
        $certificate->assets()->create([
            'user_id' => auth()->user()->id,
            'path' => 'certificates/' . $certificate->uuid . '/assets/' . $assetName,
        ]);


        return redirect()->route('certificate.assets', [
            'certificate' => $certificate,
        ])->with('message', 'Successfully Deleted')->with('reload', true);

        // return response()->inertia('certificate.assets', [
        //     'certificate' => $certificate,
        //     'assets' => $certificate->assets,
        // ]);

        // return Inertia::render('Certificate/Assets', [
        //     'certificate' => $certificate,
        //     'assets' => $certificate->assets,
        // ]);
    }

    public function delete(CertificateAsset $asset)
    {
        $certificate = $asset->certificate;

        // delete the image file
        Storage::disk('public')->delete($asset->path);

        // delete the image record from the database
        $asset->delete();

        return redirect()->route('certificate.assets', [
            'certificate' => $certificate,
        ])->with('message', 'Successfully Deleted')->with('reload', true);
    }

    public function show(Certificate $certificate)
    {
        return Inertia::render('Certificate/Assets', [
            'certificate' => $certificate,
            'assets' => $certificate->assets,
        ]);
    }


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
