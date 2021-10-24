function changeProfilePicture() {
    window.event.preventDefault();
    alert();
}


function like(likeButton) {
    let userid = document.querySelector(".profile-detail-container").dataset.id;


    let type =  likeButton.dataset.type;

    let payload = new FormData();
    payload.append("userid", userid);
    payload.append("type", type);

    // send like request 
    fetch("/user/like",{
        method : "POST",
        body : payload
    })
    
    .then( r => r.json() )
    .then( r => {
        if ( r.msg == "success" ) {
            if ( r.type == "liked" ) {
                likeButton.classList.add("liked");
                likeButton.innerHTML = `Liked <i class="fas fa-thumbs-up"></i>`;
                likeButton.dataset.type = "unliked";
            } else {
                likeButton.classList.remove("liked");
                likeButton.innerHTML = `Like <i class="fas fa-thumbs-up"></i>`;
                likeButton.dataset.type = "like";
            }
        } else {
            throwAlert("Something Went Worng!!!");
        }
    });
}


function throwAlert(msg) {
    alert(msg);
}