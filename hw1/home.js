function onJSonRep(json){
    const container = document.getElementById('big-container');
    container.innerHTML='';
    console.log("sono nel json dei film");
    console.log(json);
    console.log(Object.keys(json).length);
    for(let i=0; i<Object.keys(json).length; i++){
    const item = document.createElement("div");
    item.classList.add("container-film");
    const imgBlock = document.createElement("img");
    imgBlock.classList.add("poster-section");
    imgBlock.src=json.results[i].image;
    const title = document.createElement("div");
    title.classList.add("title-section");
    title.textContent = json.results[i].title;
    a = document.createElement('img');
    a.src = "css/images/heart.png";
    a.classList.add("heart");
    item.appendChild(a);//Append del bottone 
    item.appendChild(title);
    item.appendChild(imgBlock);
    movies.appendChild(item);
    a.addEventListener('click', favourites);
    }
}

function onResp(response){
    return response.json();
}

function search(event){
    contentObj = {};
    const form_data = new FormData(document.querySelector("form"));
    fetch("do_search_movies.php?q="+encodeURIComponent(form_data.get('search'))).then(onResponse).then(searchJson);
    
    console.log("Event prevent default");
    event.preventDefault();
}

function onResponse(response)
{
    console.log(response);
    return response.json();
}

function searchJson(json)
{
    console.log(json);

    onJSonRep(json);    //==jsonSpotify nell'esempio 
    //E' LA FUNZIONE CHE TI FA LE APPENDCHILD

    // if (!json.length){
    //     //fare funzione no results

    // }
}

function onJson(json){
        const container = document.getElementById('container-random');
        container.innerHTML='';
        console.log("sono nel json delle citazioni");
        var parsed = JSON.parse(json);
        console.log(parsed);
        console.log(parsed.quote);
        var quote = document.createTextNode(parsed.quote);
        var blank1 = document.createElement("br");
        var blank2 = document.createElement("br");
        var role = document.createTextNode(parsed.role);
        var show = document.createTextNode(parsed.show);
        container.appendChild(quote);
        container.appendChild(blank1);
        container.appendChild(role);
        container.appendChild(blank2);
        container.appendChild(show);
 
    }

function favourites(event){
    console.log("like");
    const hearth = event.currentTarget;
    const container = hearth.parentNode;
    const title = container.querySelector(".title-section").textContent;
    const img = container.querySelector(".poster-section").src;
    console.log(title);
    console.log(img);
    console.log("insert_movie.php?title=" + encodeURIComponent(title) + "&img=" + encodeURIComponent(img));
    fetch("insert_movie.php?title=" + encodeURIComponent(title) + "&img=" + encodeURIComponent(img));
    hearth.classList.add("hide");
}

function openMenu() {
    console.log("click menu");
    var result = document.querySelectorAll('.nav1');
    //e ora come faccio con il css?
    //si potrebbe usare la classe hide, oppure...?
  }

console.log("Inizio home javascript");

const movies = document.querySelector("#big-container");
const quotes = document.querySelector("#container-random");
const menu = document.querySelector('#menu');

menu.addEventListener("click", openMenu);
document.querySelector("form").addEventListener("submit", search);
fetch("get_random_quote.php").then(onResponse).then(onJson);




