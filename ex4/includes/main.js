//Global variables
var g_nboxHeight = 80,
    g_nboxWidth = 80,
    arrBox = [],
    g_counter = 0,
    g_i;
const arrChar = ['T', 'O', 'M'];

(function() {

    //A memory game begins after clicking a box
    function flipBox() {

        if (this.style.color === 'black') {
            this.style.color = 'white';
            arrBox.push(this);
        } else {
            this.style.color = 'black';
            arrBox.pop(this);
        }
        if (arrBox.length == 2) {
            if (arrBox[0].innerHTML === arrBox[1].innerHTML) {
                arrBox[0].style.background = 'blue';
                arrBox[1].style.background = 'blue';
                arrBox[0].removeEventListener('click', flipBox);
                arrBox[1].removeEventListener('click', flipBox);
                g_counter++;
                if (g_counter == 2)
                    CreateTheForm();

            } else {
                let box1 = arrBox[0];
                let box2 = arrBox[1];
                setTimeout(() => {
                    box1.style.color = 'black';
                    box2.style.color = 'black';
                }, 700)
            }
            arrBox = [];
        }
    }

    // Create three boxes with random letters each pressing the button 
    function addFloatBox() {

        document.getElementById('header').style.background = '#F2E9E9';
        document.getElementById('main').style.background = 'white';
        document.getElementById('leftNav').style.background = '#E5E5E5';
        document.getElementById('button').style.background = '#000000';
        document.getElementById('downSquare').style.background = '#EBEF18';
        document.getElementById('rightSquare').style.background = 'lightgreen';
        for (g_i = 0; g_i < 6; ++g_i, g_nboxHeight += 20, g_nboxWidth += 20) {
            const main = document.getElementsByTagName('main')[0];
            let box = document.createElement('div');
            box.className = 'floatBox';
            box.style.width = g_nboxWidth + 'px';
            box.style.height = g_nboxHeight + 'px';
            box.style.color = 'black';
            box.style.fontSize = (g_nboxHeight - 20) + 'px';
            box.style.textAlign = 'center';
            box.style.backgroundColor = 'black';
            box.style.float = 'left';
            box.style.margin = 64 + 'px';
            let random = Math.floor((Math.random() * 100)) % arrChar.length;
            let letter = arrChar[random];
            box.innerHTML = letter;
            box.addEventListener('click', flipBox);
            main.append(box);


        }
    }

    function CreateTheForm() {
        let form = document.getElementsByTagName('form')[0];
        form.style.display = 'block';

    }



    document.getElementById('button').onclick = addFloatBox;

})();