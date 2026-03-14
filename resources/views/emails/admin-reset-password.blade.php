<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin:0; padding:0; background-color:#f7f4ee; font-family:Arial, Helvetica, sans-serif; color:#292524;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f7f4ee; margin:0; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px; margin:0 auto;">
                    <tr>
                        <td align="center" style="padding-bottom:24px;">
                            <a href="{{ $appUrl }}/login" target="_blank" rel="noopener" style="display:inline-block; text-decoration:none;">
                                <img src="{{ $appUrl }}/images/amrutam-wordmark.png" alt="Amrutam"
                                    style="display:block; width:auto; max-width:180px; height:56px; border:0;">
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="background-color:#ffffff; border:1px solid #eadfce; border-radius:18px; padding:40px 44px; box-shadow:0 10px 35px rgba(28, 25, 23, 0.06);">
                            <h1 style="margin:0 0 20px; font-size:30px; line-height:1.2; color:#1c1917; font-family:Georgia, 'Times New Roman', serif;">
                                Reset Your Password
                            </h1>

                            <p style="margin:0 0 16px; font-size:17px; line-height:1.8; color:#44403c;">
                                Hello,
                            </p>

                            <p style="margin:0 0 16px; font-size:17px; line-height:1.8; color:#44403c;">
                                We received a request to reset your Amrutam admin panel password.
                            </p>

                            <p style="margin:0 0 28px; font-size:17px; line-height:1.8; color:#44403c;">
                                Click the button below to choose a new password and regain access to your admin account.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 0 28px;">
                                <tr>
                                    <td align="center" style="border-radius:999px; background-color:#d97706;">
                                        <a href="{{ $resetUrl }}" target="_blank" rel="noopener"
                                            style="display:inline-block; padding:15px 28px; font-size:15px; font-weight:700; color:#ffffff; text-decoration:none; border-radius:999px;">
                                            Reset Admin Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 18px; font-size:16px; line-height:1.8; color:#57534e;">
                                If you did not request a password reset, you can safely ignore this email.
                            </p>

                            <p style="margin:0; font-size:16px; line-height:1.8; color:#57534e;">
                                Regards,<br>Amrutam
                            </p>

                            <div style="margin:28px 0; border-top:1px solid #efe5d4;"></div>

                            <p style="margin:0 0 10px; font-size:13px; line-height:1.7; color:#78716c;">
                                If the button does not work, copy and paste this link into your browser:
                            </p>

                            <p style="margin:0; font-size:13px; line-height:1.8; word-break:break-all;">
                                <a href="{{ $resetUrl }}" target="_blank" rel="noopener" style="color:#b45309; text-decoration:underline;">
                                    {{ $resetUrl }}
                                </a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding-top:20px; font-size:12px; line-height:1.6; color:#a8a29e;">
                            &copy; {{ $year }} Amrutam. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
