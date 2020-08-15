var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
var request = require('request');


router.get('/ppost' ,(req,ress) => {
    var api_key = 'LAMPAPI-a08stwge804d-4v8sep';
    var sess = req.session;
    request.get({
        url : 'http://api.lampstudio.xyz/api/v1/ppost?api_key='+api_key
    }, (err,res,body) => {
        if(!err) {
            var returnjson = JSON.parse(body);
            var qqjson = {'result' : 'OK', 'ppost' : returnjson.ppost};
            console.log(3);
        } else {
            var qqjson = {'result' : 'Fail'};
            console.log(4);
        }
        ress.json(qqjson);
            
    });
    //res.json(qqjson);
    //console.log(qqjson);
});
















module.exports = router;
