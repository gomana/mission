
<script>
/**
url, 토큰 정보 구분 저장
 */
var url_fruit = "http://api-fruit.gom.com/product";
var accessToken_fruit = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjkyMzMwMzYsImV4cCI6MTYyOTIzOTAzNn0.i-r8uXHwXFNPeXRy3yqSQu7cshna4LwwL2ZfDgb4KSQ";

var url_vegetable = "http://api-vegetable.gom.com/product";
var accessToken_vegetable = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjkyMzA4NTUsImV4cCI6MTYyOTIzNjg1NX0.uFVlEz9UV-klx9zsc87O-HDNh6kHljEq-ntlUep20WE";

var loading = false; //로딩 여부 체크

/**
가격 조회
 */
function getProductPrice(){
	
	if(loading){
		alert("통신중입니다.");
	}

	var f = document.frm;

    //카테고리 구분값
    var c_code = $("select[name=c_code]").val();    

    var url; //API url 설정
    var accessToken; //Token 설정
    if(c_code == "fruit"){
        url = url_fruit;
        accessToken = accessToken_fruit;
    }else if(c_code == "vegetable"){
        url = url_vegetable;
        accessToken = accessToken_vegetable;
    }else{
        alert("청과물 분류를 선택해 주세요.");
        return;
    }

    //상품명
    var p_name = f.p_name.value;

    if(p_name.length == 0){
        alert("청과물 이름을 입력해 주세요.");
        return;
    }

    //가격 리셋
    $("input[name=p_price]").val(0);

    //요청값
	var d = {};
    d.name = p_name;

 	loading = true;

    //요청시작
	var request = $.ajax({
	  url: url,
	  method : "GET",
	  data: d,
      headers : {
        "Authorization": accessToken
       }
	});

	//완료
	request.done(function( res ) {
		loading = false;
        console.log(res);       
        //가격 업데이트
        $("input[name=p_price]").val(res.price);
	});

    //실패
	request.fail(function( jqXHR, textStatus ) {
		loading = false;
	});
}


/**
목록 조회
 */
 function getProductList(){
	
	if(loading){
		alert("통신중입니다.");
	}

	var f = document.frm;

    //카테고리 구분값
    var c_code = $("select[name=c_code]").val();    

    var url; //API url 설정
    var accessToken; //Token 설정
    if(c_code == "fruit"){
        url = url_fruit;
        accessToken = accessToken_fruit;
    }else if(c_code == "vegetable"){
        url = url_vegetable;
        accessToken = accessToken_vegetable;
    }else{
        alert("청과물 분류를 선택해 주세요.");
        return;
    }


    //요청값
	var d = {}; 

 	loading = true;

    //요청시작
	var request = $.ajax({
	  url: url,
	  method : "GET",
	  data: d,
      headers : {
        "Authorization": accessToken
       }
	});

	//완료
	request.done(function( res ) {
		loading = false;
        console.log(res);       

	});

    //실패
	request.fail(function( jqXHR, textStatus ) {
		loading = false;
	});
}

</script>

<form name="frm">
    <select name="c_code" >
        <option value="fruit">과일</option>
        <option value="vegetable">채소</option>
    </select>
    <input type="text" name="p_name" value="" placeholder="청과물 이름을 입력해주세요">
    <br><br>
    <input type="text" name="p_price" value="0" placeholder="현재가격">
    <button type="button" onclick="getProductPrice();return false;">[가격 조회하기]</button>
    <button type="button" onclick="getProductList();return false;">[목록 조회하기]</button>
</form>