$(document).ready(function(){

	$('#btnMenu').click(function(){
        if($('#navigation').css('display') == 'none'){
	       $('#navigation').fadeIn(400);
        }else{
            $('#navigation').fadeOut(400);
        }
	});

	$('.divPost').hide().fadeIn(600);
    $('.divRow100,.divRow50,.divRow250').hide().fadeIn(600);
});

function addFields(){
    var number = document.getElementById("member").value;
    var container = document.getElementById("container");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i=0;i<number;i++){

        var textType = document.createElement("select");
        var Select = "Select" + (i+1);
        textType.name = Select;
        textType.className = "textTypeInput";
        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
			option1.text = "Subtitle";
			option1.value = "1";
			option2.text = "Text";
			option2.value = "2";
			option3.text = "Image";
			option3.value = "3";
			textType.add(option1);
			textType.add(option2);
			textType.add(option3);
        container.appendChild(textType);

        container.appendChild(document.createTextNode("Field " + (i+1)));
        var Field = "Field" + (i+1);
        var input = document.createElement("textarea");
        input.className = "newPostInput";
        input.name = Field;
        input.type = "text";
        container.appendChild(input);


        container.appendChild(document.createElement("br"));
    }
}

function goBack(){
    window.history.back();
}

function goNextRecipe(id){
    var nextRecipe = id + 1;
    console.log(nextRecipe);
    path = 'recipes/' + nextRecipe;
    let _token = $('meta[name="csrf-token"]').attr('content');
    window.location.href = path;
    console.log(path);
}

function fnNameLength(){
    var userName = document.getElementById('userName').value;
    if (userName.length > 25){
        console.log(userName.length);
        alert('Priliz dlhe meno');
        userName.substring(1,25);
        return false;
    } else {
        return true;
    }

}

function fnNewDonation()
{
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var title = $('#title').val();
    var body = $('#body').val();

    if(name == ''){
        alert('Vyplň svoje meno');
        return false;
    }
    if(name.length > 20){
        alert('Priliz dlha emailova adresa');
    }
    if(email == ''){
        alert('Vyplň svoj email');
        return false;
    }
    if(email.length > 40){
        alert('Priliz dlha emailova adresa');
        return false;
    }
    if(phone == ''){
        alert('Vyplň svoje telefónne číslo');
        return false;
    }
    if(title == ''){
        alert('Vyplň nadpis');
        return false;
    }
    if(body == ''){
        alert('Vyplň správu');
        return false;
    }
}

function fnNewRecipe()
{
    var text = $('#text1').val();
    var title = $('#title').val();


    if(text == ''){
        alert('Vyplň text');
        return false;
    }
    if(title == ''){
        alert('Vyplň nadpis');
        return false;
    }

}

function fnFocusBorder(){
    $('.newPostInput');
}

function fnDetail(element,id){
    var detail = '#detail' + id;
    $(detail).toggle();

}

function fnAddProduct(id){
    let _token = $('meta[name="csrf-token"]').attr('content');
    let amount = $('#amount'+ id).val();
    let measure = $('#measure' + id).val();
    let dateExpired = $('#dateExpired' + id).val();

      $.ajax({
        url: "/food/product/" + id,
        type:"POST",
        data:{
          product:id,
          amount:amount,
          measure:measure,
          dateExpired:dateExpired,
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            $('.success').text(response.success).fadeIn(500).fadeOut(2000);
            $('#cartCount').text(response.cartCount);

          }
        },
        error: function(error) {
         console.log(error);
        }
       });
}

function fnAddIngredient(){
    let _token = $('meta[name="csrf-token"]').attr('content');
    let searchIngredient = $('#searchIngredient').val();
    if(searchIngredient == ''){
        console.log('not searching when blank');
        return false;

    }
    $.ajax({
        url: "/recipes/create/new/product",
        type:"POST",
        data:{
          ingredient:searchIngredient,
          _token: _token
        },
        success:function(response){
          if(response) {
            var arrayLen = response.length;
            //console.log(arrayLen);
            //$('.success').text(response.success).fadeIn(500).fadeOut(2000);
            $('#divIngredient').html(response);
          }
        },
        error: function(error) {
         console.log(error);
        }
       });

}

function fnChangeExpiration(storeId){
    var detail = '#expiration' + storeId;
    $(detail).toggle();
}

function fnUpdateExpiration(storeId) {
    var detail = '#expiration' + storeId;
    var expDate = '#expDate' + storeId;
    var expText = '#expirationText' + storeId;
    var expDate = $(expDate).val();
    $(expText).html(expDate);
    let _token = $('meta[name="csrf-token"]').attr('content');
    $(detail).toggle();

    $.ajax({
        url: "/store/update/expiration",
        type:"POST",
        data:{
          storeId:storeId,
          expDate:expDate,
          _token: _token
        },
        success:function(response){
          //updated
            console.log('updated date to:' + response.expDate);
        },
        error: function(error) {
         console.log(error);
         console.log(response);
        }
       });


}

