<?php
class userModule
{

	public function  index()
	{
		$GLOBALS['tmpl']->assign("contents","this is user index");
		$GLOBALS['tmpl']->assign("title","this is user title");
		$GLOBALS['tmpl']->display("login/login.html");
	}

	public function  login()
	{
		$GLOBALS['tmpl']->display("login/login.html");
	}
	public function  register()
	{
		$GLOBALS['tmpl']->display("login/register.html");
	}


	public function myinfo()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		$request_data['id'] = $user_info['id'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "myinfo";
		$data =json_decode(call_api($request_data),true);
		$gonggao = $data['gonggao'];
		$GLOBALS['tmpl']->assign("gonggao",$gonggao);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/my.html");
		#echo json_encode($GLOBALS['tmpl']);
	}


	public function loginout()
	{
		//清除session
		$_SESSION = array();
		session_destroy();
		$msg = "退出成功！";
		$status = "ok";
		$result = array("status" => $status,"msg" => $msg); 
		echo json_encode($result);
		exit(0);
		
	}

	public function forgetpwd()
	{
		$GLOBALS['tmpl']->display("login/forgetpwd.html");
	}


	#首页获取公告以及导航栏轮播栏
	public function home()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "appconf";
		$request_data['id'] = $user_info['id'];
		$data_var = json_decode(call_api($request_data),true);
		$sq = $data_var['sq'];
		$jycommnet = $data_var['jycommnet'];
		$klines = $data_var['klines'];
		$gonggao = $data_var['gonggao'];
		$GLOBALS['tmpl']->assign("gonggao",$gonggao);
		$GLOBALS['tmpl']->assign("sq",$sq);
		$GLOBALS['tmpl']->assign("jycommnet",$jycommnet);
		$GLOBALS['tmpl']->assign("klines",$klines);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("home.html");

