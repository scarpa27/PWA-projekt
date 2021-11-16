<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Labos 2</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            margin: 2vh 2vw;
            width: 50vw;
            outline: rgba(80,80,80,10%) 1px solid;
        }
        select {
            min-width: 80px;
        }
        .pocrveni{
              border: 1px solid red !important;
          }
    </style>
</head>
<body>

<div>
    <form>
        Limit: <input type="text" id="limit">
        Reverse: <input type="checkbox" id="rev">
        <select id="god"><option selected="selected">SVI</option></select>
        <button id="ucitaj" class="btn btn-success">Učitaj filmove</button>
        <button id ="osvjezi" class="btn btn-success">Osvježi</button>
    </form><br>
    <button class="btn btn-success" id="novi_film" onclick="document.forms[1].style.display='block'">Dodaj</button>
    <form id="forma-dodaj">
        <input type="text" class="dodaj" placeholder="Naslov" id="d1">
        <input type="text" class="dodaj" placeholder="Rating" id="d2">
        <button id="dodaj-film" class="btn btn-success">Dodaj</button>
        <br>
        <input type="text" class="dodaj" placeholder="Godina" id="d3">
        <input type="text" class="dodaj" placeholder="url postera" id="d4">
    </form>
    <div id="filmovi"></div>


    <script>
        document.forms[1].style.display="none";
        document.getElementById("osvjezi").style.display="none";
        document.getElementById("novi_film").style.display="none";

        let filmovi = [];
        let godine;
        let index=250;
        let div = document.getElementById('filmovi');

        document.getElementById('ucitaj').addEventListener('click', getData);
        document.getElementById('osvjezi').addEventListener('click', filter);
        document.getElementById("dodaj-film").addEventListener('click',dodaj_film)

        function getData(e) {
            e.preventDefault();

            document.getElementById("ucitaj").style.display="none";
            document.getElementById("osvjezi").style.display="inline-block";
            document.getElementById("novi_film").style.display="inline-block";

            fetch('https://bridge.hr/ipw/imdb.json')
                .then(data => data.json())
                .then(data => {
                    filmovi = data;
                    postavi_godine(filmovi);
                    render(filmovi);
                });
        }



        function filter(e) {
            e.preventDefault();

            let filmovi2 = [];
            if (document.getElementById("rev").checked) {filmovi2=[...filmovi].reverse();}
            else {filmovi2 = [...filmovi];}

            let limit = document.getElementById("limit").value
            limit = limit === "" ? filmovi.length : limit

            let god = document.getElementById("god").options[document.getElementById("god").selectedIndex].text;

            if (god !== "SVI") {
                filmovi2=filmovi2.filter(film => {
                    if (film.year == god) {
                        return film;
                    }
                }).map(a => a);
            }


            render(filmovi2.slice(0,limit));
        }

        function render(a) {
            let items = a;
            let html = ``;

            html += `
        <table class='table table-striped'>
            <tr>
                <th>#</th>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Ocjena</th>
                <th>Poster</th>
                <th></th>
            </tr>
        `;

            html += items.map(item => `
            <tr>
                <td>${item.index}</td>
                <td>${item.name}</td>
                <td>${item.year}</td>
                <td>${item.rating}</td>
                <td><img height=101 width=68 src="${item.poster}"></td>
                <td><button class="brisi btn btn-danger">Obriši</button></td>
            </tr>
        `).join('');

            html += `
            </table>
        `;
            div.innerHTML = html;

            ukloni();

        }

        function postavi_godine(a) {
            godine = Array.from(new Set(a.map(item => item.year))).sort();
            godine.forEach(godina => {
                let izbor = document.createElement("option");
                izbor.textContent=godina;
                izbor.value=godina;
                document.getElementById("god").appendChild(izbor);
            })
        }

        function dodaj_film(e) {
            e.preventDefault();
            const isEmpty = str => !str.trim().length;

            let dalje = true;

            Array.from(document.getElementsByClassName("dodaj")).forEach(e => {
                if (isEmpty(e.value)) {
                    e.classList.add("pocrveni");
                    dalje=false;
                }
                else {
                    e.classList.remove("pocrveni");
                }
            });

            if (dalje) {

                let film={};
                film.index=++index;
                film.name = document.getElementById("d1").value;
                film.rating = document.getElementById("d2").value;
                film.year = document.getElementById("d3").value;
                film.poster = document.getElementById("d4").value;

                filmovi.push(film);
                document.getElementById("osvjezi").click();
                document.getElementById("d1").value="";
                document.getElementById("d2").value="";
                document.getElementById("d3").value="";
                document.getElementById("d4").value="";
                document.forms[1].style.display="none";
            }
        }

        function ukloni() {
            let brisi = Array.from(document.getElementsByClassName("brisi"));
            brisi.forEach(b => {
                b.addEventListener('click', e => {
                    e.preventDefault();
                    filmovi = filmovi.filter(film => film.index!=b.parentElement.parentElement.firstElementChild.innerHTML);
                    document.getElementById("osvjezi").click();
                })
            });
        }

    </script>


</div>
</body>
</html>