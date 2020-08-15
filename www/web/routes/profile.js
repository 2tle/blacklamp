var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
var request = require('request');
var urlencode = require('urlencode');
router.get('/:username', (req, ress) => {
    var api_key = 'LAMPAPI-a08stwge804d-4v8sep';
    var username = req.params.username;
    var urlencode_username = urlencode(username);
    var isUsernameUsed = false;
    request.get({
        url : 'http://api.lampstudio.xyz/auth/isUsernameWithUrlencode?api_key='+api_key+"&username="+urlencode_username 
    }, (err,res,body) => {
        if(err) {
	    console.log('firsterr');
            ress.redirect('http://black.lampstudio.xyz/');
        } else {
            var usernamereq = JSON.parse(body);
            if(usernamereq.result == true) {
		console.log('asdfasdf');
                isUsernameUsed = true;
                request.get({
                    url : 'http://api.lampstudio.xyz/api/v1/profileWithUrlencode?api_key='+api_key+"&username="+urlencode_username 
                }, (errr,rres,bodyy) => {
                    if(errr) {
                        console.log('isErr');
                        ress.redirect('http://black.lampstudio.xyz/');
                    } else {
                        var returnjson = JSON.parse(bodyy);
                        ress.render('ejs/profile', {
                            'username' : returnjson.profile.ubase.username,
                            'lamppoint' : returnjson.profile.ubase.lamppoint,
                            'lol_username' : returnjson.profile.lol.username,
                            'lol_solo_tier' : returnjson.profile.lol.solo,
                            'lol_team_tier' : returnjson.profile.lol.team,
                            'ow_username' : returnjson.profile.ow.username,
                            'ow_tanker_tier' : returnjson.profile.ow.tanker,
                            'ow_dealer_tier' : returnjson.profile.ow.dealer,
                            'ow_healer_tier' : returnjson.profile.ow.healer,
                            'pubg_username' : returnjson.profile.pubg.username,
                            'pubg_solo_tier' : returnjson.profile.pubg.solo,
                            'pubg_duo_tier' : returnjson.profile.pubg.duo,
                            'pubg_squad_tier' : returnjson.profile.pubg.squad
                            
                        });
                    }
                });
            }
        }
    });
    
});


module.exports = router;
