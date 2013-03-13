




$(function(e) {
	countDownLimit();
	setInterval("countDownLimit()",1000);
});

function countDownLimit(){
		var str;
		var	limitDate = new Date(2013,2,16,20,0);
		var	today = new Date()
		var	hours = Math.floor(   (limitDate - today)   /  (60 * 60 * 1000)  );
		var	mins = Math.floor( ( ( limitDate - today ) % ( 24 * 60 * 60 * 1000 ) ) / ( 60 * 1000 ) ) % 60;
		var secs = Math.floor( ( ( limitDate - today ) % ( 24 * 60 * 60 * 1000 ) ) / 1000 ) % 60 % 60;  
		if( ( limitDate - today ) > 0 ){
			str =  addZero( hours ) + ':' + addZero( mins ) + ':'+ addZero( secs );
		}else{
			str = "00:00:00";
			$("#countdown").css("color","rgb(255,0,0)");
		}
		$("#countdown").html(str);
}

function addZero( num ){
		num = '0' + num;
		str = num.substring( num.length - 2, num.length );
		return str ;
}

