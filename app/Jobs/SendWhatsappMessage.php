<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWhatsappMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phoneNumber;
    protected $data;
    protected $otp;

    /**
     * Create a new job instance.
     */
    public function __construct($phoneNumber, $data, $otp = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->data = $data;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $message = $this->buildMessage();
        $this->sendMessage($this->phoneNumber, $message);
    }

    /**
     * Build the message based on the data type.
     */
    private function buildMessage(): string
    {
        if ($this->data === 'message_notification') {
            return 'Anda memiliki pesan terbaru';
        } elseif ($this->data === 'otp_notification') {
            return 'Berikut adalah kode OTP anda ' . $this->otp;
        }

        return 'Pesan tidak dikenali.';
    }

    /**
     * Send the message using cURL.
     */
    private function sendMessage($phoneNumber, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $phoneNumber,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . env('TOKEN_FONNTE'),
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }

        curl_close($curl);
    }
}
