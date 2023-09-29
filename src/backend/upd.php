<?php

/*
Her's a list of essential telegram updates, feel free to add what you need
*/

$upd = json_decode(file_get_contents('php://input'));

if(isset($upd)){

    // Tipes of Updates \\
    $upd_id = $upd->update_id;

    $channel_post = $upd->channel_post ?? $upd->edited_channel_post ?? null;

    $inline_query = $upd->inline_query ?? null;
    $chosen_inline = $upd->chosen_inline_result ?? null;
    $callback = $upd->callback_query ?? null;

    $shipping_query = $upd->shipping_query ?? null;
    $pre_checkout_query = $upd->pre_checkout_query ?? null;

    $poll = $upd->poll ?? null;
    $poll_answer = $upd->poll_answer ?? null;

    $my_chat_member = $upd->my_chat_member ?? null;
    $chat_member = $upd->chat_member ?? null;
    $join_request = $upd->chat_join_request ?? null;

    $message = 
        $upd->message ?? 
        $upd->edited_message ?? 
        $upd->channel_post ?? 
        $callback->message ?? 
        null
    ;
    
    $from = 
        $callback->from ??
        $message->from ??
        $inline_query->from ??
        $chosen_inline->from ??
        $shipping_query->from ??
        $pre_checkout_query->from ??
        $my_chat_member->from ??
        $chat_member->from ??
        $join_request->from ??
        null
    ;

    $chat = 
        $message->chat ??
        $my_chat_member->chat ??
        $join_request->chat ??
        null
    ;

    
    // More specific Updates \\

    // Message
    $message_id = $message->message_id ?? $chosen_inline->inline_message_id ?? $callback->inline_message_id ?? null;
    $text = isset($callback) ? null : $message->text ?? null;
    $caption = $message->caption ?? null;
    $photo = $message->photo ?? null;
    $audio = $message->audio ?? null;
    $document = $message->document ?? null;
    $video = $message->video ?? null;
    $video_note = $message->video_note ?? null;
    $voice = $message->voice ?? null;
    $topic_id = $message->message_thread_id ?? null;
    $forward = $message->forward_from ?? null;
    $forward_chat = $message->forward_from_chat ?? null;
    $is_protected = $message->has_protected_content ?? false;
    $is_in_topic = $message->is_topic_message ?? false;
    $reply = $message->reply_to_message ?? null;
    $via_bot = $message->via_bot ?? null;

    // From
    $id = $from->id;
    $is_bot = $from->is_bot;
    $name = $from->first_name;
    $last_name = $from->last_name ?? '';
    $username = $from->username ?? '';
    $lang_code = $from->language_code ?? null;
    $is_premium = $from->is_premium ?? false;
    $added_attachment_menu = $from->added_to_attachment_menu ?? false;
    $mention = "<a href='tg://user?id=$id'>$name</a>";

    // Inline mode
    if(isset($inline_query)){
        $query_id = $inline_query->id ?? null;
        $inline_query = $inline_query->query ?? $chosen_inline->query ?? null;
        $chosen_result = $chosen_inline->result_id ?? null;
    }

    // Inline keyboard
    $callback_id = $callback->id ?? null;
    $chat_instance = $callback->chat_instance ?? null;
    $callback_data = $callback->data ?? null;
    $game_name = $callback->game_short_name ?? null;


    // Chat-related
    $chat_id = $chat->id ?? $id ?? null;
    $chat_type = $chat->type ?? null;
    $chat_title = $chat->title ?? '';
    $chat_username = $chat->username ?? '';
    $has_topics = $chat->is_forum ?? false;

    // Files
    $file_id = 
        $message->document->file_id ??
        ($message->video->file_id ??
        (isset($message->photo) ? $message->photo[count($message->photo)-1]->file_id : null)) ??
        null
    ;

}

?>