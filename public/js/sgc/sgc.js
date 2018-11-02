$().ready(function(){
	$('.rp_scRpay_dataT_leftmoney').each(function(){
		var yuE = $(this).text();
		if(yuE[0] == '+'){
			$(this).css('color','green');
		}else if(yuE[0] == '-'){
			$(this).css('color','red');
		}
	})
})
//时间戳转换时间格式
function date(e){
	var time = new Date(e*1000);
	var year = time.getFullYear();
	var month = time.getMonth()+1;
	var day = time.getDate();
	var hour = time.getHours();
	var min = time.getMinutes();
	var sen = time.getSeconds();
	return times = year +'-'+ getzf(month) +'-'+ getzf(day) +' '+ getzf(hour) +':'+ getzf(min) +':'+getzf(sen);
//	return times = getzf(month) +'-'+ getzf(day) +' '+ getzf(hour) +':'+ getzf(min) +':'+getzf(sen);
}
function dateNoTime(e){
	var time = new Date(e*1000);
	var year = time.getFullYear();
	var month = time.getMonth()+1;
	var day = time.getDate();
//	return times = year +'-'+ getzf(month) +'-'+ getzf(day);
	return times = getzf(month) +'-'+ getzf(day);
}
 //补0操作
function getzf(num){  
    if(parseInt(num) < 10){  
       num = '0'+num;  
    }  
    return num;  
}
Date.prototype.format = function(format)
{
 var o = {
	 "M+" : this.getMonth()+1, //month
	 "d+" : this.getDate(),    //day
	 "h+" : this.getHours(),   //hour
	 "m+" : this.getMinutes(), //minute
	 "s+" : this.getSeconds(), //second
	 "q+" : Math.floor((this.getMonth()+3)/3),  //quarter
	 "S" : this.getMilliseconds() //millisecond
 }
 if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
 (this.getFullYear()+"").substr(4 - RegExp.$1.length));
 for(var k in o)if(new RegExp("("+ k +")").test(format))
 format = format.replace(RegExp.$1,
 RegExp.$1.length==1 ? o[k] :
 ("00"+ o[k]).substr((""+ o[k]).length));
 return format;
}