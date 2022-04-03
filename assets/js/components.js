// Výpis komponent

console.log(bikeArray);
console.log(compArray);

let filteredComp = compArray;

$('#compTabBody').html(getTableBody(filteredComp))
$('#selectBikes').html(getMyBikes())

$('#selectBikes').on('change', () => {
    vybranyBike = $('#selectBikes').val(); // Měním hodnotu i spodního selectu pro nové komponenty
    $("#filtr").val(''); //vymaz pole filtru
    $("#selectBikeForComp").val(vybranyBike).change();
    filteredComp = [];
    compArray.forEach((item) => {
        if (item.bike_id == vybranyBike || vybranyBike == 'all') {
            filteredComp.push(item)
        }
    })
    $('#compTabBody').html(getTableBody(filteredComp));
})

// Naplňuji select koly uživatele
function getMyBikes() {
    myBikes = `<option value=all>Všechna kola</option>`;
    bikeArray.forEach((bike) => {
        myBikes += `<option value=${
            bike.id
        }>${
            bike.manufacturer
        } ${
            bike.year
        }</option>`
    });
    return myBikes
}

// Naplňuji tabulku komponent dle filtru
function getTableBody(filtr) {
    tableBody = '';
    filtr.forEach((item) => {
        tableBody += `<tr><td>${
            item.comname
        }</td><td>${
            item.manufacturer
        }</td><td>${
            item.model
        }</td><td>
        <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
        <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
        </td></tr>`;
    })
    return tableBody
}

// ------------- Filtrování komponent v tabulce -------------

$("#filtr").on("keyup", () => {
    let filtrUdaj = $("#filtr").val();
    let data = filtrujTabulku(filtrUdaj, filteredComp);
    $('#compTabBody').html(getTableBody(data))
})

function filtrujTabulku(filtrUdaj, pole) {
    compFiltr = [];
    pole.forEach((item) => {
        filtrUdaj = filtrUdaj.toLowerCase();
        let nazev = item.comname.toLowerCase();
        let vyrobce = item.manufacturer.toLowerCase();
        let model = item.model.toLowerCase();

        if (nazev.includes(filtrUdaj) || vyrobce.includes(filtrUdaj) || model.includes(filtrUdaj)) {
            compFiltr.push(item)
        }
    })
    return compFiltr
}

// získávám i název z <option> jako COMPNAME do hidden inputu
function setTextField(ddl) {
    document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
}