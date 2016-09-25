<?php
class SendMail extends Eloquent{

	public static function send_password($pwd){
		$data=['pwd'=>$pwd];

		Mail::send('emails.password',$data,function($message){
			$message->to('605536038@qq.com')->subject('panzi专题的密码');
		});

		return '已发送';
	}
}