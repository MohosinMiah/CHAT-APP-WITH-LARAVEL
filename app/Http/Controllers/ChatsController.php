<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\User;
use App\Events\MessageSent;

class ChatsController extends Controller
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
        // return  Auth::user();
        return view("chat");
    }


    
/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return Message::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
// public function sendMessage(Request $request)
// {
//   $user = Auth::user();

//   $message = $user->messages()->create([
//     'message' => $request->input('message')
//   ]);

// //   broadcast(new MessageSent($user, $message))->toOthers();
//     event(new MessageSent($user, $message));

//     return ['status' => 'Message Sent!'];

// }

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
   
  ]);

//   broadcast(new MessageSent($user, $message))->toOthers();
    event(new MessageSent($user, $message));

    return ['status' => 'Message Sent!'];

}



}
