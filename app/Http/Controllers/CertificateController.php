<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function generateCertificate()
    {
        $pdf = PDF::loadView('certificate')->setPaper('A4', 'landscape');
        return $pdf->stream('certificate.pdf');
    }
    public function generateMailCertificate($token)
    {
        $user = User::where('cert_token', $token)->firstOrFail();
        $pdf = PDF::loadView('certificate-mail',['user'=>$user])->setPaper('A4', 'landscape');
        return $pdf->stream('certificate.pdf');
    }
}
