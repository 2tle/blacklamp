var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
var request = require('request');

router.get('/on' ,(req,res) => {
    var temp = req.query.href;
    var tmp = new Buffer(temp, 'base64');
    var link = tmp.toString();
    var sess = req.session;
    if(!sess.googleid) {
        res.redirect('http://black.lampstudio.xyz/');
    } else {
        res.redirect(link+sess.googleid);
    }
    
});


module.exports = router;
