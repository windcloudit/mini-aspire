<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var string
     */
    public string $url;

    private string $email;

    /**
     * Create a new message instance.
     *
     * @param string $email
     * @param int $memberId
     */
    public function __construct(string $email, int $memberId)
    {
        $this->email = $email;
        $this->url = config('app.fe_url') . '/front/members/submit/' . $memberId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->to($this->email)
            ->subject('武蔵野メンバーズサイト 入会のお申し込み本人確認メール')->view('mails.confirmEmail');
    }
}
