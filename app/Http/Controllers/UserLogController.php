<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogRequest;
use App\Models\UserLog;
use Illuminate\Support\Facades\Crypt;

class UserLogController extends Controller
{

    /**
     * @param UserLogRequest $request
     * @return array<string>|int[]
     */
    public function saveUserLog(UserLogRequest $request) : array
    {
        $data = $request->all();

        $data = array_map(function ($value) {
            return Crypt::encryptString($value);
        }, $data);

        $userLog = UserLog::create($data);
        if ($userLog['id'] > 0) {
            return [
                'success' => 1,
                'id' => $userLog['id'],
            ];
        }
        return [
            'success' => 0,
        ];
    }
}
