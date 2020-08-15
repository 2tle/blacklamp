var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
var request = require('request');

router.get('/', (req, res) => {
    var sess = req.session; 
    if(sess.username) {
        res.redirect('https://black.lampstudio.xyz');
    } else {
        res.render('ejs/sign');
    }
    
});

router.get('/in', (req, res) => {
    //firebase auth code 
    //ifend
    //check
    //리턴값은 json, result = OK or Fail
});

router.get('/up',(req,res) => {
    var sess = req.session;
    if(sess.googleid) {
        res.redirect('https://black.lampstudio.xyz');
    } else {
        res.render('ejs/signup');
    }
    
});


module.exports = router;
