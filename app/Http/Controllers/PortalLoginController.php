<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PortalLoginController extends Controller
{

    public function showLogin()
    {
        return view('docs-login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user) {
            $ssoBaseUrl = $this->resolveSsoBaseUrl($user->usertype);
            $ssoLoginUrl = $ssoBaseUrl ? rtrim($ssoBaseUrl, '/') . '/api/sso/login' : null;

            if (! $ssoLoginUrl) {
                return back()->with('error', 'Unsupported user type');
            }

            $response = Http::post($ssoLoginUrl, [
                'email' => $email,
                'password' => $password,
            ]);

            if ($response->successful()) {
                $redirectUrl = $response->json('redirect_url');

                if ($redirectUrl) {
                    Auth::login($user);

                    if (! str_starts_with($redirectUrl, 'http://') && ! str_starts_with($redirectUrl, 'https://')) {
                        $redirectUrl = rtrim($ssoBaseUrl, '/') . '/' . ltrim($redirectUrl, '/');
                    }

                    return redirect()->away($redirectUrl);
                }
            }
        }

        return back()->with('error', 'Invalid email or password');
    }

    private function resolveSsoBaseUrl(?string $userType): ?string
    {
        return match (strtolower((string) $userType)) {
            'client' => 'https://documentation.pocketoffice.sizaf.com/partner',
            'company' => 'https://documentation.pocketoffice.sizaf.com/company',
            'user', 'group' => 'https://documentation.pocketoffice.sizaf.com/user',
            default => null,
        };
    }

}
