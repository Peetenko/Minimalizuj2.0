<script>
function shareLink(){
    const shareData = {
    title: "Minimalizuj.sk",
    text: "Link",
    url: '{{$shareLink}}',
    };

    const btn = document.querySelector("#shareButton");
    const resultPara = document.querySelector(".result");

    // Share must be triggered by "user activation"
   
    try {
        console.log('entering share',shareData);
        //navigator.clipboard
        navigator.canShare(shareData);
        resultPara.textContent = "MDN shared successfully";
    } catch (err) {
        resultPara.textContent = `Error: ${err}`;
    }
    
}

   
</script>
<img onClick="shareLink()" id="shareButton"  src="{{asset('/images/icons8-share.gif')}}" style="border-radius:5px;text-align:center;display:inline-block">
<p class="result"></p>