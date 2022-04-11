function ready() {
    const element = document.getElementById('msg_alert');
    if(element){
        setTimeout(function (element) {
            element.remove();
        }, 3000,element);
    }
}

document.addEventListener("DOMContentLoaded", ready);


document.body.addEventListener("click", function(event) {
    if (event.target.classList.contains('btn-danger')){
        if (!confirm("Would you like to delete?"))
            event.preventDefault();
    }
});
