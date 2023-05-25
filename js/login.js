async function sendLoginInfo(){

    const resposne = await fetch('http://localhost:8000/php/sqlutils.php', {
        method: 'POST',
        mode: "no-cors",
        headers: {
            'Content-Type': 'application/json'

        },
        body: JSON.stringify({
            username : "rooot",
            password : "1234"
        })
    });7

    console.log(resposne);
    

}   