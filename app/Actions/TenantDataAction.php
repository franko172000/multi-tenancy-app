<?php

namespace App\Actions;

use App\Actions\Action;

class TenantDataAction extends Action
{

    public function rules(): array
    {
        return [];
    }

    public function execute()
    {
        $user = request()->route()->parameter('user');
        return [
            'tenant' => [
                'username' => $user->username,
                'config_data' => $user->config_data,
                'app_url' => env('APP_URL')
            ]
        ];
    }
}
