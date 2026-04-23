<?php

namespace App\Helpers;

use App\Models\File as ModelsFile;
use App\Models\OrientLogs;
use App\Models\Orientshare;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function userStoragePath($user_id)
    {
        $user = User::find($user_id);
        // dd($user, $user_id);
        $basePath = storage_path('app'); // Base folder for storage
        $rootPath = $basePath . '/root'; // Root folder inside 'app'
        $basicFolders = ['Desktop', 'Document', 'Download', 'Gallery', 'Recycle Bin'];
        $relativeUserStoragePath = ''; // To store the relative path without base path

        // Ensure 'app' and 'root' directories exist
        if (!File::exists($rootPath)) {
            File::makeDirectory($rootPath, 0755, true);
        }

        switch ($user->usertype) {
            case 'master':
                $userPath = base64UrlEncode($user->id);
                self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);
                $relativeUserStoragePath = $userPath;
                break;

            case 'client':
                // Master or Client: Folder is named as user ID
                $userPath = base64UrlEncode($user->client_id);
                self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);
                $relativeUserStoragePath = $userPath;
                break;

            case 'company':
                // Company: Folder named as client_id and user ID inside it
                $clientPath = base64UrlEncode($user->client_id);
                $userPath = $clientPath . '/' . base64UrlEncode($user->company_id);
                self::createFolderStructure($rootPath . '/' . $clientPath, $basicFolders); // Client-level folders
                self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);  // User-level folders
                $relativeUserStoragePath = $userPath;
                break;

            case 'user':
            case 'group':
                if (empty($user->client_id)) {
                    // No client_id: Folder named as user ID
                    $userPath = base64UrlEncode($user->id);
                    self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);
                    $relativeUserStoragePath = $userPath;
                } elseif (empty($user->company_id)) {
                    // Has client_id but no company_id: Folder named as client_id and user ID inside
                    $clientPath = base64UrlEncode($user->client_id);
                    $userPath = $clientPath . '/' . base64UrlEncode($user->id);
                    self::createFolderStructure($rootPath . '/' . $clientPath, $basicFolders); // Client-level folders
                    self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);  // User-level folders
                    $relativeUserStoragePath = $userPath;
                } else {
                    // Has both client_id and company_id: Client -> Company -> User structure
                    $clientPath = base64UrlEncode($user->client_id);
                    $companyPath = $clientPath . '/' . base64UrlEncode($user->company_id);
                    $userPath = $companyPath . '/' . base64UrlEncode($user->id);

                    self::createFolderStructure($rootPath . '/' . $clientPath, $basicFolders);  // Client-level folders
                    self::createFolderStructure($rootPath . '/' . $companyPath, $basicFolders); // Company-level folders
                    self::createFolderStructure($rootPath . '/' . $userPath, $basicFolders);    // User-level folders
                    $relativeUserStoragePath = $userPath;
                }
                break;
        }
        return $relativeUserStoragePath . '/';
    }

    private static function createFolderStructure($path, $folders)
    {
        foreach ($folders as $folder) {
            $folderPath = $path . '/' . $folder;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }
        }
    }

    public static function formatSize($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public static function Userdetails($userId)
    {
        $data = User::find($userId);
        if ($data) {
            return $data;
        }
        return null;
    }

    public static function UserAvatar($userId)
    {
        $data = User::find($userId);
        if ($data) {
            return $data->avatar;
        }
        return null;
    }

    public static function OrientLog($type, $sender_id, $sender_name, $receiver_id, $receiver_name, $file_name, $extension, $is_folder, $can_view, $can_edit, $can_download, $expiry)
    {
        $log = new OrientLogs();
        $log->type = $type;
        $log->sender_id = $sender_id;
        $log->sender_name = $sender_name;
        $log->receiver_id = $receiver_id;
        $log->receiver_name = $receiver_name;
        $log->file_name = $file_name;
        $log->extension = $extension;
        $log->is_folder = $is_folder;
        $log->can_view = $can_view;
        $log->can_edit = $can_edit;
        $log->can_download = $can_download;
        $log->expiry = $expiry;
        $log->save();
    }

    public static function datetimeFormat($datetime)
    {
        if ($datetime != null) {
            return Carbon::parse($datetime)->format('d M Y, h:i a');
        }
        return null;
    }
    
    public static function SharedFileFoldersIds()
    {
        $orientshared = [];
        if (Auth::user()) {
            $orientshareFolder = ModelsFile::where('created_by', auth()->id())->where('name', 'orientshare')->where('path', 'Document/orientshare')->first();
            if (isset($orientshareFolder)) {
                $orientshared[] = $orientshareFolder->id;
            }
            $parentshared = Orientshare::where('expiry', '>', now())->where('is_deleted', 0)->where('shared_by', auth()->id())->pluck('files_id')->toArray();
            $childFiles = [];
            if ($parentshared) {
                $childFiles = ModelsFile::where('created_by', auth()->id())->where(function ($query) use ($parentshared) {
                    $files = ModelsFile::whereIn('id', $parentshared)->get();
                    foreach ($files as $File) {
                        $query->orWhere('parentpath', 'like', $File->path . '%');
                    }
                })->pluck('id')->toArray();
            }
            $orientshared = array_unique(array_merge($orientshared, $parentshared, $childFiles));
        }
        return $orientshared;
    }

    public static function getSizeFolder($folderPath)
    {
        $userStoragePath = trim(self::userStoragePath(auth()->user()->id), '/\\');
        $folderPath = trim($folderPath, '/\\');

        $path = storage_path(
            'app/root/' . $userStoragePath . '/' . $folderPath
        );

        $totalSizeBytes = 0;

        if (File::exists($path)) {
            foreach (File::allFiles($path) as $file) {
                $totalSizeBytes += $file->getSize();
            }
        }
        $totalSizeMb = round($totalSizeBytes / 1024 / 1024, 2);
        return $totalSizeMb . ' mb';

        // return [
        //     'path'       => $path,
        //     'size_bytes' => $totalSizeBytes,
        //     'size_mb'    => round($totalSizeBytes / 1024 / 1024, 2)
        // ];
    }

    public static function getSizeFolders($folderPath, $userId)
    {
        $userStoragePath = trim(self::userStoragePath($userId), '/\\');
        $folderPath = trim($folderPath, '/\\');

        $path = storage_path('app/root/' . $userStoragePath . '/' . $folderPath);
        // dd($path, $folderPath);
        $totalSizeBytes = 0;

        if (File::exists($path)) {
            foreach (File::allFiles($path) as $file) {
                $totalSizeBytes += $file->getSize();
            }
        }

        // Convert bytes into KB, MB, GB dynamically
        if ($totalSizeBytes < 1024) {
            // Less than 1 KB
            return $totalSizeBytes . ' B';
        } elseif ($totalSizeBytes < 1024 * 1024) {
            // Less than 1 MB
            return round($totalSizeBytes / 1024, 2) . ' KB';
        } elseif ($totalSizeBytes < 1024 * 1024 * 1024) {
            // Less than 1 GB
            return round($totalSizeBytes / 1024 / 1024, 2) . ' MB';
        } else {
            // 1 GB or more
            return round($totalSizeBytes / 1024 / 1024 / 1024, 2) . ' GB';
        }
    }



    function folderSize($path) {
        $size = 0;

        if (!$path || !file_exists($path)) {
            return 0; // ✅ always return numeric
        }

        if (is_file($path)) {
            return filesize($path) ?: 0;
        }

        if (is_dir($path)) {
            foreach (scandir($path) as $file) {
                if ($file !== '.' && $file !== '..') {
                    $size += folderSize($path . DIRECTORY_SEPARATOR . $file);
                }
            }
        }

        return $size;
    }

    public static function convertToGB($str)
    {
        $parts = explode(' ', trim($str));
        $value = (float) $parts[0];
        $unit = strtoupper($parts[1] ?? 'GB');

        switch ($unit) {
            case 'B': return $value / (1024 * 1024 * 1024);
            case 'KB': return $value / (1024 * 1024);
            case 'MB': return $value / 1024;
            case 'GB': return $value;
            case 'TB': return $value * 1024;
            default: return $value;
        }
    }

    public static function getUserIP()
    {
        // $response = \Illuminate\Support\Facades\Http::timeout(5)->get('https://api.ipapi.is/', [
        //     'format' => 'json'
        // ]);

        // if ($response->successful()) {
        //     $data = $response->json();
        //     return $ip = $data['ip'] ?? null;
        // } else {
        //     return $ip = null;
        // }
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public static function resolveIP($dnsOrIp)
    {
        // If it's already an IP, just normalize and return
        if (filter_var($dnsOrIp, FILTER_VALIDATE_IP)) {
            return $dnsOrIp === '::1' ? '127.0.0.1' : $dnsOrIp;
        }

        // If it's a hostname, resolve to IP
        $ip = gethostbyname($dnsOrIp);

        // Normalize loopback IPv6
        if ($ip === '::1') {
            $ip = '127.0.0.1';
        }

        return $ip;
    }

    public static function formatStorage($bytes)
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        } elseif ($bytes < 1048576) {
            return round($bytes / 1024, 2) . ' KB';
        } elseif ($bytes < 1073741824) {
            return round($bytes / 1048576, 2) . ' MB';
        } else {
            return round($bytes / 1073741824, 2) . ' GB';
        }
    }
    
    public static function defaultUserWallpaperDataByUserId($userId, $type = 'theme')
    {
        $wallpaperId = \App\Models\Theme::where('flag', 'default')->value('id');
        $isChecked = true;

        if (!$userId || !$type) {
            return false;
        }
        
        $sequence = array('theme'=>1,'login'=>0,'desktop'=>0);
        $userWallpaper = \App\Models\UserWallpaper::firstOrNew(['user_id' => $userId]);
        $oldsequence = !empty($userWallpaper->sequence) ? json_decode($userWallpaper->sequence,true) : $sequence;
        if ($type === 'desktop') {
            $userWallpaper->dashboard_display = $isChecked ? $wallpaperId : 0;
            $sequence = array('theme'=>0,'login'=>$oldsequence['login'],'desktop'=>1);
        } elseif ($type === 'login') {
            $userWallpaper->login_display = $isChecked ? $wallpaperId : 0;
            $sequence = array('theme'=>0,'login'=>1,'desktop'=>$oldsequence['desktop']);

        } elseif ($type === 'theme') {
            $userWallpaper->theme_id = $isChecked ? $wallpaperId : 0;
            $sequence = array('theme'=>1,'login'=>0,'desktop'=>0);

        }
        $userWallpaper->theme_id = $wallpaperId;
        $userWallpaper->sequence = json_encode($sequence);
        $userWallpaper->save();

        $message = $isChecked
            ? ucfirst($type) . ' updated successfully.'
            : 'Removed ' . $type . ' successfully.';

        return true;
    }

    public static function buildFolderTree($folders, $parentPath = null, $defaultRoots = [])
    {
        $tree = [];

        // Normalize default root names for lookup
        $defaultRoots = array_map(fn($v) => trim($v, '/'), $defaultRoots);
        
        foreach ($folders as $folder) {
            $folderParent = trim($folder->parentpath ?? '', '/');
            $currentParent = trim($parentPath ?? '', '/');
            $folderName = trim($folder->name ?? '', '/');
            
            // Determine if folder is a root-level item
            $isRoot = (
                ($parentPath === null && (empty($folderParent) || $folderParent === '/')) ||
                ($parentPath === null && in_array($folderName, $defaultRoots))
            );
            
            if ($isRoot || $folderParent === $currentParent) {
                $children = self::buildFolderTree($folders, $folder->path, $defaultRoots);
                $tree[] = [
                    'id' => $folder->id,
                    'name' => $folder->name,
                    'path' => $folder->path,
                    'children' => $children,
                ];
            }
        }

        return $tree;
    }

    public static function getSizeFoldersInGB($folderPath, $userId)
    {
        $userStoragePath = trim(self::userStoragePath($userId), '/\\');
        $folderPath = trim($folderPath, '/\\');

        $path = storage_path('app/root/' . $userStoragePath . '/' . $folderPath);
        $totalSizeBytes = 0;

        if (File::exists($path)) {
            foreach (File::allFiles($path) as $file) {
                $totalSizeBytes += $file->getSize();
            }
        }

        // Always return GB (float)
        return round($totalSizeBytes / 1024 / 1024 / 1024, 2);
    }



}
