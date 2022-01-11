const bodyElement = document.getElementById('wrapper');
//const unit = document.getElementById('unit');
const output = document.querySelector('.output');
const user_id = $('#id_user').val();
const color = $('#color').val();

//unit.style.backgroundColor = Math.random() < 0.5 ? 'red' : 'green';

const ws = new WebSocket('ws://www.dnd:2346/client');

function getId(id){
    let Data = {//пересылается через веб сокеты и остальные клиенты
        id: id,
        user: user_id,
        color: color
    };

    ws.send(JSON.stringify(Data));
}


ws.onmessage = response => {
    let Data = JSON.parse(response.data);
    console.log(Data);
    var el = document.getElementById(Data.id);
    if(Data.color == 1){

        el.style.background = "url(\'../images/krest.png\')";
        el.style.backgroundSize = "contain";

    }else{

        el.style.background = "url(\'../images/zero.png\')";
        el.style.backgroundSize = "contain";

    }
};