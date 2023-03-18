<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogRequest;
use App\Models\UserLog;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class UserLogController extends Controller
{

    protected const ENCRYPTED_FIELDS = [
        "mood",
        "weather",
        "gps",
        "note",
    ];

    /**
     * Show the page with planets filter
     * @return View
     */
    public function show(): View
    {
        return view('logpage', [
            'logs' => $this->getReadableLog(),
        ]);
    }

    /**
     * @return array<string>
     */
    protected function getReadableLog() : array
    {
        $logs = UserLog::orderBy('created_at', 'DESC')->get()->toArray();
        foreach ($logs as $key => $log) {
            foreach ($log as $field => $item) {
                if (in_array($field, UserLogController::ENCRYPTED_FIELDS)) {
                    $log[$field] = Crypt::decryptString($item);
                }
            }
            $logs[$key] = $log;
        }
        return $logs;
    }

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
