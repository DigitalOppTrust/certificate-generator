<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateUserRequest;
use App\Http\Requests\UpdateCertificateUserRequest;
use App\Models\Certificate;
use App\Models\CertificateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
    public function store(Request $request, Certificate $certificate)
    {
        $file = $request->file('csv');

        $csv = array_map('str_getcsv', file($file->getRealPath()));

        $headers = $csv[0];

        $users = [];

        foreach ($csv as $key => $row) {
            if ($key === 0) {
                continue;
            }

            $userX = [];

            foreach ($headers as $headerKey => $header) {
                $userX[strtolower($header)] = $row[$headerKey];
            }

            if (filter_var($userX['email'], FILTER_VALIDATE_EMAIL)) {
                $user = User::firstOrNew([
                    'email' => $userX['email'],
                ]);
                $user->firstname = $userX['firstname'];
                $user->lastname = $userX['lastname'];
                $user->password = bcrypt('password');
                $user->save();

                $certificateUser = CertificateUser::firstOrCreate([
                    'certificate_id' => $certificate->id,
                    'user_id' => $user->id,
                ]);
            }
        }

        $certificate->users()->createMany($users);

        return redirect()->route('certificate.users.addcsv', ['certificate' => $certificate]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {

        $certificate->load('users');

        return Inertia::render('Certificate/Users', [
            'certificate' => $certificate,
        ]);
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