		#echo json_encode($GLOBALS['tmpl']);
	}
	public function notice()
	{	
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "appconf";
		$data_var = json_decode(call_api($request_data),true);
		$data = $data_var['data'];
		$GLOBALS['tmpl']->assign("data",$data);
		$GLOBALS['tmpl']->display("notice.html");
		#echo json_encode($GLOBALS['tmpl']);
	}




	public function consume_credits()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		
		$request_data['ctl'] = "translate";
		$request_data['act'] = "get_consume_credits_log";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$consume_credits_log_var = json_decode(call_api($request_data),true);
		$consume_credits_log = $consume_credits_log_var['data'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("data",$consume_credits_log);
		$GLOBALS['tmpl']->display("my/consume_credits.html");
		#echo json_encode($GLOBALS['tmpl']);
	}


	public function cz_sps()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/cz_sps.html");
		#echo json_encode($GLOBALS['tmpl']);
	}

	public function my_sps()
	{
		$GLOBALS['tmpl']->display("my/my_sps.html");
	}

	public function shopping_sps()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		
		$request_data['ctl'] = "sc";
		$request_data['act'] = "get_consume_sps_list";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$consume_sps_list_var = json_decode(call_api($request_data),true);
		$consume_sps_list = $consume_sps_list_var['data'];
		$GLOBALS['tmpl']->assign("data",$consume_sps_list);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/shopping_sps.html");
		#echo json_encode($GLOBALS['tmpl']);
	}

	public function sc_sps()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];

		$request_data['ctl'] = "sc";
		$request_data['act'] = "get_sc_list";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$sc_list_var = json_decode(call_api($request_data),true);
		$sc_list = $sc_list_var['data'];

		$GLOBALS['tmpl']->assign("data",$sc_list);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/sc_sps.html");
		#echo json_encode($GLOBALS['tmpl']);

	}

	public function avalible_sps()
	{
		$GLOBALS['tmpl']->display("my/avalible_sps.html");
	}


	public function total_benefit()
	{

		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];

		$request_data['ctl'] = 'sc';
		$request_data['act'] = 'get_reback_list';
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$reback_list_var = json_decode(call_api($request_data),true);
		$reback_list = $reback_list_var['data'];

		$request_data['act'] = 'get_static_reward_list';
		$static_reward_list_var = json_decode(call_api($request_data),true);
		$static_reward_list = $static_reward_list_var['data'];

		$request_data['act'] = 'get_dynamic_reward_list';
		$dynamic_reward_list_var = json_decode(call_api($request_data),true);
		$dynamic_reward_list = $dynamic_reward_list_var['data'];

		$request_data['act'] = 'get_daily_total_reward';
		$daily_total_reward_var = json_decode(call_api($request_data),true);
		$daily_total_reward = $daily_total_reward_var['total_reward'];
	
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("reback_list",$reback_list);
		$GLOBALS['tmpl']->assign("static_reward_list",$static_reward_list);
		$GLOBALS['tmpl']->assign("dynamic_reward_list",$dynamic_reward_list);
		$GLOBALS['tmpl']->assign("daily_total_reward",$daily_total_reward);
		$GLOBALS['tmpl']->display("my/total_benefit.html");
		#echo json_encode($GLOBALS['tmpl']);
	}

	#左分区
	public function total_consume()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		
		$request_data['ctl'] = "user";
		$request_data['act'] = "yjmx";
		$request_data['id'] = $request_data['id'];
		$request_data['type'] = $request_data['type'];
		if(isset($request_data['uid']))
		{
			$request_data['id'] = $request_data['uid'];
		}
		$data_var = json_decode(call_api($request_data),true);
		$children = $data_var['children'];
		$userInfo = $data_var['userInfo'];
		$GLOBALS['tmpl']->assign("children",$children);
		$GLOBALS['tmpl']->assign("userInfo",$userInfo);
		$GLOBALS['tmpl']->display("my/total_consume.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	#右分区
	public function total_consume_r()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		
		$request_data['ctl'] = "user";
		$request_data['act'] = "yjmx";
		$request_data['id'] = $request_data['id'];
		$request_data['type'] = $request_data['type'];
		if(isset($request_data['uid']))
		{
			$request_data['id'] = $request_data['uid'];
		}
		$data_var = json_decode(call_api($request_data),true);
		$children = $data_var['children'];
		$userInfo = $data_var['userInfo'];
		$GLOBALS['tmpl']->assign("children",$children);
		$GLOBALS['tmpl']->assign("userInfo",$userInfo);
		$GLOBALS['tmpl']->display("my/total_consume_r.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	#帮人注册
	public function  help_register()
	{
		$user_info = $GLOBALS['user_info'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/help_register.html");
	}

	public function order()
	{
		$request_data = $GLOBALS['request_data'];
		$user_info = $GLOBALS['user_info'];
		$request_data['ctl'] = "order";
		$request_data['act'] = "get_order_list";
		$data_var = json_decode(call_api($request_data),true);
		$data = $data_var['order_list'];
		$p = $data_var['p'];
		$pages = $data_var['pages'];
		$GLOBALS['tmpl']->assign("p",$p);
		$GLOBALS['tmpl']->assign("pages",$pages);
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("data",$data);
		$GLOBALS['tmpl']->display("my/order.html");
		#echo json_encode($GLOBALS['tmpl']);
	}

	public function share()
	{
		$user_info = $GLOBALS['user_info'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/share.html");
		#echo json_encode($GLOBALS['tmpl']);
	}


	public function account_manage()
	{
		$GLOBALS['tmpl']->display("my/account_manage.html");
	}

	public function about()
	{
		$GLOBALS['tmpl']->display("my/about.html");
	}
	
	
	
	#温馨提示
	public function warm_reminder()
	{
		$GLOBALS['tmpl']->display("my/warm_reminder.html");
	}
	
	
	#钱包链兑换积分
	public function wallet_out_jf()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "translate";
		$request_data['act'] = "get_sps_to_credits_log";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$sps_to_credits_log_var = json_decode(call_api($request_data),true);
		$sps_to_credits_log = $sps_to_credits_log_var['data'];

		$request_data['ctl'] = "trade";
		$request_data['act'] = "get_coin_price";
		$price_var = json_decode(call_api($request_data),true);
		$price = $price_var['price'];


		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("data",$sps_to_credits_log);
		$GLOBALS['tmpl']->assign("price",$price);

		$GLOBALS['tmpl']->display("my/wallet_out_jf.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
	
	#钱包链转出
	public function wallet_out()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "translate";
		$request_data['act'] = "get_translate_sps_log";
		$request_data['id'] = $user_info['id'];
		$request_data['p'] = 1;
		$sps_to_credits_log_var = json_decode(call_api($request_data),true);
		$sps_to_credits_log = $sps_to_credits_log_var['data'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("data",$sps_to_credits_log);
		$GLOBALS['tmpl']->display("my/wallet_out.html");
		#echo json_encode($GLOBALS['tmpl']);

	}
	
	#锁链本金
	public function suolian_benjin()
	{
		$user_info = $GLOBALS['user_info'];
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->display("my/suolian_benjin.html");
		
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "sc";
		$request_data['act'] = "get_reback_list";
		$request_data['p'] = 1;
		$sc_list_var = json_decode(call_api($request_data),true);
		$sc_list = $sc_list_var['data'];
		$GLOBALS['tmpl']->assign("sc_list",$sc_list);
		#echo json_encode($GLOBALS['tmpl']);
	}

	#财富中心
	public function properties()
	{
		$user_info = $GLOBALS['user_info'];
		$request_data = $GLOBALS['request_data'];
		$request_data['ctl'] = "user";
		$request_data['act'] = "getUserCoinLog";
		$request_data['id'] = $user_info['id'];

		#$request_data['p'] = 1;
		$sps_to_credits_log_var = json_decode(call_api($request_data),true);
		#print_r($sps_to_credits_log_var);die;
		$data = $sps_to_credits_log_var['data'];
		$userData = $sps_to_credits_log_var['userData'];
		$GLOBALS['tmpl']->assign("data",$data);
		$GLOBALS['tmpl']->assign("userData",$userData);
		$GLOBALS['tmpl']->display("my/properties.html");
		#echo json_encode($GLOBALS['tmpl']);
	}
	
}



?>
