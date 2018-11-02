<?php
class translateModule
{
	public function index()
	{

		$user_info = $GLOBALS['user_info'];
		$request_data['ctl'] = "translate";
		$request_data['act'] = "coin_zr";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$data_var = json_decode(call_api($request_data),true);
		$coinLog = $data_var['coinLog'];
		$page_num = $data_var['page_num'];
		$total_user_count = $data_var['total_user_count'];
		$GLOBALS['tmpl']->assign("coinLog",$coinLog);
		$GLOBALS['tmpl']->assign("page_num",$page_num);
		$GLOBALS['tmpl']->assign("total_user_count",$total_user_count);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("translate/index.html");
		#echo json_encode($GLOBALS['tmpl']);
	}

	public function out()
	{
		$user_info = $GLOBALS['user_info'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("translate/out.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	public function out_record()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data['ctl'] = "translate";
		$request_data['act'] = "coin_zc";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$data_var = json_decode(call_api($request_data),true);
		$coinLog = $data_var['coinLog'];
		$page_num = $data_var['page_num'];
		$total_user_count = $data_var['total_user_count'];
		$GLOBALS['tmpl']->assign("coinLog",$coinLog);
		$GLOBALS['tmpl']->assign("page_num",$page_num);
		$GLOBALS['tmpl']->assign("total_user_count",$total_user_count);		
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("translate/out_record.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	#钱包账户
	public function wallet_acc(){
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		if(!isset($request_data['id']))
		{
			$msg = "参数错误";
			$result = array("status" => false,"msg" => $msg);
			#echo json_encode($result);
		}
		$id= $request_data['id'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "userCoin";
		$request_data['id'] = $user_info['id'];
		$data_var = json_decode(call_api($request_data),true);
		$userData = $data_var['userData'];
		$coinLog = $data_var['coinLog'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("userData",$userData);
		$GLOBALS['tmpl']->assign("coinLog",$coinLog);
		$GLOBALS['tmpl']->display("translate/deposit_acc.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	public function fixed_acc()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		if(!isset($request_data['id']))
		{
			$msg = "参数错误";
			$result = array("status" => false,"msg" => $msg);
			#echo json_encode($result);
		}
		$id= $request_data['id'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "getZcCoin";
		$request_data['id'] = $user_info['id'];
		$data_var = json_decode(call_api($request_data),true);
		$zcCoinSum = $data_var['zcCoinSum'];
		$zcLog = $data_var['zcLog'];
		$GLOBALS['tmpl']->assign("zcCoinSum",$zcCoinSum);
		$GLOBALS['tmpl']->assign("zcLog",$zcLog);
		$GLOBALS['tmpl']->display("translate/fixed_acc.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	#算力账户
	public function sl_acc()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		if(!isset($request_data['id']))
		{
			$msg = "参数错误";
			$result = array("status" => false,"msg" => $msg);
			#echo json_encode($result);
		}
		$id= $request_data['id'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "getSlCoin";
		$request_data['id'] = $user_info['id'];
		$data_var = json_decode(call_api($request_data),true);
		$slCoin = $data_var['slCoin'];
		$slLog = $data_var['slLog'];
		$GLOBALS['tmpl']->assign("slCoin",$slCoin);
		$GLOBALS['tmpl']->assign("slLog",$slLog);
		$GLOBALS['tmpl']->assign("userInfo",$user_info);
		$GLOBALS['tmpl']->display("translate/sl_acc.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	
	
	#SGC币
	public function sgc_coin()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		if(!isset($request_data['id']))
		{
			$msg = "参数错误";
			$result = array("status" => false,"msg" => $msg);
			echo json_encode($result);
		}
		$id= $request_data['id'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "userACoin";
		$request_data['id'] = $user_info['id'];
		$data_var = json_decode(call_api($request_data),true);
		$a_coin = $data_var['a_coin'];
		$coinLog = $data_var['coinLog'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("a_coin",$a_coin);
		$GLOBALS['tmpl']->assign("coinLog",$coinLog);
		$GLOBALS['tmpl']->display("translate/wallet_acc.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
}

?>
