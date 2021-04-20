<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\{SendVisit, SendInviteFriend, SendContact};

use File;
use Mail;
use App\EmailStorage;

use App\Http\Requests\CaptchaRequest;

class SendMailController extends Controller
{
    private function storage_mail_db($value){
        $email_storage = new EmailStorage();
        $email_storage->url = Request()->url();
        $email_storage->form = json_encode($value->except(['_token', 'g-recaptcha-response']));
        $email_storage->save();
    }

    /*
    |--------------------------------------------------------------------------
    | SENDING FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function send_visit(Request $request){
    // public function send_visit(CaptchaRequest $request){
        $this->storage_mail_db($request);
        Mail::to('webmaster@livedesign.org')->bcc('webmaster@livedesign.org')->send(new SendVisit());
        echo "enviado";
        // echo    '<div style="text-align:center"><h2 class="wht">Thank you for your message!</h2><p>Someone from our team will respond to you as quickly as possible.</p></div>';
        die();
    }

    public function send_contact(CaptchaRequest $request){
        $this->storage_mail_db($request);
        Mail::to('webmaster@livedesign.org')->bcc('webmaster@livedesign.org')->send(new SendContact());
        echo    '<div style="text-align:center"><h2 class="wht">Thank you for your message!</h2><p>Someone from our team will respond to you as quickly as possible.</p></div>';
        die();
    }

    public function send_invite_friend(Request $request){
    // public function send_visit(CaptchaRequest $request){
        $this->storage_mail_db($request);
        Mail::to($request->email2)->bcc('webmaster@livedesign.org')->send(new SendInviteFriend());

        echo '<div class="wpb_column p0 col-center columns medium-6 large-6 medium-6 thb-dark-column small-6 text-center" style="padding:120px 0">
        <div class="">
        <p class="rs white">Thanks '.strtoupper($request->name).' for inviting '.strtoupper($request->name2).'. Your friend will receive an email with your invitation shortly.</p>
        <br>
        <a class="btn btn-large btn-black inner-link" href="#socialmedia" style="opacity:1">Social Media Invite</a>
        </div>
        </div>

        <script>
                // Inner Link
        $(".inner-link").click(function(){
            $("html, body").animate({
              scrollTop: $($(this).attr("href")).offset().top
              }, 1000);
              return false;
              });
              </script>';


        die();
    }
}
