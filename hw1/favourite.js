function onJson(json){
    const container = document.getElementById('big-container-favourite');
    container.innerHTML='';
    console.log(json);
    console.log(Object.keys(json).length);
    for(let i=0; i<Object.keys(json).length; i++){
    const item = document.createElement("div");
    item.classList.add("container-favourite");
    const imgBlock = document.createElement("img");
    imgBlock.classList.add("poster-section");
    imgBlock.src=json[i].movie_img;
    const title = document.createElement("div");
    title.classList.add("title-section");
    title.textContent = json[i].movie_title;
    item.appendChild(title);
    item.appendChild(imgBlock);
    movies.appendChild(item);
    }
}

function onResponse(response){
    return response.json();
}

const movies = document.querySelector("#big-container-favourite");

fetch("get_movies.php").then(onResponse).then(onJson);
