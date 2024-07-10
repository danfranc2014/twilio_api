<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

class TwlioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function createConversation()
    {
        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $conversation = $twilio->conversations->v1->conversations->create([
            "friendlyName" => "My First Conversation",
        ]);

        print $conversation->sid;
    }
    public function fetchYourNewConversation()
    {
        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $conversation = $twilio->conversations->v1
            ->conversations("CH0e1bd8b51d08430895b8cc8effe12ce6")
            ->fetch();

        print $conversation->chatServiceSid;
    }
    public function addAnSmsParticipantToAConversation()
    {
        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $participant = $twilio->conversations->v1
            ->conversations("CH0e1bd8b51d08430895b8cc8effe12ce6")
            ->participants->create([
                "messagingBindingAddress" => "+51951442655",
                "messagingBindingProxyAddress" =>
                getenv("TWILIO_MY_NUMBER"),
            ]);

        print $participant->sid;
    }
    public function addAChatParticipantToAConversation()
    {

        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $participant = $twilio->conversations->v1
            ->conversations("CH0e1bd8b51d08430895b8cc8effe12ce6")
            ->participants->create(["identity" => "testPineapple"]);

        print $participant->sid;
    }
}