function fnToWarehouse(crossed){

    let _token = $('meta[name="csrf-token"]').attr('content');
    if(crossed == 'crossed'){
        console.log('preciarknute');
    }
    console.log(crossed);
    $.ajax({
        url: "/cart/toWarehouse/",
        type:"POST",
        data:{
            _token: _token,
            crossed: crossed
        },
        success:function(response){
            console.log(response);
            if(response == '0'){
                alert('Pre pouzitie skladu musis byt prihlaseny');
            }else{
               window.location.replace('/store');
            }

        },
        error: function(error){
            console.log('error');
        }
       });
}

function fnDelProduct(trigger){
    var product = '#product_' + trigger;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $(product).fadeOut(600);
    $.ajax({
        url: "/cart/del/" + trigger,
        type:"POST",
        data:{
            _token: _token
        },
        success:function(response){
            var cartCount = document.getElementById('cartCount').innerHTML;
            cartCount = cartCount - 1;
            if (cartCount <= 0){
                cartCount = 0;
            }
            document.getElementById('cartCount').innerHTML = cartCount;
            console.log(cartCount);

            //return response;
        },
        error: function(error){
            console.log('error');
        }
       });



}

function fnDelProductRecipe(ingredient,recipeId){
    var product = '#product_' + ingredient;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/recipes/edit/del/",
        type:"POST",
        data:{
            _token: _token,
            recipeId: recipeId,
            ingredient: ingredient
        },
        success:function(response){
            $(product).hide();
            console.log(response);

            //return response;
        },
        error: function(error){
            console.log('error');
        }
       });
}

function fnDelProductWarehouse(trigger){
    var product = '#product_' + trigger;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $(product).fadeOut(600);
    $.ajax({
        url: "/store/del/" + trigger,
        type:"POST",
        data:{
            _token: _token,
            storeId: trigger
        },
        success:function(response){
            console.log(response);
        },
        error: function(error){
            console.log('error');
        }
       });



}

function fnDelImg(element){

    var img = '#img' + element;
    var button = '#button' + element;
    $(img).hide();
    $(button).hide();
    console.log(element,img);

}

/*function fnSignIn(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    let _token = $('meta[name="csrf-token"]').attr('content');
    if (email != '' && password != ''){
        $.ajax({
        url: "/auth",
        type:"POST",
        data:{
          email: email,
          password: password,
          _token: _token
        },
        success:function(response){

          window.location.href = "{{ route('/')}}";
        },
        error: function(error) {
         console.log(error);
        }
       });
    }else{

        alert('fill out password and real email address');
        return false;
    }
}*/

function fnRegistration(){

    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var password = $('#password').val();

    if(name == ''){
        alert('Vyplň svoje meno');
        return false;
    }
    if(email == ''){
        alert('Vyplň svoj email');
        return false;
    }
    if(email.length > 40){
        alert('Priliz dlha emailova adresa');
        return false;
    }
    if(phone == ''){
        alert('Vyplň svoje telefónne číslo');
        return false;
    }
    if(address != '' && address.length < 3){
        alert('Zadaj platnu Adresu');
        return false;
    }
    if(password == ''){
        alert('Vypln Password');
        return false;
    }
    if(password.length < 8){
        alert('Password musi mat aspon 8 znakov');
        return false;
    }

}

function fnCloseDetail(detail){
    $(detail).hide();
}

function fnClearInput(){
    console.log($('#searchIngredient').val());
    $('#searchIngredient').val('').focus();

}

function fnOpenRecipe(id){

}

function fnAddText(id){
    var idPlus = id + 1;
    var idMinus = id - 1;
    var smallPlussButton = '#smallPlusButton'+idMinus;
    var html = '<div class="divRow250 shadow"><div class="divTitle2">Text' + id + '</div>' +
                '<textarea class="textArea150" name="text' +
                id + '" id="text' + id + '"></textarea><button type="button" class="smallPlusButton" onclick="fnAddText(' +
                idPlus + ')" id="smallPlusButton' + id + '">+</button></div>';
    //var container = document.getElementById("container");
    $('#createNewRecipe').append(html);
    $(smallPlussButton).hide();
    $('#smallPlussButton')

}

function fnLineThrough(id){
    var textId = '#p_' + id;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $(textId).css('text-decoration','line-through');
    $.ajax({
        url: "/cart/add/linethrough",
        type:"POST",
        data:{
            _token: _token,
            productId: id,
            crossed: 1
        },
        success:function(response){
            console.log(response);
        },
        error: function(error){
            console.log('error');
        }
       });
}
function fnNormal(id){
    var textId = '#p_' + id;
    $(textId).css('text-decoration','none');
    console.log('hello');
}

function fnFadeInImg(){
    //alert('hello');
    $('#welcomeImage').fadeIn(500);
    }

function fnFilter(text,section){
    let _token = $('meta[name="csrf-token"]').attr('content');
    let filter = text;
    if(section == 'donate'){
        var thisUrl = '/donateFilter';
    }else if(section == 'sell'){
        var thisUrl = '/sellFilter';
    }

    $.ajax({
        url: thisUrl,
        type:"get",
        data:{
          filter:text,
          _token: _token
        },
        success:function(response){
          if(response) {
            $('.divPost').remove();
            $('.divCenter').append(response);
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
}











