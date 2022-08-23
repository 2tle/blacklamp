var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
var request = require('request');


router.get('/', (req, res) => {
    var sess = req.session;
    if(!sess.username) {
        res.render('ejs/main.ejs' , {
            'alink' : 'http://black.lampstudio.xyz/sign',
            'username' : '로그인',
            'jtitle' : 'Blacklamp에 오신 것을 환영합니다.',
            'jd1' : '아직 계정이 없으시다면 아래 버튼을 눌러 회원가입을 하세요!',
            'jd2' : '계정이 있으시다면 아래 버튼을 눌러 로그인 하세요!',
            'jlink' : 'http://black.lampstudio.xyz/sign',
            'jbtn' : '로그인 하기'
        });
        
    } else {
        res.render('ejs/main.ejs' , {
            'alink' : 'http://black.lampstudio.xyz/my',
            'username' : sess.username,
            'jtitle' : 'Blacklamp에 오신 것을 환영합니다.',
            'jd1' : '아래에서 파티 포스트에 참여하거나 생성하기 버튼을 눌러 파티 포스트를 생성하세요',
            'jd2' : '',
            'jlink' : 'http://black.lampstudio.xyz/partypost/create',
            'jbtn' : '파티 포스트 만들기'
        });
    }
    
});

module.exports = router;
