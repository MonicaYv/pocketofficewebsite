<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OfficelesSsoService
{
    public function syncUser(
        User $user,
        string $plainPassword,
        ?int $roleId = null,
        ?string $context = null
    ): array {
        $endpoint = $this->resolveUsersEndpoint($user->usertype);

        if ($endpoint === '') {
            Log::warning('SSO sync skipped: endpoint missing', [
                'user_id' => $user->id,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
            ]);

            return [
                'status' => false,
                'message' => 'SSO endpoint is not configured.',
            ];
        }

        if ($plainPassword === '') {
            Log::warning('SSO sync skipped: missing plain password', [
                'user_id' => $user->id,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
            ]);

            return [
                'status' => false,
                'message' => 'SSO sync skipped: password missing.',
            ];
        }

        $resolvedRoleId = $roleId
            ?: (int) config('services.officeles_sso.default_role_id', 3);

        $payload = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $plainPassword,
            'roles' => [$resolvedRoleId],
            'sso_user_id' => (string) $user->id,
        ];

        Log::info('SSO sync started', [
            'user_id' => $user->id,
            'email' => $user->email,
            'usertype' => $user->usertype,
            'context' => $context,
            'endpoint' => $endpoint,
            'role_id' => $resolvedRoleId,
            'provider' => $this->resolveSystemLabel($user->usertype),
        ]);

        try {
            $response = Http::timeout(20)
                ->acceptJson()
                ->post($endpoint, $payload);

            $responseJson = $response->json();

            if (!in_array($response->status(), [200, 201], true)) {
                Log::error('SSO sync failed', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'usertype' => $user->usertype,
                    'context' => $context,
                    'endpoint' => $endpoint,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'status' => false,
                    'message' => $responseJson['message'] ?? 'SSO sync failed.',
                    'http_status' => $response->status(),
                    'response' => $responseJson,
                ];
            }

            Log::info('SSO sync success', [
                'user_id' => $user->id,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'response' => $responseJson,
            ]);

            return [
                'status' => true,
                'message' => $responseJson['message'] ?? 'SSO user created successfully.',
                'http_status' => $response->status(),
                'response' => $responseJson,
            ];
        } catch (\Throwable $e) {
            Log::error('SSO sync exception', [
                'user_id' => $user->id,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => false,
                'message' => 'SSO sync exception: ' . $e->getMessage(),
            ];
        }
    }

    public function updateUser(
        User $user,
        string $ssoUserId,
        ?string $plainPassword = null,
        ?int $roleId = null,
        ?string $context = null
    ): array {
        $endpoint = $this->resolveUpdateEndpoint($user->usertype);

        if ($endpoint === '') {
            Log::warning('SSO sync skipped: endpoint missing', [
                'user_id' => $user->id,
                'sso_user_id' => $ssoUserId,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
            ]);

            return [
                'status' => false,
                'message' => 'SSO endpoint is not configured.',
            ];
        }

        $resolvedRoleId = $roleId
            ?: (int) config('services.officeles_sso.default_role_id', 3);

        $payload = [
            'name' => $user->name,
            'email' => $user->email,
            'sso_user_id' => $ssoUserId,
            'roles' => [$resolvedRoleId],
        ];

        if ($plainPassword !== null && $plainPassword !== '') {
            $payload['password'] = $plainPassword;
        }

        Log::info('SSO update started', [
            'user_id' => $user->id,
            'sso_user_id' => $ssoUserId,
            'email' => $user->email,
            'usertype' => $user->usertype,
            'context' => $context,
            'endpoint' => $endpoint,
            'role_id' => $resolvedRoleId,
            'provider' => $this->resolveSystemLabel($user->usertype),
        ]);

        try {
            $updateUrl = rtrim($endpoint, '/')
                . '/'
                . rawurlencode($ssoUserId);

            $response = Http::timeout(20)
                ->acceptJson()
                ->put($updateUrl, $payload);

            $responseJson = $response->json();

            if (!in_array($response->status(), [200, 201], true)) {
                Log::error('SSO update failed', [
                    'user_id' => $user->id,
                    'sso_user_id' => $ssoUserId,
                    'email' => $user->email,
                    'usertype' => $user->usertype,
                    'context' => $context,
                    'endpoint' => $updateUrl,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'status' => false,
                    'message' => $responseJson['message'] ?? 'SSO update failed.',
                    'http_status' => $response->status(),
                    'response' => $responseJson,
                ];
            }

            Log::info('SSO update success', [
                'user_id' => $user->id,
                'sso_user_id' => $ssoUserId,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
                'endpoint' => $updateUrl,
                'status' => $response->status(),
                'response' => $responseJson,
            ]);

            return [
                'status' => true,
                'message' => $responseJson['message'] ?? 'SSO user updated successfully.',
                'http_status' => $response->status(),
                'response' => $responseJson,
            ];
        } catch (\Throwable $e) {
            Log::error('SSO update exception', [
                'user_id' => $user->id,
                'sso_user_id' => $ssoUserId,
                'email' => $user->email,
                'usertype' => $user->usertype,
                'context' => $context,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => false,
                'message' => 'SSO update exception: ' . $e->getMessage(),
            ];
        }
    }

    private function resolveUsersEndpoint(string $usertype = 'user'): string
    {
        if (in_array($usertype, ['user', 'group'], true)) {
            return $this->normalizeUsersEndpoint(
                trim(
                    (string) config(
                        'services.officeles_sso.users_endpoint',
                        ''
                    )
                )
            );
        }

        if ($usertype === 'special_user') {
            return $this->normalizeUsersEndpoint(
                trim(
                    (string) config(
                        'services.officeles_sso.single_user_endpoint',
                        ''
                    )
                )
            );
        }

        if ($usertype === 'company') {
            return $this->normalizeUsersEndpoint(
                trim(
                    (string) config(
                        'services.officeles_sso.company_endpoint',
                        ''
                    )
                )
            );
        }

        if ($usertype === 'client') {
            return $this->normalizeUsersEndpoint(
                trim(
                    (string) config(
                        'services.officeles_sso.partner_endpoint',
                        ''
                    )
                )
            );
        }

        return '';
    }

    private function normalizeUsersEndpoint(string $configured): string
    {
        if ($configured === '') {
            return '';
        }

        $normalized = rtrim($configured, '/');

        // Already correct users endpoint
        if (preg_match('#/api/sso/users$#i', $normalized)) {
            return $normalized;
        }

        // If login endpoint was configured, convert it to users endpoint
        if (preg_match('#/api/sso/login$#i', $normalized)) {
            return preg_replace(
                '#/api/sso/login$#i',
                '/api/sso/users',
                $normalized
            ) ?? '';
        }

        return $normalized . '/api/sso/users';
    }

    private function resolveSystemLabel(string $usertype): string
    {
        return match ($usertype) {
            'client' => 'partner',
            'company' => 'company',
            'special_user' => 'single_user',
            'group' => 'group',
            'user' => 'user',
            default => 'default',
        };
    }

    private function resolveUpdateEndpoint(string $usertype): string
    {
        $base = $this->resolveUsersEndpoint($usertype);

        if ($base === '') {
            return '';
        }

        return preg_replace(
            '#/api/sso/users$#i',
            '/api/users/sso',
            $base
        ) ?? '';
    }
}