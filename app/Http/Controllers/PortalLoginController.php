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
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'selected_tab' => ['nullable', 'in:user,company,partner'],
        ]);

        $email = $validated['email'];
        $password = $validated['password'];
        $selectedTab = $validated['selected_tab'] ?? 'user';

        $user = User::where('email', $email)->first();

        if (! $user) {
            return back()
                ->withInput($request->only('email', 'selected_tab'))
                ->with('error', 'Invalid email or password');
        }

        $actualTab = $this->resolveSelectedTab($user->usertype);

        if (! $actualTab) {
            return back()
                ->withInput($request->only('email', 'selected_tab'))
                ->with('error', 'Unsupported user type');
        }

        if ($selectedTab !== $actualTab) {
            return back()
                ->withInput($request->only('email', 'selected_tab'))
                ->with('error', $this->tabMismatchMessage($actualTab));
        }

        $ssoBaseUrl = $this->resolveSsoBaseUrl($user->usertype);
        $ssoLoginUrl = $ssoBaseUrl ? rtrim($ssoBaseUrl, '/') . '/api/sso/login' : null;

        if (! $ssoLoginUrl) {
            return back()
                ->withInput($request->only('email', 'selected_tab'))
                ->with('error', 'Unsupported user type');
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

        return back()
            ->withInput($request->only('email', 'selected_tab'))
            ->with('error', 'Invalid email or password');
    }

    private function resolveSsoBaseUrl(?string $userType): ?string
    {
        return match (strtolower((string) $userType)) {
            'client' => 'https://documentation.pocket-office.ai/partner',
            'company' => 'https://documentation.pocket-office.ai/company',
            'user', 'group' => 'https://documentation.pocket-office.ai/user',
            default => null,
        };
    }

    private function resolveSelectedTab(?string $userType): ?string
    {
        return match (strtolower((string) $userType)) {
            'user', 'group' => 'user',
            'company' => 'company',
            'client' => 'partner',
            default => null,
        };
    }

    private function tabMismatchMessage(string $actualTab): string
    {
        $label = match ($actualTab) {
            'user' => 'User',
            'company' => 'Company',
            'partner' => 'Partner',
            default => 'correct',
        };

        return "Please choose correct usertype to login and try again.";
        // return "You entered {$label} credentials. Please switch to the {$label} tab and try again.";
    }

}
