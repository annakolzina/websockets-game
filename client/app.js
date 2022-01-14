const user_id = $('#id_user').val();
const color = $('#color').val();
const name = $('#name').val();
var flag = 0;
var matrix = [[2, 2, 2], [2, 2, 2], [2, 2, 2]];//матрица учета ходов

//unit.style.backgroundColor = Math.random() < 0.5 ? 'red' : 'green';

const ws = new WebSocket('ws://www.dnd:2346/client');


function alhoritm(){
    var count = 0;
    for (i = 0; i < matrix.length - 1; i++){
        for(j = 0; j < matrix.length - 1; j++){
            if(matrix[i][j] == matrix[i + 1][j + 1] & i!=2 & i!=5 & i!=7 & matrix[i][j]!=2){
                count++;
                console.log(count);
            }
        }
    }
    if (count == 3){
        return 1;
    }
    else{
        return 0;
    }
}


function getId(id){
    switch (id){
        case "1":
            matrix[0][0] = color;
            break;
        case "2":
            matrix[0][1] = color;
            break;
        case "3":
            matrix[0][2] = color;
            break;
        case "4":
            matrix[1][0] = color;
            break;
        case "5":
            matrix[1][1] = color;
            break;
        case "6":
            matrix[1][2] = color;
            break;
        case "7":
            matrix[2][0] = color;
            break;
        case "8":
            matrix[2][1] = color;
            break;
        case "9":
            matrix[2][2] = color;
            break;
        default:
            console.log("default");
            break;
    }
    let Data = {//пересылается через веб сокеты и остальные клиенты
        id: id,
        user: user_id,
        color: color,
        name: name,
        matrix: matrix,
        res: alhoritm()
    };


    var count = 0;
    for (i = 0; i < matrix.length - 1; i++){
        for(j = 0; j < matrix.length - 1; j++){
            if(matrix[i][j] == matrix[i + 1][j + 1] & matrix[i][j]!=2){
                count++;
                console.log(count);
            }else{
                console.log(count);
            }
        }
    }

    ws.send(JSON.stringify(Data));
}


ws.onmessage = response => {
    let Data = JSON.parse(response.data);
    console.log(matrix);

    var el = document.getElementById(Data.id);
    if(Data.color == "0"){
        el.style.background = "url(\'../images/zero.png\')";
        el.style.backgroundSize = "contain";
    }else{
        el.style.background = "url(\'../images/krest.png\')";
        el.style.backgroundSize = "contain";
    }

    if(Data.res == 1){
        alert('Выиграл игрок ' + Data.name);
    }else{
        document.getElementById('send').innerHTML = "<p>Игрок " + Data.name + " выполнил ход</p>";
    }
};