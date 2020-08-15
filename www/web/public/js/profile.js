function goToProfile() {
    var user_Nickname = document.getElementById('username').value;
    if(!user_Nickname) {
        alert('닉네임을 입력해주세요.');
    } else {
        document.location.href="https://black.lampstudio.xyz/profile/"+user_Nickname;
    }
}
