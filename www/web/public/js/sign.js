function signup() {   
    document.location.href="https://black.lampstudio.xyz/sign/up";
}
function login() {
    var id = document.getElementById('email').value;
    var pwcheck = document.getElementById('pw').value;
    if( !id || !pwcheck ) {
        alert('null error');
    }
    var pw = btoa(document.getElementById('pw').value);
    var data = { 'email' : id, 'pw' : pw};
    var xhr = new XMLHttpRequest();
    xhr.open('POST','https://black.lampstudio.xyz/sign/in');
    xhr.setRequestHeader('Content-Type','application/json');
    xhr.send(data);
    xhr.addEventListener('load', function() {
        var result = JSON.parse(xhr.responseText);
        if(result.result != 'OK') {
            alert('아이디나 비밀번호를 체크하여 주세요.');
            document.getElementById('email').value = '';
            document.getElementById('pw').value = '';
            return;
        }
        document.location.href="https://black.lampstudio.xyz";
        return;
    });   
}

