const buyButton = document.querySelector('#buy')
const achatButton = document.querySelector('#achat')
const galerieArea = document.querySelector('#galerie')



const nameproduit = null
let stompClient = null

const toast = async(type, message, timer= 5000) => {
    await Swal.mixin({
        toast: true,
        position: 'top-end',
        timer: timer,
        showCloseButton: true,
        timerProgressBar: true,
        showConfirmButton: false,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    }).fire({
        timer: timer,
        icon: type,
        html: message,
    })
}

const getCurrentTime = () =>{
    const today = new Date()
    return `${today.getHours()}:${today.getMinutes()}`

}

const getAvatarColor = nameproduit => {
    let hash = 0;
    const colors = [
        '#2196F3', '#32c787', '#00BCD4', '#ff5652',
        '#ffc107', '#ff85af', '#FF9800', '#39bbb0'
    ];

    for (let i = 0; i < nameproduit.length; i++) {
        hash = 31 * hash + nameproduit.charCodeAt(i);
    }

    let index = Math.abs(hash % colors.length);
    return colors[index];
}

const connect = e => {
    nameproduit = document.querySelector('#nameproduit').value.trim();

    if(nameproduit) {

        const socket = new SockJS('/websocket');
        stompClient = Stomp.over(socket);

        stompClient.connect({}, onAjout, onError);
    }
    e.preventDefault();
}


const retirer = e => {

    stompClient.connect({},onRetirer,onError)

}


const onAjout = options => {
    stompClient.subscribe('/topic/public', onMessageReceived)
    stompClient.send('/app/chat.register',{},JSON.stringify({
        sender: nameproduit,
        type :'JOIN'
    }))
}

const onRetirer = options => {
    stompClient.send('/app/chat.register',{},JSON.stringify({
        sender: nameproduit,
        type :'LEAVE'
    }))
}




const onError = async e =>{
    await  toast("error", "erreur de connexion")
}






const ajout = e =>{

        if(content && null !== stompClient){
            stompClient.send("/app/chat.send" ,{},JSON.stringify({
                sender :nameproduit,
                type :'CHAT',
                time :getCurrentTime(),
            }))

        }
        e.preventDefault()
    }

async function onMessageReceived(payload) {
    const produit = JSON.parse(payload.body)

    const chatEvent = async (event, type) => {
        await toast(type, event, 2000)

    }


    const articleCom = (produit) =>`     
     <div>
            <div class="chat-avatar">
                <div class="user-avatar fw-bold" style="background-color: ${getAvatarColor(produit.name)}">
                    <span>${produit.name.charAt(0).toUpperCase()}</span>
                </div>
                 <div class="image">
                                <div class="col-md-4" style="margin-right: 20px;"><img src="img/bg2.jpg" alt=""></div>
                                    <div class="description col-md-4">
                                        <h1>mon du produit</h1>
                                        <p>descriprion......</p>
                                        <time>${produit.time}</time>
                                        <button class="btn_con" style="display: flex; left: 80%;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i> <span>buy now</span></button>
                                    </div>
                </div>
            </div>
        </div>
`



    switch (message.type) {
        case 'JOIN':
            messageArea.innerHTML += await chatEvent(` ${produit.sender} a ete Ajouter` , 'successful')
            break;
        case 'LEAVE':
            messageArea.innerHTML += await chatEvent(` ${produit.sender} a ete Ajouter` , 'warning')
            break;
        default:
            messageArea.innerHTML += articleCom(produit)
            break;

    }
    messageArea.scrollTop = messageArea.scrollHeight
}


// usernameForm.addEventListener('submit',connexion, true)
buyButton.addEventListener('submit',ajout, true)
// .addEventListener("click", retirer, true)
