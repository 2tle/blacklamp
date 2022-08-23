var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');

var main = require('./main');
var api_request = require('./apireq');
var sign = require('./sign');
var discord= require('./discord');
var profile = require('./profile');

/* GET home page. */
router.use('/',main);
router.use('/apirequest',api_request);
router.use('/sign',sign);
router.use('/discord',discord);
router.use('/profile',profile);

module.exports = router;
