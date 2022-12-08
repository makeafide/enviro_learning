
function logout(){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '?api=auth-auth&action=logout', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
           // console.log(this.responseText)
           // alert(this.responseText);
           window.location.replace('?p=auth-login');
            if(JSON.parse(this.responseText)){
                console.log(JSON.parse(this.responseText));
                var responce = JSON.parse(this.responseText);
               
                if(!responce['error']){
                    window.location.replace(responce['location']);
                }
                else{

                }
            }
            // Entry already exists skip and move to Check and Verify


        };
        xhr.send();
}

function login(){
    const form = document.querySelector('form')
    form.addEventListener('submit', async(event) => {
        event.preventDefault();
        alert("trest");
        // submit event detected
        var user = document.getElementById('username').value;
        var pass = document.getElementById('password').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '?api=auth-auth&action=login', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            console.log(this.responseText)
            alert(this.responseText);
            if(JSON.parse(this.responseText)){
                console.log(JSON.parse(this.responseText));
                var responce = JSON.parse(this.responseText);
                if(!responce['error']){
                    window.location.replace(responce['location']);
                }
                else{

                }
            }
            // Entry already exists skip and move to Check and Verify


        };
        xhr.send('username='+user+'&password='+pass+'');



    });
}