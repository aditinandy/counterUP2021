require('dotenv').config();

// var mail = require('./config/mailer')();
// mail.send();
const fs = require("fs");
const express = require('express');
const path = require('path');

const homeFile = fs.readFileSync("magic.html", "utf8");


const readline = require('readline');
var validator = require('validator');
const app = express();
app.use('/public', express.static(path.join(__dirname, 'magic.html')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '', 'magic.html'));
    const rl = readline.createInterface({input:process.stdin, output:process.stdout});

// rl.question(`whats ur valid email ? \n`, (userInput) => {
    let answer = validator.isEmail(`${email}`);
    if(true === answer) {//we use true, cause validator used true (or) false to display there o/p..
        //console.log(answer);
        rl.close();
        // rl.on('close', () => {
        //     console.log('correct!!!!!');
        // });
///////////////////////send mail////////////////////////////////////
        let mailto = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user : process.env.EMAIL,
                pass : process.env.PASS
            }
        });
        
        let maildetailes = {
            from : 'aditinandy676@gmail.com',
            to : userInput,
            subject : 'text mail',
            text : 'hello chandi.. from ur didi!'
        };
        
        mailto.sendMail(maildetailes, function(err, data) {
            if(err){
                console.log('error occures');
            }else{
                console.log('mail sent successfully!');
            }
        })
        
    }else {
        rl.setPrompt('invalid email \n');
        rl.prompt();
        rl.on('line', (userInput) => {
            let answer = validator.isEmail(userInput);
            if(true === answer) {
                ////////////////SEND MAIL/////////////////
                let mailto = nodemailer.createTransport({
                    service: 'gmail',
                    auth: {
                        user : process.env.EMAIL,
                        pass : process.env.PASS
                    }
                });
                
                let maildetailes = {
                    from : 'aditinandy676@gmail.com',
                    to : userInput,
                    subject : 'text mail',
                    text : 'from node js'
                };
                
                mailto.sendMail(maildetailes, function(err, data) {
                    if(err){
                        console.log('error occures');
                    }else{
                        console.log('mail sent successfully!');
                    }
                })
                rl.close();
            }
            else{
                rl.setPrompt(`${userInput} is not correct \n`);
                rl.prompt();
            }
        });
    }
// });
rl.on('close', () => {
    console.log('correct!!!!!');
});

});
app.listen(8000);
 
// var email = validator.isEmail('foo@bar.com');
// console.log(email);




const nodemailer = require('nodemailer');

// // 