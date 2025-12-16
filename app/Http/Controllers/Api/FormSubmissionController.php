<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Models\EmailSetting;
use App\Mail\FormSubmissionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $submission = FormSubmission::create([
            'data' => $request->all(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        try {
            $notificationEmail = EmailSetting::get('contact_form_recipient', config('mail.from.address'));
            Mail::to($notificationEmail)
                ->send(new FormSubmissionNotification($submission));
        } catch (\Exception $e) {
            \Log::error('Failed to send form notification: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Thank you! Your submission has been received.',
            'id' => $submission->id
        ], 201);
    }
}