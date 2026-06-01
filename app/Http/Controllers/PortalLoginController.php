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
            $ssoLoginUrl = $this->resolveSsoLoginUrl($user->usertype);

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
                        $redirectUrl = 'https://documentation.officelescloud.sizaf.com' . $redirectUrl;
                    }

                    return redirect()->away($redirectUrl);
                }
            }
        }

        return back()->with('error', 'Invalid email or password');
    }

    private function resolveSsoLoginUrl(?string $userType): ?string
    {
        return match (strtolower((string) $userType)) {
            'client' => 'https://documentation.officelescloud.sizaf.com/partner/api/sso/login',
            'company' => 'https://documentation.officelescloud.sizaf.com/company/api/sso/login',
            'user', 'group' => 'https://documentation.officelescloud.sizaf.com/user/api/sso/login',
            default => null,
        };
    }

}
