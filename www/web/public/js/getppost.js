function getPartyPost() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://black.lampstudio.xyz:/apirequest/ppost');
    xhr.setRequestHeader('Content-Type','application/json');
    xhr.send();
    xhr.addEventListener('load', function() {
        var result = JSON.parse(xhr.responseText);
        var senddata = '';
        if(result.result != "OK") return;
        for(var i = 0; i < result.ppost.length; i++) {
            var temp = '정보 없음';
            switch(result.ppost[i].type){
                case '0':
                    temp = 'LOL';
                    break;
                case '1':
                    temp = 'Overwatch';
                    break;
                case '2':
                    temp = 'PUBG';
                    break;
            }
            senddata = senddata+'<div class="card">';
            senddata = senddata+'<div class="card-header">'+ temp +'</div>';
            senddata = senddata+'<div class="card-body">';
            senddata = senddata+'<div class="card-title">'+ result.ppost[i].title+'</div>';
            senddata = senddata+'<div class="card-text">'+ result.ppost[i].username+ ' / '+ result.ppost[i].tier +'</div>';
            senddata = senddata+'<button class="btn btn-outline-primary" onclick="onDiscord(\''+btoa(result.ppost[i].address)+'\');">파티 참여</button>';
            senddata = senddata+'</div></div>';
        }
        document.getElementById('ppost').innerHTML = senddata;
    });   
}
function onDiscord(url) {
    document.location.href="https://black.lampstudio.xyz/discord/on?href="+url;
}
