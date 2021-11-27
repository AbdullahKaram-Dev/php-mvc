<h1><?= __('admin.user_phone') ?></h1>

<h1><?= __('admin.user_password') ?></h1>

<h5><?= __('admin.user_email') ?></h5>

<span><?= __('admin.user_code') ?></span>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    document.addEventListener('dblclick', function(event) {
    
        let tagName = event.target.tagName; // like h1 
        let tagContent = event.target.textContent || event.target.innerText; // text
        let validTags = ['SPAN','H1','H2','H3',"DIV","H5"];

        
        if(validTags.includes(tagName) && tagContent.includes(".")){

            if (confirm('are you sure want to tranlste this word ?')) {

                $.ajax({
                url : '/translation',
                type : 'POST',
                data : {'wordWithFile' : tagContent},
                dataType:'json',
                success : function(data) { 
                    if(data.status == true){
                        event.target.innerText = data.translatedWord;
                    }else{

                        alert('oops an error accourded');
                    }             
                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });
                
            } else {
                alert('Why did you press cancel? You should have confirmed');
            }           

        }

    }, false);
</script>