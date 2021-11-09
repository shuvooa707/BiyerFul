function changeProfilePicture() {
    window.event.preventDefault();
    alert();
}


function like(likeButton) {

    let userid = document.querySelector(".profile-detail-container").dataset.id;
    let type =  likeButton.dataset.type;
    let ignoreButton = document.querySelector(".ignore-button");


    curtain();
    let payload = new FormData();
    payload.append("userid", userid);
    payload.append("type", type);

    
    if ( type == "like" ) {
        var url = `/user/like`;
    } else {
        var url = `/user/unlike`;
    }

    // send like request 
    fetch(url,{
        method : "POST",
        body : payload
    })
    .then( r => r.json() )
    .then( r => {
        if ( r.msg == "success" ) {
            if ( r.type == "liked" ) {
                likeButton.classList.add("liked");
                likeButton.innerHTML = `Liked <i class="fas fa-thumbs-up"></i>`;
                likeButton.dataset.type = "liked";

                ignoreButton.classList.remove("liked");
                ignoreButton.innerHTML = `Ignore <i class="fas fa-thumbs-down"></i>`;
                ignoreButton.dataset.type = "ignore";
            } else {
                likeButton.classList.remove("liked");
                likeButton.innerHTML = `Like <i class="fas fa-thumbs-up"></i>`;
                likeButton.dataset.type = "like";
            }
        } else {
            throwAlert("Something Went Worng!!!");
        }
        
        curtain();
    });
}


function ignore(ignoreButton) {
    
    let userid = document.querySelector(".profile-detail-container").dataset.id;

    let type = ignoreButton.dataset.type;

    let payload = new FormData();
    payload.append("userid", userid);
    payload.append("type", type);

    
    // send igonre request 
    curtain();
    fetch("/user/ignore", {
        method : "POST",
        body : payload
    })
    .then( r => r.json() )
    .then( r => {
        if ( r.msg == "success" ) {
            if ( r.type == "ignored" ) {
                let likeButton = document.querySelector("button.like-button");

                likeButton.classList.remove("liked");
                likeButton.innerHTML = `Like <i class="fas fa-thumbs-up"></i>`;
                likeButton.dataset.type = "like";

                ignoreButton.classList.add("liked");
                ignoreButton.innerHTML = `Ignored <i class="fas fa-thumbs-down"></i>`;
                ignoreButton.dataset.type = "unignore";
                
            } else {
                
                ignoreButton.classList.remove("liked");
                ignoreButton.innerHTML = `Ignore <i class="fas fa-thumbs-down"></i>`;
                ignoreButton.dataset.type = "ignore";

            }
        } else {
            throwAlert("Something Went Worng!!!");
        }

        curtain();
    });
}


function shortlist(shortlistButton) {
    
    let userid = document.querySelector(".profile-detail-container").dataset.id;
    let ignoreButton = document.querySelector(".ignore-button");
    let type = shortlistButton.dataset.type;

    let payload = new FormData();
    payload.append("userid", userid);
    payload.append("type", type);

    
    // send igonre request 
    curtain();
    fetch("/user/shortlist", {
        method : "POST",
        body : payload
    })
    .then( r => r.json() )
    .then( r => {
        if ( r.msg == "success" ) {
            if ( r.type == "shortlisted" ) {

                shortlistButton.classList.add("shortlisted");
                shortlistButton.innerHTML = `Shortlisted <i class="fas fa-star"></i>`;
                shortlistButton.dataset.type = 'unshortlist';
            } else {
                shortlistButton.dataset.type = 'shortlist';
                shortlistButton.classList.remove("shortlisted");
                shortlistButton.innerHTML = `Shortlist <i class="fas fa-star"></i>`;
            }
        } else {
            throwAlert("Something Went Worng!!!");
        }

        curtain();
    });
}




function throwAlert(msg) {
    alert(msg);
}


// for showing overlay
function curtain( w ) {

    // if no arguments given
    if ( !w ) 
    {
        if ( overlay = document.querySelector(".overlay") ) {
            overlay.classList.toggle("hide");
        }
    }

    // if specificly instructed what to do
    if ( w == 1 || w == "on" ) {
        if ( overlay = document.querySelector(".overlay") ) {
            overlay.classList.add("hide");
        }
    } else if( w == 0 || w == "off" ) {
        if ( overlay = document.querySelector(".overlay") ) {
            overlay.classList.add("hide");
        }
    } 
}