<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Reset Password Notification') }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f9fafb; line-height: 1.6;">
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f9fafb; padding: 48px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" style="max-width: 600px; width: 100%; background-color: #ffffff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06); overflow: hidden; border: 1px solid #e5e7eb;">
                    <!-- Content -->
                    <tr>
                        <td style="padding: 48px 40px;">
                            <!-- Title -->
                            <h1 style="margin: 0 0 24px 0; color: #111827; font-size: 24px; font-weight: 700; line-height: 1.3; letter-spacing: -0.02em;">
                                {{ __('Reset Your Password') }}
                            </h1>
                            
                            <!-- Greeting -->
                            <p style="margin: 0 0 16px 0; color: #374151; font-size: 16px; line-height: 1.6;">
                                {{ __('Hello!') }}
                            </p>
                            
                            <!-- Main Message -->
                            <p style="margin: 0 0 32px 0; color: #6b7280; font-size: 15px; line-height: 1.7;">
                                {{ __('You are receiving this email because we received a password reset request for your account. Click the button below to reset your password.') }}
                            </p>
                            
                            <!-- Button -->
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin: 0 0 40px 0;">
                                <tr>
                                    <td align="center" style="padding: 0;">
                                        <a href="{{ $url }}" style="display: inline-block; padding: 14px 28px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 15px; text-align: center; line-height: 1.5;">
                                            {{ __('Reset Password') }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Alternative Link Section -->
                            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin: 0 0 32px 0;">
                                <p style="margin: 0 0 12px 0; color: #6b7280; font-size: 13px; line-height: 1.5; font-weight: 500;">
                                    {{ __('If the button doesn\'t work, copy and paste this link into your browser:') }}
                                </p>
                                <p style="margin: 0; word-break: break-all;">
                                    <a href="{{ $url }}" style="color: #3b82f6; text-decoration: none; font-size: 13px; line-height: 1.6; font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;">{{ $url }}</a>
                                </p>
                            </div>
                            
                            <!-- Additional Info -->
                            <div style="border-top: 1px solid #e5e7eb; padding-top: 24px; margin-top: 32px;">
                                <p style="margin: 0 0 12px 0; color: #9ca3af; font-size: 13px; line-height: 1.6;">
                                    {{ __('This password reset link will expire in :count minutes.', ['count' => $count]) }}
                                </p>
                                <p style="margin: 0; color: #9ca3af; font-size: 13px; line-height: 1.6;">
                                    {{ __('If you did not request a password reset, no further action is required.') }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 24px 40px; background-color: #f9fafb; border-top: 1px solid #e5e7eb; text-align: center;">
                            <p style="margin: 0 0 8px 0; color: #6b7280; font-size: 13px; line-height: 1.5;">
                                {{ __('This email was sent by') }} <strong style="color: #374151; font-weight: 600;">{{ config('app.name') }}</strong>
                            </p>
                            <p style="margin: 0; color: #9ca3af; font-size: 12px; line-height: 1.5;">
                                © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
