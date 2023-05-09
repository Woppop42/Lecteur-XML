function copyLink(event, link){
    event.preventDefault();
    let url = link;
    document.querySelector('#input').value = url;
    document.querySelector('#btn').click();
    console.log("ok");
}