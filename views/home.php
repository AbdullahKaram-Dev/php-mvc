<h1><?= __('admin.user_phone') ?></h1>

<h1><?= __('admin.user_password') ?></h1>

<style>
        .embed-cover {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 20px;
          
          /* Just for demonstration, remove this part */
          opacity: 0.25;
        }

        .wrapper {
          position: relative;
          overflow: auto;
        }
    </style>


<body onload="disableContextMenu();" oncontextmenu="return false">
<div class="wrapper">
<div class="embed-cover"></div>
<embed  id="pdfframe" src="http://localhost:8000/Bosta.pdf#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1000"></embed>
    
</div>
</body>    
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {


        document.addEventListener('dblclick', function(event) {

            let tagName = event.target.tagName; // like h1 
            let tagContent = event.target.textContent || event.target.innerText; // text
            let validTags = ['SPAN', 'H1', 'H2', 'H3', "DIV", "H5"];

            if (validTags.includes(tagName) && tagContent.includes(".")) {

                if (confirm('are you sure want to tranlste this word ?')) {

                    $.ajax({
                        url: '/translation',
                        type: 'POST',
                        data: {
                            'wordWithFile': tagContent
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == true) {
                                event.target.innerText = data.translatedWord;
                            } else {

                                alert('oops an error accourded');
                            }
                        },
                        error: function(request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });

                } else {
                    alert('Why did you press cancel? You should have confirmed');
                }

            }

        }, false);

    });
</script>

<script type="text/javascript">

           function disableContextMenu() {
            window.frames["pdfframe"].contentDocument.oncontextmenu = function(){return true;};   
            var myFrame = document.getElementById('pdfframe');
            myFrame.window.eval('document.addEventListener("contextmenu", function (e) {e.preventDefault();}, false)');
        }

</script>

<script>
    $(document).ready(function() {
    $("body").on("contextmenu",function(){
       return false;
    }); 
}); 
</script>

<script>
    function clickIE4(){
        if (event.button==2){
            return false;
        }
    }

    function clickNS4(e){
        if (document.layers||document.getElementById&&!document.all){
            if (e.which==2||e.which==3){
                return false;
            }
        }
    }

    if (document.layers){
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
        document.onmousedown=clickIE4;
    }

    document.oncontextmenu=new Function("return false")
</script>